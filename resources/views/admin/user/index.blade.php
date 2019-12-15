@extends('adminlte::page')

@section('title', 'saiblog')

@section('content_header')
    <h1>用户</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a class="btn btn-warning" href="{{route('admin/user/create')}}">添加</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>昵称</th>
                    <th>邮箱</th>
                    <th>角色</th>
                    <th>操作</th>
                </tr>
                @foreach ($data as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$roleList[$user->userRole->role_id]}}</td>
                    <td>
                        <a href="{{route('admin/user/edit', ['id' => $user->id])}}" class="btn btn-success">编辑</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix text-right">
            {{$data->links()}}
        </div>
    </div>
@stop