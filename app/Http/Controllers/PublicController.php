<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Mail\RequestMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('filtered', 'home', 'search');
    }
    public function home()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')
            ->where('is_accepted', true)
            ->take(5)
            ->get();
        return view('welcome', compact('announcements'));
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $announcements = Announcement::search($q)
            ->where('is_accepted', true)  //da modificare per ricerca commenti(user story 10)
            ->get();
        return view('search.results', compact('q', 'announcements'));
    }

    public function filtered(Category $category)
    {
        $title = $category->title;
        // dd($category->id);
        $announcements = Announcement::where('category_id', $category->id)
            ->where('is_accepted', true)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('announcement.filtered', compact('announcements', 'title'));
    }

    public function join()
    {
        return view('auth.join');
    }

    public function contactUs(Request $request)
    {
        $email = $request->input('email');
        $message = $request->input('message');

        $user_contact = compact('email', 'message');
        Mail::to('noreply@admin.com')->send(new RequestMail($user_contact));

        return redirect(route('home'))->with('message', 'La tua richiesta di lavorare con noi è stata inviata con successo');
    }

    public function locale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
