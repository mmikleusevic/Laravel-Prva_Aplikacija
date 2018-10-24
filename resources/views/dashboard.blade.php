@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success">
                            <p>You are logged in as Administrator</p>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="5">Name</th>
                                <th>Email</th>
                                <th>User</th>
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody>                    
                        @foreach($users as $user)
                            <tr>
<<<<<<< HEAD
                                <form action="/dashboard" method="POST">
=======
                                <form action={{ route('store') }} method="POST">
>>>>>>> origin/master
                                    <td>{{ $user->name }}</td>                                
                                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                    <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>                                    
                                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                                    {{ csrf_field() }}
                                    <td><button type="submit">Assign Roles</button></td>
                                </form>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <table>
                        <thead>
                            <tr>
                                <th width="175px">Name</th>
                                <th width="175px">Email</th>
                                <th width="175px">Password</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <form action="/dashboard"  method="POST">
                                    <td><input type="text" name="Name"></td>                                
                                    <td><input type="text" name="Email"></td>
                                    <td><input type="password" name="password"></td>
                                    {{ csrf_field() }}
                                    <td><button type="submit">Submit</button></td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
