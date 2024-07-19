@extends('layouts.admin')
@section('title','Profile')
@section('content')

<div class="page-content">


    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div>
                    <img class="wd-40 rounded-circle" src="{{!(empty($user->photo)) ? url("storage/images/admins/"."$user->photo") : url("images/admins/no_image.jpg")}}" alt="profile">
                    <span class="h4 ms-3"> {{$user->name}} </span>
                </div>
              <div class="dropdown">
                <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Update</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View all</span></a>
                </div>
              </div>
            </div>
            {{-- <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p> --}}
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
              <p class="text-muted">{{$user->created_at}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
              <p class="text-muted">{{$user->address}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
              <p class="text-muted">{{$user->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">phone:</label>
              <p class="text-muted">{{$user->phone}}</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

                            <h6 class="card-title">Change Password</h6>

                            <form class="forms-sample" method="POST" action="{{route('admin.password.update')}} ">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Old Password</label>
                                    <input type="password" class="form-control" name="old_password"  autocomplete="off" placeholder="Enter old password">
                                    @error('old_password')
                                        <div class="alert alert-danger"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">New Password</label>
                                    <input type="password" class="form-control" name="password"  autocomplete="off" placeholder="Enter new password">
                                    @error('password')
                                        <div class="alert alert-danger"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" autocomplete="off" placeholder="Confirm Your password">
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button  class="btn btn-secondary">Cancel</button>
                            </form>


          </div>
        </div>
                </div>
      <!-- right wrapper end -->
    </div>

        </div>
@endsection
@section('js')

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
@if(Session::has('message'))
var type = "{{ Session::get('alert_type','info') }}"
switch(type){
   case 'info':
   toastr.info(" {{ Session::get('message') }} ");
   break;

   case 'success':
   toastr.success(" {{ Session::get('message') }} ");
   break;

   case 'warning':
   toastr.warning(" {{ Session::get('message') }} ");
   break;

   case 'error':
   toastr.error(" {{ Session::get('message') }} ");
   break;
}
@endif
</script>
@endsection
