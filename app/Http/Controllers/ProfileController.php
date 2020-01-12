<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

     public function __construct()
     {
         $this->middleware('auth');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profiles.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        $user->load('profile');
        return view('profiles.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update',$user->profile);

         $data=$request->only(['about','city','phone_number','address','about']);

        if($request->has('avatar')){
            /* Si ce n'est pas une image par defaut */
           if(! strpos($user->profile->avatar,'avatar')){
               $tabs=explode("/",$user->profile->avatar);
               Storage::delete("public/default/". end($tabs)); // supprimer l'image
           }

           $avatar=$request->avatar->store('default','public');

           $data=array_merge($data,array('avatar'=>asset('storage').'/'.$avatar));
        }

        $user->profile()->update($data);
        return redirect()->route('users.show',compact('user'))->with('success','Your profile has been updated successfully !');
    }


}
