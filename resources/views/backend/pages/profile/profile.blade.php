@extends('backend.layout.master')

@push('backendCss')


@endpush

@section('contents')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Profile</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    {{-- Content Starts--}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Update Password</h4>

                </div>
                <div class="card-body p-4 ">

                    <div class="row">
                        <div class="col-lg-6">
                            <form method="post" action="{{url('/admin/update-password')}}">
                                @csrf
                                @if(Session::has('error_message'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('error_message')}}
                                    </div>
                                @endif
                                @if(Session::has('success_message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('success_message')}}
                                </div>
                                @endif
                                <div class="mb-3">
                                    <label for="example-email-input" class="form-label">Email</label>
                                    <input class="form-control" type="email" placeholder="xyz@gmail.com"
                                           id="example-email-input" value="{{Auth::guard('admin')->user()->email}}"
                                           readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="currentPass" class="form-label">Current Password</label>
                                    <input class="form-control" name="currentPass" type="password"
                                           placeholder="Enter Current Password"
                                           id="currentPass">
                                    <div>
                                        <span class="text-info" id="p_check"></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="newPass" class="form-label">New Password</label>
                                    <input class="form-control" name="newPass" type="password"
                                           placeholder="Enter New Password"
                                           id="newPass">
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_newPass" class="form-label">Current Password</label>
                                    <input class="form-control" name="confirm_newPass" type="password"
                                           placeholder="Confirm Current Password"
                                           id="confirm_newPass">
                                </div>
                                <div class="d-grid pt-2 mb-2">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                            </form>
                        </div>


                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Update Admin Details</h4>

                </div>
                <div class="card-body p-4 ">

                    <div class="row">
                        <div class="col-lg-6">
                            <form method="post" action="{{url('/admin/update-admin-details')}}">
                                @csrf
                             
                                @if(Session::has('success_message_details'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('success_message')}}
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="example-email-input" class="form-label">Email</label>
                                    <input class="form-control" type="email" placeholder="xyz@gmail.com"
                                           id="example-email-input" value="{{Auth::guard('admin')->user()->email}}"
                                           readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input class="form-control" name="name" type="text"
                                           placeholder="Enter Name"
                                           id="name" value="{{Auth::guard('admin')->user()->name}}">
                                   
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input class="form-control" name="phone" type="text"
                                           placeholder="Enter Phone"
                                           id="phone" value="{{Auth::guard('admin')->user()->phone}}">
                                </div>
                             
                                <div class="d-grid pt-2 mb-2">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                                

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection

@push('backendJs')

    <script>

        $(document).ready(function () {
            $('#currentPass').keyup(function () {
                let currentPass = $('#currentPass').val();
                $.ajax(
                    {
                        type: 'post',
                        url: 'check-current-pass',
                        data: {
                            "_token": $('#token').val(),
                            currentPass: currentPass
                        },
                        success: function (res) {

                            if (res === "true") {
                                $('#p_check').html('Correct Password');
                            } else {

                                $('#p_check').html('Incorrect Password');
                            }
                        },
                        error: function (err) {
                            console.log(err)
                        }
                    }
                )
            })
        })
    </script>
@endpush