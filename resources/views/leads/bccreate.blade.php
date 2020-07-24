<section class="content-header">
  <h1>
    Leads
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><i class="fa fa-database"></i> Master</a></li>
    <li><a href="{{url('leads')}}"><i class="fa fa-address-card"></i> Leads</a></li>
    <li class="active"><i class="fa fa-plus"></i> Update</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Update</h3>
    </div>
    <div class="box-body">
    {{Form::open(array('url' => 'leads/update/'.$leads->idleads, 'class' => 'form-horizontal'))}}
      <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" value="{{$leads->name}}" name="name" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-5">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="active" checked> Active
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-5">
          <a href="{{url('leads')}}" class="btn btn-warning pull-right">Back</a>
          <input type="submit" value="Save" class="btn btn-primary">
        </div>
      </div>
      {{ Form::close() }}
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
{{-- <script type="text/javascript">
  $(document).ready(function() {
   $('.datepicker').datepicker();
  });
</script> --}}
