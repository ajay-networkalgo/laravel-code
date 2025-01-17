@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Event Details</h1>
        <hr>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- News Details -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $events->title }}</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>From Date:</strong> {{ $events->from_date }}</p>
                                <p><strong>To Date:</strong> {{ $events->to_date }}</p>
                                <p><strong>Location:</strong> {{ $events->location }}</p>
                                <p><strong>Description:</strong></p>
                                <p>{!! $events->description !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Featured Image</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="/img/events_images/feature_image/{{$events->featured_image}}" class="card-img-top img-fluid" alt="News Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                      <div class="text-right">
                        <a href="{{ route('events.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Back to Event List
                        </a>
                      </div>
                    </div>
                </div>
                <!-- /.box -->
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
