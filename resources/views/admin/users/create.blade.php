@extends('layouts.admin')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-dark">Create User</h1>
</div>


<form action="{{route('users.store')}}" method="POST" class="text-dark" enctype="multipart/form-data" >
    @csrf
    <div class="form-group col-sm-6">
      <label for="name">Name</label>
      <input type="text" class="form-control
      @error('name')
          is-invalid
      @enderror
      " name="name"
      value="{{old('name')}}">
      {{-- <div>
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
      </div> --}}
    </div>

    <div class="form-group col-sm-6">
      <label for="email">Email</label>
      <input type="email" class="form-control
        @error('email')
        is-invalid
        @enderror
        " name="email" value="{{old('email')}}">
        <div>
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
    </div>

    <div class="form-group col-sm-6">
      <label for="role_id">Choose a role:</label>
        <select name="role_id"  class="form-control
        @error('role_id')
        is-invalid
        @enderror
        " value="{{old('name')}}">
            <option value="null">-- Choose Option --</option>
            @foreach ($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>

       <div class="form-group col-sm-6">
            <label for="is_active">State</label>
            <select class="form-control
            @error('is_active')
            is-invalid
           @enderror
            " name="is_active" >
                <option value="null"></option>
                <option value='0'>Not Active</option>
                <option value='1'>Active</option>
            </select>
        </div>

        <div class="form-group col-sm-6">
            <label for="photo_id"></label>
            <input type="file" class="form-control-file" value="null" name="photo_id">
          </div>

        <div class="form-group col-sm-6">
            <label for="password">Password</label>
            <input type="password" class="form-control
            @error('password')
            is-invalid
            @enderror
            "  name="password">
        </div>

    <button type="submit" class="btn btn-primary">Create User</button>
  </form>
@endsection
