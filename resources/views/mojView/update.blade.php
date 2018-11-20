@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Moj Profil</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success">
                            <p>You are logged in as {{ Auth::user()->name }}, you can change your infromation here.</p>
                    </div>
                        <div class="table">
                                <form class="tr" method="POST" action="/update/submitUpdate">
                                        {{ csrf_field() }}
                                        {{ method_field('patch') }}
                                <div class="tr" >
                                    <span class="td">Name</span>
                                    <span class="td" ><input type="text" name="name" value="{{$user->name}}"></span>
                                </div>
                                <div class="tr">
                                    <span class="td">Email</span>
                                    <span class="td"><input type="text" name="email" value="{{$user->email}}"></span>
                                </div>
                                <div class="tr">
                                    <span class="td">Password</span>
                                    <span class="td"><input type="password" name="password"></span>
                                </div>
                                <div class="tr">
                                    <span class="td">Last name</span>
                                    <span class="td"><input type="text" name="last_name" value="{{$user->last_name}}"></span>
                                </div>
                                <div class="tr">
                                    <span class="td">Phone</span>
                                    <span class="td"><input type="text" name="phone" value="{{$user->phone}}"></span>
                                </div>
                                <div class="tr">
                                    <span class="td"><button type="submit" class="button">Submit</button></span>
                                </div>  
                                </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $(".button").click(function(){
        alert("User successfully updated");
    });
});
</script>
@endsection
