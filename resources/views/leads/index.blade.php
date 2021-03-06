<section class="content-header">
  <h1>Leads</h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><i class="fa fa-address-card"></i>Leads</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Index</h3>
      <div class="box-tools pull-right">
      <a href="{{url('leads/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i> Create New</a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Account</th>
          <th>Sources</th>
          <th>Status Leads </th>
          <th> Industry </th>
          <th> Status</td>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($leads as $number => $lead)
        <tr>
          <td>{{$number+1}}</td>
          <td>{{$lead->account}}</td>
          <td>{{$lead->sources->name}}</td>
          <td>{{$lead->statusleads}}</td>
          <td>{{$lead->industries->name}}</td>
          <td>
            @if ($lead->status == 'a')
              <span class="label label-success">Approved</span>
            @elseif ($lead->status == 'r')
              <span class="label label-danger">Rejected</span>
            @elseif ($lead->status == 'p')
              <span class="label label-warning">Pending</span>
            @endif
          </td>
          <td>
            <center>
              <a href="{{url('/leads/update/'.$lead->idleads)}}" ><i class="fa fa-pencil-square-o"></i></a>
              @if ($lead->status == 'a')
              <a href="{{url('/leads/add-contacts/'.$lead->idleads)}}"><i class="fa fa-eye"></i></a>
              @endif
              <a href="{{url('/leads/print-pdf/'.$lead->idleads)}}" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
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
