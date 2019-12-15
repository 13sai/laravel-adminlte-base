@extends('adminlte::page')

@section('title', 'saiblog')

@section('content_header')
    <h1>权限</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
{{--            <h3 class="box-title">角色</h3>--}}
            <a class="btn btn-warning" href="{{route('admin/permission/create')}}">添加</a>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th style="width: 50px">#</th>
                    <th>权限名称</th>
                    <th>链接</th>
                    <th>操作</th>
                </tr>
                @foreach ($data as $permission)
                @if ($permission->pid == 0)
                <tr>
                    <td>{{$permission->id}}</td>
                    <td>{{$permission->title}}</td>
                    <td>{{$permission->url}}</td>
                    <td>
                        <a href="{{route('admin/permission/edit', ['id' => $permission->id])}}" class="btn btn-success">编辑</a>
                    </td>
                </tr>
                @foreach ($data as $val)
                    @if ($val->pid == $permission->id)
                    <tr>
                        <td>--</td>
                        <td>{{$val->title}}</td>
                        <td>{{$val->url}}</td>
                        <td>
                            <a href="{{route('admin/permission/edit', ['id' => $val->id])}}" class="btn btn-success">编辑</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix text-right">
        </div>
    </div>
@stop