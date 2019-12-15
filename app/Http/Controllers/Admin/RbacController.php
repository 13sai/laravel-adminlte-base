<?php


namespace App\Http\Controllers\Admin;


use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;

class RbacController extends AdminBaseController
{
    /**
     * 角色管理
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Swoft\Http\Message\Response
     */
    public function roles(Request $request)
    {
        $data = Role::where('status', 1)->paginate(20);
        return $this->AdminView('rbac/roles', ['data' => $data]);
    }

    public function roleEdit(Request $request)
    {
        if ($request->method() == 'GET') {
            $row = Role::where('id', $request->input('id'))->first();
            return $this->AdminView('rbac/roleEdit', ['info' => $row]);
        }
        Role::where('id', $request->input('id'))->update(['name' => $request->input('name')]);

        return redirect('/admin/roles');
    }

    public function roleCreate(Request $request)
    {
        if ($request->method() == 'GET') {
            return $this->AdminView('rbac/roleCreate');
        }
        Role::create(['name' => $request->input('name')]);

        return redirect('/admin/roles');
    }

    /**
     * 权限分配
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Swoft\Http\Message\Response
     */
    public function permissions(Request $request)
    {
        $data = Permission::select(['id', 'title', 'url', 'pid', 'sort'])
            ->orderBy('sort', 'desc')
            ->orderBy('id', 'asc')
            ->get();
        return $this->AdminView('rbac/permissions', ['data' => $data]);
    }

    public function permissionEdit(Request $request)
    {
        if ($request->method() == 'GET') {
            $row = Permission::where('id', $request->input('id'))->first();
            $data = Permission::where('pid', 0)
                ->where('id', '<>', $request->input('id'))
                ->select(['id', 'pid', 'title', 'sort'])
                ->orderBy('sort', 'desc')
                ->orderBy('id', 'desc')
                ->get()
                ->toArray();
            return $this->AdminView('rbac/permissionEdit', ['info' => $row, 'data' => $data]);
        }
        Permission::where('id', $request->input('id'))
            ->update([
                'title' => $request->input('title'),
                'url' => $request->input('url'),
                'pid' => $request->input('pid'),
            ]);

        return redirect('/admin/permissions');
    }

    public function permissionCreate(Request $request)
    {
        if ($request->method() == 'GET') {
            $data = Permission::where('pid', 0)
                ->select(['id', 'pid', 'title', 'sort'])
                ->orderBy('sort', 'desc')
                ->orderBy('id', 'desc')
                ->get()
                ->toArray();
            return $this->AdminView('rbac/permissionCreate', ['data' => $data]);
        }
        Permission::insert([
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'pid' => $request->input('pid'),
        ]);

        return redirect('/admin/permissions');
    }

    /**
     * 角色权限编辑
     */
    public function access(Request $request)
    {
        $roleId = $request->input('role_id');
        if ($roleId < 1) {
            return $this->errorView('参数错误');
        }
        if ($request->method() == 'POST') {
            $permissionList = $request->input('permission');
            $data = [];
            if (empty($permissionList)) {
                RolePermission::where('role_id', $roleId)->delete();
                return redirect('/admin/roles');
            }
            foreach ($permissionList as $permissionId) {
                $data[] = [
                    'role_id' => $roleId,
                    'permission_id' => $permissionId
                ];
            }
            RolePermission::insert($data);
            return redirect('/admin/roles');
        }
        $accessList = RolePermission::where('role_id', $roleId)->pluck('permission_id')->toArray();
        $permissionList = Permission::all();
        // dd($accessList);
        return $this->AdminView('rbac/access', ['accessList' => $accessList, 'permissionList' => $permissionList, 'roleId' => $roleId]);
    }
}