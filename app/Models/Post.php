<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Post extends Model
{

    use Sluggable;
    protected $fillable= ['name', 'description', 'slug', 'price', 'image', 'quantity', 'category_id','views'];

    public function tags() :BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category() :BelongsTo
    {

        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public static function uploadImage(Request $request, $image = null)
    {

        if ($request->hasFile('image')) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            $path = $request->file('image')->store("images/{$folder}", 'public');

            $imagePath = storage_path('app/public/') . '/' . $path;
            $image = Image::make($imagePath);
            $image->resize(250,150, function ($img){
                $img->aspectRatio();
                $img->upsize();
            });
            $image->encode(null, 100)->save($imagePath);


            return $path;
        }
        return null;
    }

    public function getImage()
    {
        return asset("public/storage/{$this->image}");

    }

    public function incrementViews()
    {
        $this->increment('views');
    }

}
