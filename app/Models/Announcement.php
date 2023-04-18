<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    
        use HasFactory;
    
        protected $fillable = [
            "title",
            "body",
            "category_id",
            "user_id",
            "price",
            "image",
        ];

    use Searchable;

    public function toSearchableArray()
    {

        $array = [
            'id'=> $this->id,
            'title'=> $this->title, //prende i nomi dalle colonne e la ricerca la fa nella colonna
            'body'=> $this->body,
            'category'=> $this->category->title,
            'user'=> $this->user->name,
        ];

        return $array;
    }

    //relazione one-to-many
    public function path()
    {
        return Str::slug($this->title);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(AnnouncementImage::class);
    }

    static public function ToBeRevisionedCount()
    {
        return Announcement::where('is_accepted',null)->count();
    }
}
