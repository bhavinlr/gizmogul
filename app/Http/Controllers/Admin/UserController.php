<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with(['locations', 'roles']);
            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->editColumn('avatar', function ($row) {
                    return '<div><img class="rounded-circle avatar-xs" src="' . $row->avatar . '" alt=""></div>';
                })
                ->addColumn('role', function ($row) {
                    return $row->role->name;
                })
                ->addColumn('locations', function ($row) {
                    $vendor = $row->locations->map(function ($value) {
                        return $value->name;
                    })
                        ->implode(', ');
                    return $vendor;
                })
                ->addColumn('action', function ($user) {
                    if ($user->role->slug == 'user') {
                        $btn = '<a href="' . route('admin.user.login', $user->id) . '" class="btn btn-primary btn-sm waves-effect waves-light" target="_blank" role="button">Log in as user</a>';
                        return $btn;
                    }
                    return "";
                })
                ->rawColumns(['avatar', 'role', 'action'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * userLogin through admin panel
     */
    public function userLogin(Request $request)
    {
        $user = User::find($request->id);
        Auth::guard('user')->login($user);
        return redirect()->route('user.dashboard');
    }

    /**
     * user logout only for admin panel
     */
    public function userLogout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('admin.dashboard');
    }
}
