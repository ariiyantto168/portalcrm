<section class="content-header">
  <h1>Sources</h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Sources</a></li>
    <li class="active"><i class="fa fa-university"></i>Industry</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Index</h3>
      <div class="box-tools pull-right">
      <a href="{{url('sources/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i> Create New</a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Status</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($sources as $number => $source)
        <tr>
          <td>{{$number+1}}</td>
          <td>{{$source->name}}</td>
          <td>
            <center>
             @if($source->active)
               <span class="label label-success">Active</span>
             @else
               <span class="label label-danger">Inactive</span>
             @endif
           </center>

          </td>
          <td>
            <center>
              <a href="{{url('/sources/update/'.$source->idsources)}}" ><i class="fa fa-pencil-square-o"></i></a>
            </center>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
