@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add FAQ</h1>
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
              <h3 class="card-title">FAQ Details</h3>
            </div>
            <form action="{{ route('faq.update',$faq->id) }}" method="post" id="editFAQForm">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label>Product Type <span style="color: red;">*</span></label>
                    <select name="product_type_id" id="product_type_id" class="form-control">
                      <option value="">--Select--</option>
                      @foreach($product_types as $type)
                        <option value="{{ $type->id }}" {{ $faq->product_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                      @endforeach
                    </select>
                    @error('product_type_id')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label>Product</label>
                    <select name="product_id" id="product_id" class="form-control">
                      <option value="">--Select--</option>
                      @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ $faq->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                      @endforeach
                    </select>
                    @error('product_id')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  
                </div>
                <div class="form-group row">
                  
                </div>
                <div class="form-group row">
                <div class="col-md-12">
                    <label>Feature Title<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="feature_title" id="feature_title" placeholder="Enter feature title" value="{{ old('feature_title', $faq->feature_title) }}">
                    @error('feature_title')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                  </div>
                  <div class="form-group row">
                  <div class="col-md-12">
                    <label>Feature Content<span style="color: red;">*</span></label>
                    <textarea id="feature_content" name="feature_content" class="form-control" placeholder="Enter feature content">{{ old('feature_content', $faq->feature_content) }}</textarea>
                    @error('feature_content')
                      <div class="error">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="card-footer" style="float: right;">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{!! url('admin/faq')!!}" class="btn btn-warning">Back</a>
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
