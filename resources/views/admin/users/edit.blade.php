@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-dark">Edit User ( {{$user->name}} )</h1>
</div>

<div class="row">

<div class="col-sm-3">

    @if ($user->photo)
        <img src="{{asset('media/'. $user->photo->file)}}" height="250px" width="250px" class="rounded" alt="">
        @else
            {{-- <img src="http://placehold.it/400x400" alt=""> --}}
            <h5 class="text-danger">No Photo Yet</h5>
        @endif
</div>

    <div class="col-sm-7">
<form action="{{route('users.update', $user->id)}}" method="POST" class="text-dark" enctype="multipart/form-data" >
    @csrf
    @method('PATCH')
    <div class="form-group ">
      <label for="name">Name</label>
      <input type="text" class="form-control
      @error('name')
          is-invalid
      @enderror
      " name="name"
      value="{{$user->name}}">
      {{-- <div>
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
      </div> --}}
    </div>

    <div class="form-group ">
      <label for="email">Email</label>
      <input type="email" class="form-control
        @error('email')
        is-invalid
        @enderror
        " name="email" value="{{$user->email}}">
    </div>

    <div class="form-group ">
      <label for="role_id">Choose a role:</label>
        <select name="role_id"  class="form-control
        @error('role_id')
        is-invalid
        @enderror
        " value="{{$user->role->id}}">
            <option value="">-- Choose Option --</option>
            @foreach ($roles as $role)
            <option @if ($user->role->id==$role->id) selected @endif value="{{$role->id}}">
                {{$role->name}}
            </option>
            @endforeach
        </select>
    </div>

       <div class="form-group ">
            <label for="is_active">State</label>
            <select class="form-control
            @error('is_active')
            is-invalid
           @enderror
            " name="is_active" value="{{$user->is_active }}">
                @if ($user->is_active)
                <option selected value="1">Active</option>
                <option value='0'>Not Active</option>
                @else
                <option value='1'>Active</option>
                <option selected value='0'>Not Active</option>
                @endif
            </select>
        </div>

        <div class="form-group ">
            <label for="photo_id"></label>
            <input type="file" class="form-control-file" value="" name="photo_id">
          </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password"  class="form-control
            @error('password')
            is-invalid
            @enderror
            "  name="password" >
        </div>

    <button type="submit" class="btn btn-primary">Update User</button>
  </form>
</div>
</div>
@endsection
