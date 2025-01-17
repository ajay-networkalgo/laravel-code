@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Contact List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Contact</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Contact Us</h3>
            </div>
            <div class="card-body">
              <table id="contact_list" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">Sr.no</th>
                    <th class="text-center">Enquiry Type</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone number</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($contacts) > 0){?>
                    <?php foreach($contacts as $key => $contact){?>
                      <tr>
                        <td>{{ $key + 1}}</td>
                        <td>{{$contact->enquiry_type}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone_number}}</td>
                        <td><a href="{{ route('contact.view',base64_encode($contact->id)) }}" class="mr-2"><i class="fas fa-eye"></i></a></td>
                      </tr>
                    <?php }?>
                  <?php }else{?>
                    <tr><td colspan="6">No Record Found</td></tr>
                  <?php }?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
