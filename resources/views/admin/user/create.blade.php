@extends('adminlte::page')

@section('title', 'saiblog')

@section('content_header')
    <h1>角色</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">添加</h3>
        </div>
        <form role="form" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="box-body">
                <div class="form-group">
                    <label for="name">昵称</label>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
                <div class="form-group">
                    <label for="email">邮箱</label>
                    <input type="email" class="form-control" id="email" name="email" >
                </div>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>
                <div class="form-group">
                    <label for="top-pel">角色</label>
                    <select class="form-control" id="top-per" name="role_id">
                        @foreach ($data as $val)
                            <option value="{{$val['id']}}">{{$val['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">提交</button>
                <a class="btn btn-warning" href="{{route('admin/users')}}">返回</a>
            </div>
        </form>
    </div>
@stop