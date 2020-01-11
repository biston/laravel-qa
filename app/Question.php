<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['title','body'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }


    public function setTitleAttribute($value){
        $this->attributes['title']=$value;
        $this->attributes['slug']=Str::slug($value);
    }


    public function getUrlAttribute(){
        return route('questions.show',$this);
    }


    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }


    public function getStatusAttribute(){

        if ($this->best_answer_id){
            return 'answer-accepted';
        }

        if($this->answers_count>0){
            return 'answered';
        }

        return 'unanswered';
    }


}
