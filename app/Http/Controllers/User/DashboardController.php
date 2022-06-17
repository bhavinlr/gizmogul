<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
