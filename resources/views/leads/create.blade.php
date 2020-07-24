<section class="content-header">
  <h1>
    Leads
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><i class="fa fa-database"></i> Master</a></li>
    <li><a href="{{url('leads')}}"><i class="fa fa-address-card"></i> Leads</a></li>
    <li class="active"><i class="fa fa-plus"></i> Create New</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Create New</h3>
    </div>
    <div class="box-body">
      {{ Form::open(array('url' => 'leads/create-new', 'class' => 'form-horizontal')) }}


      <div class="form-group">
      <label class="col-sm-2 control-label">Name</label>
            <div class="box-body">
              <div class="col-xs-1">
                <select class="form-control" name="gelar">
                  <option value="mr">Mr.</option>
                  <option value="ms">Ms.</option>
                  <option value="mrs">Mrs.</option>
                  <option value="dr">Dr.</option>
                </select>
              </div>
                <div class="col-xs-2">
                  <input type="text" class="form-control" placeholder="first name" name="firstname" required>
                </div>
                <div class="col-xs-2">
                  <input type="text" class="form-control" placeholder="last name" name="lastname" required>
                </div>

            </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Account Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Account Name" name="account" required>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-2 control-label">Tittle</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Tittle" name="tittle" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Website</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Website" name="website" required>
        </div>
      </div>

      <div class="form-group">
         <label class="col-sm-2 control-label">Status Leads</label>
         <div class="col-sm-5">
           <select class="form-control" name="statusleads">
             <option value="new">New</option>
             <option value="assigned">Assigned</option>
             <option value="inproses">In Procces</option>
             <option value="converted">Converted</option>
             <option value="recycled">Recycled</option>
             <option value="dead">Dead</option>
           </select>
         </div>
       </div>

       <div class="form-group">
         <label class="col-sm-2 control-label">Sources</label>
         <div class="col-sm-5">
           <select class="form-control" name="idsources">
             <option value="">-- select Sources -- </option>
             @foreach ($sources as $source)
               <option value="{{$source->idsources}}">{{$source->name}}</option>
             @endforeach
           </select>
         </div>
       </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Oppurtunity Amount</label>
            <div class="box-body">
              <div class="col-xs-1">
                <select class="form-control" name="tipemoney">
                  <option value="idr">IDR</option>
                  <option value="usd">USD</option>
                  <option value="eur">EUR</option>
                </select>
              </div>
                <div class="col-xs-4">
                  <input type="text" class="form-control" placeholder="Amount" name="amount" required>
                </div>
            </div>
      </div>

      <div class="form-group">
         <label class="col-sm-2 control-label">Industries</label>
         <div class="col-sm-5">
           <select class="form-control" name="idindustries">
             <option value="">-- select Industries -- </option>
             @foreach ($industries as $industrie)
               <option value="{{$industrie->idindustries}}">{{$industrie->name}}</option>
             @endforeach
           </select>
         </div>
       </div>

      <div class="form-group">
        <div class="col-sm-2 control-label">
          <label class="">Alamat</label>
        </div>
        <div class="col-sm-5">
          <textarea name="alamat" rows="3"  class="form-control" required></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-2 control-label">
          <label class="">Description</label>
        </div>
        <div class="col-sm-5">
          <textarea name="description" rows="3"  class="form-control" required></textarea>
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
