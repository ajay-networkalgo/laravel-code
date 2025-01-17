@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Roles</h1>
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
            <form action="{{ route('roles.save') }}" method="post" id="addUserForm">
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
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="select-all"> Select All Permissions
                    </label>
                </div>
                <div class="form-group">
                    @foreach ($module_lists as $module)
                      <div class="module-permission-item" style="margin-bottom: 10px;">
                        <label>
                            <input type="checkbox" class="module-checkbox" name="modules[]" value="{{ $module->id }}">
                            {{ $module->title }}
                        </label>
                    </div>
                    @endforeach
                  </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/roles-management')!!}" class="btn btn-warning">Back</a>
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
    $("#addUserForm").validate({
      rules: {
        'name':{
          required:true,
          noSpace: true,
          allowedCharacter: true
        },
      },
      messages:{
        'name':{
          required:'Please enter name',
        }
      }
    });
    $.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    },'Space are not allowed');

    $.validator.addMethod("allowedCharacter", function(value, element) {
      const regex = /^[a-zA-Z\s]+$/;
      return regex.test(value);
    }, 'Special Characters are not allowed');

    document.getElementById('select-all').addEventListener('change', function () {
      let checkboxes = document.querySelectorAll('.module-checkbox');
      checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
      });
    });
    let checkboxes = document.querySelectorAll('.module-checkbox');
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function () {
        let selectAll = document.getElementById('select-all');
        if (!this.checked) {
          selectAll.checked = false;
        }else{
          let allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
          selectAll.checked = allChecked;
        }
      });
    });
    
  });
</script>
@endsection
