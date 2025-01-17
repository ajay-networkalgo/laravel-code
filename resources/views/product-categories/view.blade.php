@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Product Type Details</h1>
        <hr>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- News Details -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $productcategories->name }}</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Description:</strong></p>
                                <p>{!! $productcategories->description !!}</p>
                            </div>
                        </div>
                        <?php if(!empty($productcategories->feature_image)){?>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Featured Image</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="/img/product_images/{{$productcategories->feature_image}}" class="card-img-top img-fluid" alt="News Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="box-footer">
                      <div class="text-right">
                        <a href="{{ route('product-categories.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Back to Product Type List
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
