<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Return View.
     *
     * @return void
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
