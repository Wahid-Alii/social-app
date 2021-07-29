@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Create Post</h1>
    </div>


        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>
         </div>
        @endif


    {!! Form::open(['method'=>'POST', 'route'=>'post.store' , 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title :') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
            <div>
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

        </div>
        <div class="form-group">
                <label for="category_id">Choose Category :</label>
                  <select name="category_id"  class="form-control
                  @error('category_id')
                  is-invalid
                  @enderror
                  " value="{{old('name')}}">
                      <option value="null">Null</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                  </select>
        </div>
        {{-- <div class="form-group">
            {!! Form::label('category_id', 'Category :') !!}
            {!! Form::select('category_id',[''=>'Choose category'] . $categories ,null, ['class'=>'form-group']) !!}
        </div> --}}

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo :') !!}
            {!! Form::file('photo_id', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Description :') !!}
            {!! Form::textarea('body',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
           {!! Form::submit('Create Post', ['class'=>'btn btn-success']) !!}
        </div>

   {!! Form::close() !!}



@endsection
