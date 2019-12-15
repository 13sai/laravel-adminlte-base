<?php
/**
 * 后台基础控制器
 */
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBaseController extends Controller
{
    public function getUserId()
    {
        return Auth::id();
    }

    public function AdminView($view = null, $data = [], $mergeData = [])
    {
        return view('admin/'.$view, $data, $mergeData);
    }
}