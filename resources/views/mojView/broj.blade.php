@extends('layouts.app')

<!-- template vježba -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ovo je {{ $txt }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
