@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h3>{{ $user->name }}</h3>
                    <a class="btn btn-outline-secondary" href="{{ route('users.edit',$user)}}">Edit user informations</a>
                </div>

                <div class="card-body">
                  <div class="d-flex justify-content-center">
                    <img src="{{ $user->profile->avatar }}" alt="" class="rounded-circle" width="110" height="110">

                  </div>
                  <hr>
                  <div class="card my-1">
                    <div class="card-header profile-header d-flex align-items-center"><h4>City</h4></div>
                    <div class="card-body">{{ $user->profile->city }}</div>
                  </div>

                  <div class="card my-1">
                      <div class="card-header profile-header d-flex align-items-center"><h4>Address</h4></div>
                      <div class="card-body">{{ $user->profile->address }}</div>
                   </div>
                  <div class="card my-1">
                      <div class="card-header profile-header d-flex align-items-center"><h4>Phone number</h4></div>
                      <div class="card-body">{{ $user->profile->phone_number }}</div>
                   </div>

                  <div class="card my-1">
                      <div class="card-header profile-header d-flex align-items-center"><h4>About</h4></div>
                      <div class="card-body">{!! nl2br(e($user->profile->about),false) !!}</div>
                   </div>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection
