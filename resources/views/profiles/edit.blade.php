@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Update {{ $user->name }} 's profile</h3>
                    <a class="btn btn-outline-secondary" href="{{ route('users.show',$user)}}">Back to profile</a>
                </div>

                <div class="card-body">

                    <form action="{{ route('users.update',$user) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="city" class="col-form-label">City</label>
                            <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{old('city',$user->profile->city)}}">

                            @error('city')
                             <span class="invalid-feedback" role="alert">
                                 <strong> {{ $message }}</strong>
                             </span>
                            @enderror
                         </div>

                        <div class="form-group">
                            <label for="phone_number" class="col-form-label">Phone number</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number',$user->profile->phone_number)}}">

                            @error('phone_number')
                             <span class="invalid-feedback" role="alert">
                                 <strong> {{ $message }}</strong>
                             </span>
                            @enderror
                         </div>

                         <div class="form-group">
                            <label for="address" class="col-form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address',$user->profile->address)}}">

                            @error('address')
                             <span class="invalid-feedback" role="alert">
                                 <strong> {{ $message }}</strong>
                             </span>
                            @enderror
                         </div>

                         <div class="form-group">
                            <label for="avatar" class="col-form-label">Avatar</label>
                            <input type="file" name="avatar" id="avatar" class="form-control">
                         </div>

                         <div class="form-group">
                           <label for="about" class="col-form-label">Question body</label>
                           <textarea name="about" id="about"  rows="10" class="form-control @error('about') is-invalid @enderror">{{ old('body',$user->profile->about) }}</textarea>

                           @error('about')
                             <span class="invalid-feedback">
                                 <strong>{{ $message }}</strong>
                             </span>
                           @enderror

                         </div>

                         <div class="form-group d-flex justify-content-center">
                            <input type="submit" value="Sauvegarder" class="btn btn-outline-primary">
                         </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
