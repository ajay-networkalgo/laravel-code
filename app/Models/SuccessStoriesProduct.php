<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStoriesProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'success_stories_id','product_id'
    ];

    public function success_stories(){
        return $this->belongsTo(SuccessStory::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
