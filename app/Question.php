<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
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

    public function getIsFavoritedAttribute(){
        return $this->favorites()->where('user_id',Auth::id())->count()>0;
    }

    public function getFavoritesCountAttribute(){
        return $this->favorites->count();
    }

    public function answers(){
        return $this->hasMany(Answer::class)->latest();
    }

    public function favorites(){
        return $this->belongsToMany(User::class,'favorites')->withTimestamps();
    }

    public function votes(){
        return $this->morphToMany(User::class,'votable')->withTimestamps();
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

    public function getVotedUpAttribute(){
        return auth()->user()->voteQuestions()->where('votable_id',$this->id)->where('vote',1)->exists();
    }

    public function getVotedDownAttribute(){
        return auth()->user()->voteQuestions()->where('votable_id',$this->id)->where('vote',-1)->exists();
    }

}
