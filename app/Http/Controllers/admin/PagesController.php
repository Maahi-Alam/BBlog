<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //

    public function getDashboard()
    {
        return view('admin.index');
    }

    


}
