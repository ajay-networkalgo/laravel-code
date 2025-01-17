@extends('layout.admin')
@section('page-content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Page Script</h1>
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
              <h3 class="card-title">Page Script Details</h3>
            </div>
            <form action="#" method="post" id="addPageScriptForm">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-12">
                      <label>Page</label>
                      <input type="text" id="page" value="{{ $pagescript->page ?? '' }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                      <textarea name="page_script" id="page_script" class="form-control" readonly>{!! $pagescript->page_script ?? '' !!}</textarea>
                    </div>
                </div>
              <div class="card-footer" style="float: right;">
                <a href="{!! url('admin/page-script')!!}" class="btn btn-warning">Back</a>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/javascript/javascript.min.js"></script>

<script>
    var headerEditor = CodeMirror.fromTextArea(document.getElementById('page_script'), {
        mode: 'javascript',
        lineNumbers: true,
        theme: 'default',
    });
</script>


@endsection
