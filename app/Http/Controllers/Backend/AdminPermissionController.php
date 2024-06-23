<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class AdminPermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();


        return view('backend.pages.admin_permissions.index', compact('permissions'));
    }

    public function getData()
    {
        $permissions = Permission::all();


        return DataTables::of($permissions)
//            ->addColumn('status', function ($admin) {
//                if ($admin->status == 1) {
//                    return ' <a class="status" id="adminStatus" href="javascript:void(0)"
//                                               data-id="'.$admin->id.'" data-status="'.$admin->status.'"> <i
//                                                        class="fa-solid fa-toggle-on fa-2x"></i>
//                                            </a>';
//                } else {
//                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
//                                               data-id="'.$admin->id.'" data-status="'.$admin->status.'"> <i
//                                                        class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
//                                            </a>';
//                }
//            })
            ->addColumn('action', function ($permission) {
                return '<div class="d-flex gap-3"> <a class="editButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$permission->id.'" data-bs-toggle="modal" data-bs-target="#editPermissionModal"><i class="fas fa-edit"></i></a>
                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$permission->id.'" id="deletePermissionBtn""> <i class="fas fa-trash"></i></a>
                                                           </div>';
            })
            ->rawColumns(['action'])

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
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->guard_name= 'admin';


        $permission->save();


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
        $permission = Permission::findOrFail($id);

        if ($permission) {
            return response()->json(['message' => 'success', 'data' => $permission], 200);
        }

        return response()->json(['message' => 'failed'], 400);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::findOrFail($id);

        if ($permission) {
            $permission->name = $request->name;


            $permission->save();

            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'failed'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);

        if ($permission) {
            $permission->delete();

            return response()->json(['message' => 'success'], 200);
        }
        return response()->json(['message' => 'error'], 402);
    }

//    public function changeAdminStatus(Request $request)
//    {
//        $id = $request->id;
//        $status = $request->status;
//
//
//        if ($status == 1) {
//            $stat = 0;
//        } else {
//            $stat = 1;
//        }
//
//        $page = Admin::findOrFail($id);
//        $page->status = $stat;
//        $page->save();
//
//        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
//    }
}
