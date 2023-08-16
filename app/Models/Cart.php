<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart_items';
    protected $fillable = ['user_id', 'post_id', 'quantity', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post() :BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }


    public function getTotalPrice()
    {
        return $this->quantity * $this->price;
    }
    public function getImage()
    {
        return asset("public/storage/{$this->image}");

    }

}
