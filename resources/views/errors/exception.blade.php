@extends('adminlte::page')

@section('title', 'saiblog')

@section('content_header')
    <h1>首页</h1>
@stop

@section('content')
    <div class="alert">{{$message}}</div>
@stop