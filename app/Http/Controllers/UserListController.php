<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserListController extends Controller
{
    public function showList() {
//        $users = User::all();
        $users = DB::table('users')->paginate(16);


        return view('admin.profile_list',compact('users'));
    }
}
