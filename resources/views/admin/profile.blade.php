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

                            <h6 class="card-title">Basic Form</h6>

                            <form class="forms-sample" method="POST" action="{{route('admin.profile.update')}} " enctype='multipart/form-data'>
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">name</label>
                                    <input type="text" class="form-control" value="{{$user->name}}" name="name" id="exampleInputUsername1" autocomplete="off" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Username</label>
                                    <input type="text" class="form-control" value="{{$user->username}}" name="username" id="exampleInputUsername1" autocomplete="off" placeholder="Username">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">address</label>
                                    <input type="text" class="form-control" value="{{$user->address}}" name="address" id="exampleInputUsername1" autocomplete="off" placeholder="address">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">phone</label>
                                    <input type="text" class="form-control" value="{{$user->phone}}" name="phone" id="exampleInputUsername1" autocomplete="off" placeholder="Phone">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Image</label>
                                    <input type="file" class="form-control" name="photo" id="uimage" autocomplete="off" placeholder="Password">
                                </div>
                                <div class="mb-3">
                                    <img width="100" height="100" class=" rounded-circle" id="simage" src="{{!(empty($user->photo)) ? url("storage/images/admins/"."$user->photo") : url("images/admins/no_image.jpg")}}" alt="profile image">
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
<script type="text/javascript">
    $(document).ready(function(){
        $('#uimage').on('change', function(e){
            $('#simage').attr('src', URL.createObjectURL(e.target.files[0]));
        });
    });
</script>
@endsection
