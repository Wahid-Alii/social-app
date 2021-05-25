@extends('layouts.admin')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">User</h1>
    </div>

    <table class="table text-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">State</th>
                <th scope="col">Created_at</th>
                {{-- <th scope="col">Updated_at</th> --}}
            </tr>
        </thead>

        <tbody>
         @if ($users)
             @foreach ($users as $user)
              <tr>
                 <th scope="row">{{$user->id}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role_id }}</td>
                  <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                  <td>{{$user->created_at->format('l j , F Y')}}</td>  {{-- <td>{{$user->created_at->toDayDateTimeString()}}</td> --}}
             </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
