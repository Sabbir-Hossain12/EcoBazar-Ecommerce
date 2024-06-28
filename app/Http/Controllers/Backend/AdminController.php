<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class AdminController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
        
            new Middleware('permission:View Admin,admin', only: ['index']),
            new Middleware('permission:Create Admin,admin', only: ['store']),
            new Middleware('permission:Edit Admin,admin', only: ['update']),
            new Middleware('permission:Delete Admin,admin', only: ['destroy']),


        ];
    }

   
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
            ->addColumn('status', function ($admin) {
                if ($admin->status == 1) {
                    return ' <a class="status" id="adminStatus" href="javascript:void(0)"
                                               data-id="'.$admin->id.'" data-status="'.$admin->status.'"> <i
                                                        class="fa-solid fa-toggle-on fa-2x"></i>
                                            </a>';
                } else {
                    return '<a class="status" id="adminStatus" href="javascript:void(0)"
                                               data-id="'.$admin->id.'" data-status="'.$admin->status.'"> <i
                                                        class="fa-solid fa-toggle-off fa-2x" style="color: grey"></i>
                                            </a>';
                }
            })
            ->addColumn('role', function ($admin) {
                $role = $admin->getRoleNames();
//                $string = implode(',', $role);

                if (count($role)) {
                    return   '<span class="badge bg-success">'.$role[0].'</span>' ;
                }
                return '';
            })
            ->addColumn('action', function ($admin) {
                if(Auth::guard('admin')->user()->can('Delete Admin'))
                {
                    
                return '<div class="d-flex gap-3"> <a class="editButton btn btn-sm btn-primary" href="javascript:void(0)" data-id="'.$admin->id.'" data-bs-toggle="modal" data-bs-target="#editAdminModal"><i class="fas fa-edit"></i></a>
                                                             <a class="btn btn-sm btn-danger" href="javascript:void(0)" data-id="'.$admin->id.'" id="deleteAdminBtn""> <i class="fas fa-trash"></i></a>
                                                           </div>';
                }
            })
            ->rawColumns(['action', 'status', 'role'])
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
        $admin->password = $request->password;

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
        $roles = Role::get();
//            dd($roles);
        $admin = Admin::findOrFail($id);

        if ($admin) {
            return response()->json(['message' => 'success', 'data' => $admin, 'roles' => $roles], 200);
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

            $admin->syncRoles($request->role);
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
        $admin = Admin::findOrFail($id);

        if ($admin) {
            $admin->delete();

            return response()->json(['messsage' => 'success'], 200);
        }
        return response()->json(['messsage' => 'error'], 402);
    }

    public function changeAdminStatus(Request $request)
    {
        $id = $request->id;
        $status = $request->status;


        if ($status == 1) {
            $stat = 0;
        } else {
            $stat = 1;
        }

        $page = Admin::findOrFail($id);
        $page->status = $stat;
        $page->save();

        return response()->json(['message' => 'success', 'status' => $stat, 'id' => $id]);
    }
}
