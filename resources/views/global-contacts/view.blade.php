@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Global Contacts Details</h1>
        <hr>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $globalContacts->country->name }}</h3><br/>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Address:</strong>{!! $globalContacts->address !!}</p>
                                <p><strong>Email:</strong> {{ $globalContacts->email }}</p>
                                <p><strong>Service Hotline:</strong>{!! $globalContacts->service_hotline !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                      <div class="text-right">
                        <a href="{{ route('global_contact.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Back to Global Contact List
                        </a>
                      </div>
                    </div>
                </div>
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
