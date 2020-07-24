<section class="content-header">
  <h1>
    Opportunity
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><i class="fa fa-database"></i> Master</a></li>
    <li><a href="{{url('opps')}}"><i class="fa fa-usd"></i> Opportunity</a></li>
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
      {{ Form::open(array('url' => 'opps/create-new', 'class' => 'form-horizontal')) }}

      <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Name" name="name" required>
        </div>
      </div>

      <div class="form-group">
         <label class="col-sm-2 control-label">Stage</label>
         <div class="col-sm-5">
           <select class="form-control" name="stage">
             <option value="prospecting">Prospecting</option>
             <option value="qualification">Qualification</option>
             <option value="proposal">Proposal</option>
             <option value="negotiation">Negotiation</option>
             <option value="closedwon">Closed Won</option>
             <option value="closedlost">Closed Lost</option>
           </select>
         </div>
       </div>

       <div class="form-group">
      <label class="col-sm-2 control-label">Amount</label>
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
        <label class="col-sm-2 control-label">Probality</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Probality" name="probality" required>
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
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-5">
          <a href="{{url('accounts')}}" class="btn btn-warning pull-right">Back</a>
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
