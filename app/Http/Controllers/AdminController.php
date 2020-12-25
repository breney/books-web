<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function adminHome(){
        return view("admin.admin_home");
    }

    function adminInsert(){
        return view("admin.admin_insertmode");
    }

    function adminDelete(){
        return view("admin.admin_deletemode");
    }

    function adminUpdate(){
        return view("admin.admin_updatemode");
    }
}
