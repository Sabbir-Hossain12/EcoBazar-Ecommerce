<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::get();


        return view('backend.pages.admins.index', compact('admins'));
    }

    public function getData()
    {
        $admin = Admin::all();


        return DataTables::of($admin)
            ->addColumn('action', function ($admin) {
                return '<div class="d-flex gap-3"> <a class="editButton" href="javascript:void(0)" data-id="'.$admin->id.'" data-bs-toggle="modal" data-bs-target="#editAdminModal"><i class="fas fa-edit"></i></a>
                                                             <a href="javascript:void(0)" data-id="'.$admin->id.'"> <i class="fas fa-trash"></i></a>
                                                           </div>';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->type = $request->type;
        $admin->password = Hash::make($request->password);

        $admin->save();


        return response()->json(['message' => 'success'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin) {
            return response()->json(['message' => 'success', 'data' => $admin], 200);
        }

        return response()->json(['message' => 'failed'], 400);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin) {
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->type = $request->type;
            $admin->password = Hash::make($request->password);
            
            $admin->save();

            return response()->json(['message' => 'success'], 200);

        }
        return response()->json(['message' => 'failed'], 404);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
