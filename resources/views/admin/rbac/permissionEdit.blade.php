@extends('adminlte::page')

@section('title', 'saiblog')

@section('content_header')
    <h1>角色</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">编辑</h3>
        </div>
        <form role="form" method="post">
            <input type="hidden" name="id" value="{{$info->id}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="box-body">
                <div class="form-group">
                    <label for="title">名称</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$info->title}}">
                </div>
                <div class="form-group">
                    <label for="url">链接</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{$info->url}}">
                </div>
                <div class="form-group">
                    <label for="top-pel">上级</label>
                    <select class="form-control" id="top-per" name="pid">
                        <option value="0">顶级</option>
                        @foreach ($data as $val)
                        <option value="{{$val['id']}}" @if ($val['id'] == $info->pid) selected @endif>{{$val['title']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">提交</button>
                <a class="btn btn-warning" href="{{route('admin/permissions')}}">返回</a>
            </div>
        </form>
    </div>
@stop