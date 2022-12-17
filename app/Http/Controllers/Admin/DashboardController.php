<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.content');
    }

    public function users() {
        $users = User::all();

        return view('admin.users.index', [
            "title" => "Users",
            "dataUser" => $users
        ]);
    }

    public function view(User $user) {
        $users = User::find($user->id);

        return view('admin.users.view', [
            "title" => "View User",
            "data" => $users
        ]);
    }
}
