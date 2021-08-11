<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $total_roles = count(Role::select('id')->get());
        $total_admins = count(User::select('id')->get());
        $total_permissions = count(Permission::select('id')->get());
        return view('admin.dashboard.index', compact('total_admins', 'total_roles', 'total_permissions'));
    }


}
