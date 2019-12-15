@extends('adminlte::page')

@section('title', 'saiblog')

@section('content_header')
    <h1>角色</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
{{--            <h3 class="box-title">角色</h3>--}}
            <a class="btn btn-warning" href="{{route('admin/role/create')}}">添加</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tbody><tr>
                    <th style="width: 10px">#</th>
                    <th>角色名称</th>
                    <th>操作</th>
                </tr>
                @foreach ($data as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>
                        <a href="{{route('admin/role/edit', ['id' => $role->id])}}" class="btn btn-success">编辑</a>
                        <a href="{{route('admin/access', ['role_id' => $role->id])}}" class="btn btn-info">权限</a>
                    </td>
                </tr>
                @endforeach
                </tbody></table>
        </div><!-- /.box-body -->
        <div class="box-footer clearfix text-right">
            {{$data->links()}}
        </div>
    </div>
@stop