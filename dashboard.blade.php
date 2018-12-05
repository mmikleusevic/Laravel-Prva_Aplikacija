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
                                <input type="hidden" id="user_id" class="user_id" name="user_id" value="{{ $user->id }}">
                                <span class="td">{{ $user->name }}</span>
                                <span class="td">{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></span>
                                <input type="hidden" id="role_id" class="role_id" name="role_id" value="0">
                                <span class="td"><input onchange="mySubmit(this.form)" id="role_id" class="role_id" type="radio" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_id" value="1"></span>
                                <span class="td"><input onchange="mySubmit(this.form)" id="role_id" class="role_id" type="radio" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_id" value="2"></span>
                                {{ csrf_field() }}                   
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
                                    <span class="td"><input type="text" name="name" required></span>
                                    <span class="td"><input type="text" name="email" required></span>
                                    <span class="td"><input type="password" name="password" required></span>
                                    {{ csrf_field() }}
                                    <span class="td"><button type="submit">Submit</button></span>
                                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function mySubmit(theForm) {
    $.ajax({
        data: $(theForm).serialize(),
        type: $(theForm).attr('method'),
        url: $(theForm).attr('action'),
        success: function (data) { 
            alert("Role updated successfully");
        }
    });
}

</script>
@endsection
