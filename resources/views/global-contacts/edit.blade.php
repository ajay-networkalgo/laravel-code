@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Global Contacts</h1>
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
              <h3 class="card-title"></h3>
            </div>
            <form action="{{route('global_contact.update', $globalContacts->id)}}" method="post" id="AaddGlobalContactForm" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Country<span style="color: red;">*</span></label>
                    <select class="form-control" name="country_id" id="country_id">
                      <option value="">Select</option>
                      @foreach($countries as $key => $country)
                        <option value="{{$country->id}}" {{ $globalContacts->country_id == $country->id ? 'selected' : '' }}>{{$country->name}}</option>
                      @endforeach
                    </select>
                    @error('country_id')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Email<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email', $globalContacts->email) }}">
                    @error('email')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Service Hotline<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="service_hotline" id="service_hotline" value="{{ old('service_hotline', $globalContacts->service_hotline) }}">
                    @error('service_hotline')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label>Address<span style="color: red;">*</span></label>
                    <textarea class="form-control" name="address" id="address">{{ old('address', $globalContacts->address) }}</textarea>
                    @error('address')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/global-contacts')!!}" class="btn btn-warning">Back</a>
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
