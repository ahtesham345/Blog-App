<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'yt_frame',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
        'created_by',
    ];
    public function category() {
        return $this->belongsTo(category::class,'category_id','id');
    }
    public function user() {
        return $this->belongsTo(user::class,'created_by','id');
    }
    public function comments(){
        return $this->hasMany(comment::class,'post_id','id');
    }
}
