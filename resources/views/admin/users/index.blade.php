@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">User</h1>
    </div>

    <table class="table text-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">State</th>
                <th scope="col">Created_at</th>
                {{-- <th scope="col">Updated_at</th> --}}

                {{-- {{url($user->photo ? $user->photo->file : 'No photo')}} --}}
            </tr>
        </thead>

        <tbody>
         @if ($users)
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
             </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
