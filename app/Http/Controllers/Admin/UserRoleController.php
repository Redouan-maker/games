<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{
    public function index() {
        $userRoles = DB::table('model_has_roles')
            ->join('users', 'model_has_roles.model_id', '=', 'users.id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email', 'roles.name as role_name', 'roles.id as role_id')
            ->get();

        return view('admin.user-roles.index', compact('userRoles'));
    }

    public function create() {
        $users = User::all();
        $roles = Role::all();
        return view('admin.user-roles.create', compact('users', 'roles'));
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'role_id' => 'required'
        ]);

        $user = User::findOrFail($request->user_id);
        $role = Role::findById($request->role_id);
        $user->assignRole($role);

        return redirect()->route('admin.user-roles.index');
    }

    public function destroy(Request $request) {
        $user = User::findOrFail($request->user_id);
        $role = Role::findById($request->role_id);
        $user->removeRole($role);

        return redirect()->route('admin.user-roles.index');
    }
}