@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>View Menu</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Menu Details</h3>
            </div>
              <div class="card-body">
                <div class="form-group row">
                <div class="col-md-4">
                    <label>Menu Section:</label>
                    <select name="Olax_menu_section" id="Olax_menu_section" class="form-control">
                    <option value="" <?= $menu->Olax_menu_section == "" ? "selected" : "" ?>>--Select--</option>
                    <option value="Header" <?= $menu->Olax_menu_section == "Header" ? "selected" : "" ?>>Header</option>
                    <option value="Footer" <?= $menu->Olax_menu_section == "Footer" ? "selected" : "" ?>>Footer</option>
                    <option value="Company" <?= $menu->Olax_menu_section == "Company" ? "selected" : "" ?>>Company</option>
                    <option value="Services" <?= $menu->Olax_menu_section == "Services" ? "selected" : "" ?>>Services</option>
                </select>

                    @error('Olax_menu_section')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                <div class="col-md-4">
                    <label>name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="Olax_menu_name" id="Olax_menu_name" placeholder="Enter name" value="{{ old('name', $menu->Olax_menu_name) }}">
                    @error('Olax_menu_name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-4">
                    <label>Url<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="Olax_menu_url" id="Olax_menu_url" placeholder="Enter url" value="{{ old('name', $menu->Olax_menu_url) }}">
                    @error('name')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <a href="{!! url('admin/menu')!!}" class="btn btn-warning">Back</a>
              </div>
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
