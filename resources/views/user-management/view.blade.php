@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Details</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">User All Details</h3>
            </div> -->
            <div class="card-body">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3">
                    <strong>Name</strong>
                  </div>
                  <div class="col-md-9">{{$users->name}}</div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-3">
                    <strong>Email</strong>
                  </div>
                  <div class="col-md-9">{{$users->email}}</div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-3">
                    <strong>Status</strong>
                  </div>
                  <div class="col-md-9">
                    <?php if($users->status == 1) { ?>
                      <button type="button" class="btn btn-xs btn-success">Active</button>
                    <?php }else{ ?>
                      <button type="button" class="btn btn-xs btn-danger">Deactive</button>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <a href="{!! url('admin/user-management') !!}" class="finish btn-primary btn" style="float: right;">Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
