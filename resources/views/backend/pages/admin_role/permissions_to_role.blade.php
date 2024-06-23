@extends('backend.layout.master')

@section('backendCss')
    {{--    <meta name="csrf_token" content="{{ csrf_token() }}" />--}}

    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
          rel="stylesheet" type="text/css">
    <link href="{{asset('public/backend')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
          rel="stylesheet" type="text/css">

@endsection

@section('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
{{--                <h4 class="mb-sm-0 font-size-18">Assign Permissions to Role</h4>--}}

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{-- Table Starts--}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Add Permissions to Role: <span class="fw-bolder text-primary">{{$role->name}}</span></h4>
                      
                    </div>

                </div>
                <div class="card-body">
                    @foreach($permissions as $permission)
                    <div class="col-md-6">

                        <div>
                            
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="permissions[]" type="checkbox" id="formCheck1">
                                <label class="form-check-label" for="formCheck1">
                                    {{$permission->name}}
                                </label>
                            </div>
                            


                        </div>
                    </div>
                    @endforeach
                    
                    <div class="mt-4 d-flex justify-content-end">
                        <button class="btn btn-lg btn-primary" type="button">Update</button>
                    </div>
                   


                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>


@endsection

@section('backendJs')
    
    
@endsection