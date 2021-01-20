@extends('adminlte::page')

@section('title', 'saiblog')

@section('content_header')
    <h1>权限</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">编辑</h3>
        </div>
        <form role="form" method="post">
            <input type="hidden" name="role_id" value="{{$roleId}}">
            <input type="hidden" name="accessStr" value="{{$accessStr}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="box-body">
                @foreach ($permissionList as $permission)
                @if ($permission->pid == 0)
                <dl>
                <dt>
                    <label class="permission @if(in_array($permission->id, $accessList)) is-checked @endif" data-id="{{$permission->id}}">
                        <input name="permission[]" value="{{$permission->id}}" type="checkbox" @if(in_array($permission->id, $accessList)) checked @endif/>&nbsp;{{$permission->title}}
                    </label>
                </dt>
                @foreach ($permissionList as $value)
                @if ($value->pid == $permission->id)
                <dd>
                ---&nbsp;<label><input name="permission[]" value="{{$value->id}}" class="permission-child-{{$permission->id}}" type="checkbox" @if(in_array($permission->id, $accessList)) checked @endif/>&nbsp;{{$value->title}}</label>
                </dd>
                @endif
                @endforeach
                </dl>
                @endif
                @endforeach
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">提交</button>
                <a class="btn btn-warning" href="{{route('admin/roles')}}">返回</a>
            </div>
        </form>
    </div>
@stop

@section('js')
<script>
$(document).ready(function(){
  $(".permission").click(function(){
    var pid = $(this).data('id'),
    iCheck = $(this).hasClass('is-checked');
    console.info(iCheck);
    console.info(".permission-child-" + pid);
    if (iCheck) {
        $(this).removeClass('is-checked')
        $(".permission-child-" + pid).prop('checked', false);
    } else {
        $(this).addClass('is-checked')
        $(".permission-child-" + pid).prop('checked', true);
    }
  });
});
</script>
@stop