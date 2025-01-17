@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Enquiry Details</h1>
        <hr>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- News Details -->
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Enquiry From Which Form:</strong> {{ $contact_us->enquiry_type }}</p>
                                <p><strong>Name:</strong> {{ $contact_us->name }}</p>
                                <p><strong>Email:</strong> {{ $contact_us->email }}</p>
                                <p><strong>Number:</strong> {{ $contact_us->phone_number }}</p>
                                <p><strong>Country:</strong> {{ $contact_us->country }}</p>
                                <p><strong>Message:</strong> {{ $contact_us->message }}</p>
                            </div>
                        </div>
                        <?php if(!empty($contact_us->files)){?>
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Upload Documents:</strong></p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- <div class="card"> -->
                                            <?php
                                                $ext = pathinfo($contact_us->files, PATHINFO_EXTENSION);
                                            ?>
                                            <?php if($ext == 'pdf'){?>
                                                <a href="{{ asset('uploads/contact_enquiry_attachments/'.$contact_us->files) }}" target="_blank">
                                                    <i class='fas fa-file-pdf' style='color:red;font-size: 110px;'></i>
                                                </a>
                                            <?php }else{?>
                                                <a href="{{ asset('uploads/contact_enquiry_attachments/'.$contact_us->files) }}" target="_blank"><img src="{{ asset('uploads/contact_enquiry_attachments/'.$contact_us->files) }}" class="card-img-top img-fluid" alt="Attachment"></a>
                                            <?php }?>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="box-footer">
                      <div class="text-right">
                        <a href="{{ route('contact.index') }}" class="btn btn-secondary">
                            <i class="fa fa-arrow-left"></i> Back to contact List
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
