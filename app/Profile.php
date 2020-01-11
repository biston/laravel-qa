<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   protected $fillable=['About'];

   public function user(){

      return $this->belongsTo(User::class);
   }
}
