<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['title','body'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function setTitleAttribute($value){
        $this->attributes['value']=$value;
        $this->attributes['value']=Str::slug($value);
    }
}
