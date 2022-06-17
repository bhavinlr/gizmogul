<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Return View.
     *
     * @return void
     */
    public function index()
    {
        $user = Auth::user();
        $locations = $user->locations()->get();
        return view('vendor.dashboard', compact('locations', 'user'));
    }
}
