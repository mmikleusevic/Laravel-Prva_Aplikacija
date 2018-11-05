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
                    <div class="table">
                            <div class="tr">
                                <span class="td">Name</span>
                                <span class="td">Email</span>
                                <span class="td">User</span>
                                <span class="td">Admin</span>
                            </div>
                            @foreach($users as $user)
                            <form class="tr" method="POST" action="/dashboard/storeRole">
                                <span class="td">{{ $user->name }}</span>
                                <span class="td">{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></span>
                                <span class="td"><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></span>
                                <span class="td"><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></span>
                                {{ csrf_field() }}
                                <span class="td"><button type="submit">Assign Roles</button></span>
                            </form>
                            @endforeach
                        </div>
                        <div class="table">
                                <div class="tr">
                                    <span class="td">Name</span>
                                    <span class="td">Email</span>
                                    <span class="td">Password</span>
                                </div>
                                <form class="tr" method="POST" action="/dashboard/storeUser">
                                    <span class="td"><input type="text" name="name"></span>
                                    <span class="td"><input type="text" name="email"></span>
                                    <span class="td"><input type="password" name="password"></span>
                                    {{ csrf_field() }}
                                    <span class="td"><button type="submit">Submit</button></span>
                                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
