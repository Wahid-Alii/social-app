@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 m-auto text-dark bold">All Posts</h1>
        <a class="btn btn-success" href="{{route('post.create')}}"> + Create Post</a>

    </div>

    @if (session('delete'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alert!</strong> {{session('delete')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <table class="table text-dark table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">body</th>
                <th scope="col">Owner</th>
                <th scope="col">Photo</th>
                <th scope="col">Category</th>
                <th scope="col">Created_at</th>
                <th scope="col" class="border-bottom-danger text-center">Action</th>
                {{-- <th scope="col">Updated_at</th> --}}

                {{-- {{url($user->photo ? $user->photo->file : 'No photo')}} --}}
            </tr>
        </thead>

        <tbody>
             @foreach ($posts as $post)
              <tr>
                 <td>{{$post->id}}</td>
                 <td>{{$post->title}}</td>
                 <td>{{$post->body}}</td>
                 <td>{{$post->user->name}}</td>
                    <td>
                        @if ($post->photo)
                        <img src="{{asset('media/'. $post->photo->file)}}"  height="60" width="100px" alt="">
                        @else
                            <h5 class="text-danger">no photo yet</h5>
                        @endif
                    </td>
                    <td>{{$post->category ? $post->category->name : 'Not Categorized'}}</td>
                  {{-- <td>{{$post->created_at->format('l j , F Y')}}</td>   --}}
                  {{-- <td>{{$post->created_at->toDayDateTimeString()}}</td> --}}
                  <td>{{$post->created_at->diffForhumans()}}</td>
                    <td>
                        <form action="{{route('users.destroy' , $post->id)}}" method="post">
                            @csrf
                        @method('Delete')
                        <button class="btn btn-outline-danger" onclick=" return confirm('Are You sure to delete this record ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>

@endsection

