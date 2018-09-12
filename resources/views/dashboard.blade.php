@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script>
    $(document).ready(function(){
        <?php for($i=1;$i<15;$i++){?>
        $('#role<?php echo $i;?>').change(function(){
        var role<?php echo $i;?> = $('#role<?php echo $i;?>').val();
        var userId<?php echo $i;?> = $('#userId<?php echo $i;?>').val();
        $.ajax({
            type: 'get',
            data:'userId='+userId<?php echo $i;?> + '&role=' + role<?php echo $i;?>,
            url:'<?php echo url('/dashboard/updateRole');?>',
            success:function(response){
                console.log('passed successfully');
            }
            });
        });
        <?php } ?>
    });
</script>
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
                                <th width="5">No.</th>
                                <th>Member Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $countRole = 1;?>
                            @foreach ($users as $key => $value)
                        <input type="hidden" value="{{$value->id}}" id="userId<?php echo $countRole;?>">
                                <tr>                                
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>                                         
                                        <td><select name="role" class="form-control" id="role<?php echo $i;?>">
                                            <option value = "1" @if($value->admin=="1") 
                                                selected="selected"@endif>Admin</option>
                                            <option value = "0"@if($value->admin=="" || $value->admin=='0') 
                                                    selected="selected"@endif>User</option>
                                            </select>
                                        </td>                                                       
                                </tr>
                                <?php $countRole++;?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
