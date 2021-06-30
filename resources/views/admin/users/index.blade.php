@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 m-auto text-dark bold">All Users</h1>
        <a class="btn btn-success" href="{{route('users.create')}}"> + New User</a>

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
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">State</th>
                <th scope="col">Created_at</th>
                <th scope="col" class="border-bottom-danger">Action</th>
                {{-- <th scope="col">Updated_at</th> --}}

                {{-- {{url($user->photo ? $user->photo->file : 'No photo')}} --}}
            </tr>
        </thead>

        <tbody>
             @foreach ($users as $user)
              <tr>
                 <td>{{$user->id}}</td>
                    <td>
                        @if ($user->photo)
                        <img src="{{asset('media/'. $user->photo->file)}}"  height="60" width="100px" alt="">
                        @else
                            <h5 class="text-danger">no photo yet</h5>
                        @endif
                    </td>
                  <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role ? $user->role->name : 'Not Assigned' }}</td>
                  <td>{{$user->is_active == 1 ? 'Active' : 'Not Active' }}</td>
                  <td>{{$user->created_at->format('l j , F Y')}}</td>  {{-- <td>{{$user->created_at->toDayDateTimeString()}}</td> --}}
                    <td>
                        <form action="{{route('users.destroy' , $user->id)}}" method="post">
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
