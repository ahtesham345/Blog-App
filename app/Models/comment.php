<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
   protected $table = 'comment';
   protected $fillable = [
    'user_id',
    'post_id',
    'comment_body',
   ];
   public function post(){
    return $this->belongsTo(post::class,'post_id','id');
   }
   public function user(){
    return $this->belongsTo(user::class,'user_id','id');
   }
}
