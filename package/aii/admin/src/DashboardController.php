<?php

namespace Aii\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function Index(){
        return view('admin::templates.dashboard.dashboard');
    }
}
