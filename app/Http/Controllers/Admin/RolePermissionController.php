<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermissionController extends Controller
{
    public function index() {
        // Haal alle unieke combinaties op uit de koppeltabel
        $rolePermissions = DB::table('role_has_permissions')
            ->join('roles', 'role_has_permissions.role_id', '=', 'roles.id')
            ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->select('roles.name as role_name', 'permissions.name as permission_name', 'roles.id as role_id', 'permissions.id as permission_id')
            ->get();

        return view('admin.role-permissions.index', compact('rolePermissions'));
    }

    public function create() {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.role-permissions.create', compact('roles', 'permissions'));
    }

    public function store(Request $request) {
        $request->validate([
            'role_id' => 'required',
            'permission_id' => 'required'
        ]);

        $role = Role::findById($request->role_id);
        $permission = Permission::findById($request->permission_id);
        $role->givePermissionTo($permission);

        return redirect()->route('admin.role-permissions.index');
    }

    public function destroy(Request $request) {
        $role = Role::findById($request->role_id);
        $permission = Permission::findById($request->permission_id);
        $role->revokePermissionTo($permission);

        return redirect()->route('admin.role-permissions.index');
    }
}