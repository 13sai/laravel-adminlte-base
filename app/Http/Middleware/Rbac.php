<?php
/**
 * author: 13sai
 * RBAC验证
 */

namespace App\Http\Middleware;


use App\Models\Permission;
use App\Models\RolePermission;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class Rbac
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!$this->_checkAuth($request)) {
            return response()->view('errors/exception', ['message'=> '您无权访问！']);
        }

        return $next($request);
    }

    private function _checkAuth($request)
    {
        $currentUrl = $request->path();

        if (in_array($currentUrl, config('auth.rbac.except'))) {
            return true;
        }

        $permissionId = Permission::where('url', $currentUrl)->first()->id??0;
        $uid = Auth::id();
        $roleId = User::getRole($uid);

         return RolePermission::where('role_id', $roleId)
            ->where('permission_id', $permissionId)
            ->exists();
    }
}