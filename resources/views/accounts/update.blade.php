<section class="content-header">
  <h1>
    Accounts
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><i class="fa fa-database"></i> Master</a></li>
    <li><a href="{{url('contacts')}}"><i class="fa fa-user-circle"></i> Accounts</a></li>
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
    {{Form::open(array('url' => 'accounts/update/'.$accounts->idaccounts, 'class' => 'form-horizontal'))}}

      <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" value="{{$accounts->name}}" name="name" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Website</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" value="{{$accounts->website}}" name="website" required>
        </div>
      </div>

      <div class="form-group">
         <label class="col-sm-2 control-label">Type</label>
         <div class="col-sm-5">
           <select class="form-control" name="type">
             <option value="new">New</option>
             <option value="customer">Customer</option>
             <option value="investor">Investor</option>
             <option value="partner">Partner</option>
             <option value="reseller">Reseller</option>
           </select>
         </div>
       </div>

      <div class="form-group">
        <div class="col-sm-2 control-label">
          <label class="">Billing Addres</label>
        </div>
        <div class="col-sm-5">
          <textarea name="billingaddres" rows="3"  class="form-control" required>{{$accounts->billingaddres}}</textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-2 control-label">
          <label class="">Shipping Addres</label>
        </div>
        <div class="col-sm-5">
          <textarea name="shippingaddres" rows="3"  class="form-control" required>{{$accounts->shippingaddres}}</textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-2 control-label">
          <label class="">Description</label>
        </div>
        <div class="col-sm-5">
          <textarea name="description" rows="3"  class="form-control" required>{{$accounts->description}}</textarea>
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
