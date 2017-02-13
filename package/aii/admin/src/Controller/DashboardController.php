<?php

namespace Aii\Admin\Controller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends AdminController
{
    public function Index(){
        return view('admin::templates.dashboard.dashboard');
    }
}
