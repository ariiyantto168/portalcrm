<section class="content-header">
  <h1>
    Users
    <small>Master</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><i class="fa fa-database"></i> Master</a></li>
    <li><a href="{{url('users')}}"><i class="fa fa-cubes"></i> Users</a></li>
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
      {{ Form::open(array('url' => 'users/update',$users->idusers, 'class' => 'form-horizontal')) }}
     
      <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" value="{{$users->name}}" name="name" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Email</label>
        <div class="col-sm-5">
          <input type="email" class="form-control" value="{{$users->email}}" name="email" required>
        </div>
      </div>

      <div class="form-group">
         <label class="col-sm-2 control-label">Role</label>
         <div class="col-sm-5">
           <select class="form-control" name="role">
             <option value="a">Admin</option>
             <option value="s">Sales</option>
             <option value="p">Partner</option>
           </select>
         </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-5">
          <input type="password" class="form-control" placeholder="Masukan password" name="password" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-5">
          <a href="{{url('users')}}" class="btn btn-warning pull-right">Back</a>
          <input type="submit" value="Save" class="btn btn-primary">
        </div>
      </div>
      {{ Form::close() }}
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>

