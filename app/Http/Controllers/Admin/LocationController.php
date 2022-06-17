<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\User;
use App\Models\UserLocationAssign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Location::with('users');
            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return '<div class="dropdown">
                                <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="' . route('admin.location.edit', $user->id) . '">Edit</a>
                                    <a class="dropdown-item" href="' . route('admin.location.show', $user->id) . '">View</a>
                                </div>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.locations.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        $location = $id ? Location::findOrFail($id) : null;
        $users = User::all();
        return view('admin.locations.edit', compact('location', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {
        $location = $id ? Location::findOrFail($id) : null;
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email:rfc,strict,dns,spoof,filter|unique:locations,email,' . ($location ? $location->id : ''),
            'address' => 'required|max:255',
            'address2' => 'max:255',
            'phone' => 'required|numeric|digits_between:0,9',
            'city' => 'required|string|max:30',
            'state' => 'required|string|max:30',
            'zip' => 'required|numeric|digits_between:0,9',
        ]);

        $data = $request->all();

        $location = Location::updateOrCreate(['id' => $location->id ?? null], $data);
        $location->users()->sync($data['user_id']);

        if ($location) {
            return redirect()->route('admin.location.index')->with('success', 'Location created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.locations.show', compact('location'));
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
}
