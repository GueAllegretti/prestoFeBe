<?php

namespace App\Http\Controllers;

use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function floatvalue($val)
    {
        $val = str_replace(",", ".", $val);
        return floatval($val);
    }

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(5);

        return view("announcement.index", compact("announcements"));
    }

    public function listByUser(User $user)
    {
        $announcements = Announcement::where('user_id', $user->id)->get();
        return view('announcement.userList', compact('announcements', 'user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uniqueSecret = $request->old(
            'uniqueSecret',
            base_convert(sha1(uniqid(mt_rand())),16,36)
        );
        return view("announcement.create" , compact('uniqueSecret'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {

        $announcement = Announcement::create([

            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            $price = $this->floatvalue($request->price),
            'price' => $price,
        ]);
            // 'images' => session()->get('images.{$uniqueSecret}'),

            $uniqueSecret=$request->input('uniqueSecret');

            $images = session()->get("images.{$uniqueSecret}", []);
            $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

            $images = array_diff($images, $removedImages);

            foreach ($images as $image) {
                $i = new AnnouncementImage();
                $fileName =basename($image);
                $newFileName = "public/announcements/{$announcement->id}/{$fileName}";
                Storage::move($image, $newFileName);


                $i->file = $newFileName;
                $i->announcement_id = $announcement->id;

                $i->save();

                // qui creiamo la chain delle varie jobs
                GoogleVisionSafeSearchImage::withChain([

                    new GoogleVisionLabelImage($i->id),
                    new GoogleVisionRemoveFaces($i->id),
                    new ResizeImage($newFileName,300,150),
                    new ResizeImage( $newFileName,400,300),
                    new ResizeImage( $newFileName,500,350),

                ])->dispatch($i->id);

            }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect(route('home'))->with('message', 'Hai inserito correttamente il tuo annuncio! Attendi la revisione.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement, $title)
    {
        return view('announcement.show', compact('announcement', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('announcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $announcement->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
            //'image'=>$request->file('image')->store('public/media'),
            $price = $this->floatvalue($request->price),
            'price' => $price,

        ]);
        return redirect(route('announcement.index'))->with('message', 'Hai modificato correttamente il tuo annuncio!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect(route('announcement.index'))->with('message', 'Hai eliminato il tuo annuncio!');
    }



    //per caricare e rimuovere immagini
    public function imageUpload(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName= $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(

            $fileName,
            120,
            120

        ));


        session()->push("images.{$uniqueSecret}", $fileName);

        return response()->json(
            [
                'id' => $fileName
            ]
        );
    }

    public function imageRemove(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName= $request->input('id');
        session()->push("removedimages.{$uniqueSecret}", $fileName);

        //dd(session()->push("removedimages.{$uniqueSecret}", $fileName));
        Storage::delete($fileName);
        return response()->json('ok');
    }

    public function getImages(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images = array_diff($images, $removedImages);
        //dd($images);
        $data = [];

        foreach ($images as $image){
            $data[] = [
                'id' => $image,
                'src' => AnnouncementImage::getUrlByFilePath($image, 120, 120)
            ];
        }

        return response()->json($data);
    }
}
