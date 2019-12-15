<?php


namespace App\Http\Controllers\Admin;


use App\Models\Role;
use App\Models\UserRole;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminBaseController
{
    public function index(Request $request)
    {
        $data = User::with(['userRole' => function ($query) {}])
            ->orderBy('id', 'desc')
            ->paginate(20);

        $roleList = Role::select(['id', 'name'])->get()->toArray();
        $roleList = array_column($roleList, 'name', 'id');
        return $this->AdminView('user/index', [
            'data' => $data,
            'roleList' => $roleList,
        ]);
    }

    public function edit(Request $request)
    {
        $uid = intval($request->input('id'));
        if ($request->method() == 'GET') {
            $row = User::where('id', $uid)->first();
            $data = Role::where('status', 1)->get()->toArray();
            $roleId = UserRole::where('user_id', $uid)->first()->role_id??0;
            $row['role_id'] = $roleId;
            return $this->AdminView('user/edit', ['info' => $row, 'data' => $data]);
        }

        User::where('id', $uid)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        UserRole::where('user_id', $uid)->update(['role_id'=> (int) $request->input('role_id')]);
        return redirect('/admin/users');
    }

    public function create(Request $request)
    {
        if ($request->method() == 'GET') {
            $data = Role::where('status', 1)->get()->toArray();
            return $this->AdminView('user/create', ['data' => $data]);
        }
        $model = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        UserRole::create([
            'user_id' => $model->id,
            'role_id' => (int) $request->input('role_id'),
        ]);
        return redirect('/admin/users');
    }
}