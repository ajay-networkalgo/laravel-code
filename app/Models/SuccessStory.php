<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'country', 'details', 'feature_image'
    ];

    public function relatedProducts(){
        return $this->hasMany(SuccessStoriesProduct::class,'success_stories_id','id');
    }
}
