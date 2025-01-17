@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>FAQ Details</h1>
    <hr>
  </section>
  <section class="content">
    <div class="container-fluid">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Feature Title</th>
            <th>Feature Content</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $faq->feature_title }}</td>
            <td>{{ $faq->feature_content }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="box-footer">
  <div class="text-right">
    <a href="{{ route('faq.index') }}" class="btn btn-secondary">
      <i class="fa fa-arrow-left"></i> Back to faq List </a>
  </div>
</div>
  </section>
</div>
@endsection
@section('styles')
<style>
.card {
    position: relative;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
}

.card-img-top {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.box-title {
    font-size: 24px;
    font-weight: bold;
}
.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
    color: white;
}
</style>
@endsection
