@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add User</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Details</h3>
            </div>
            <form action="{{ route('user.save') }}" method="post" id="addUserForm">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{ old('name') }}">
                    @error('name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Email<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Password<span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                    @error('password')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Confirm Password<span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Enter confirm password">
                    @error('cpassword')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>User Roles<span style="color: red;">*</span></label>
                    <select name="role_id" id="role_id" class="form-control">
                      <option value="">Select Roles</option>
                      @foreach($user_roles as $role)
                      <option value="{{$role->id}}">{{$role->roles}}</option>
                      @endforeach
                    </select>
                    @error('role_id')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/user-management')!!}" class="btn btn-warning">Back</a>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
  });
</script>
@endsection
