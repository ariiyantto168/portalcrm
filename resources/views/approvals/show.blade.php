
  <section class="content-header">
    <h1>
      Approvals
      <small>Show</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{url('')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-info-circle"></i> Approvals</a></li>
      <li class="active"><i class="fa fa-eye"></i> show</a></li>
    </ol>
  </section>

<section class="content">
  <div class="box">
    <div class="box-header with-border">

    </div>
    <div class="box-body">
      <table class="table ">
        <tr>
          <td width="10%"><b>Gelar</b></td>
          <td>: {{$approvals->leads->gelar}} </td>
        </tr>
        <tr>
          <td width="10%"><b>First Name</b></td>
          <td>: {{$approvals->leads->firstname}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Last Name</b></td>
          <td>: {{$approvals->leads->lastname}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Account</b></td>
          <td>: {{$approvals->leads->account}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Tittle</b></td>
          <td>: {{$approvals->leads->tittle}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Website</b></td>
          <td>: {{$approvals->leads->website}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Status Leads</b></td>
          <td>: {{$approvals->leads->statusleads}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Tipe Money</b></td>
          <td>: {{$approvals->leads->tipemoney}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Amount</b></td>
          <td>: {{$approvals->leads->amount}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Sources</b></td>
          <td>: {{$approvals->leads->sources->name}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Industries</b></td>
          <td>: {{$approvals->leads->industries->name}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Alamat</b></td>
          <td>: {{$approvals->leads->alamat}} </td>
        </tr>
        <tr>
          <td width="10%"><b>Description</b></td>
          <td>: {{$approvals->leads->description}} </td>
        </tr>
        
        <tr>
          <td><b>Status </b></td>
          <td>:
            @if ($approvals->status == 'a')
              <span class="label label-success">Approved</span>
            @elseif ($approvals->status == 'r')
              <span class="label label-danger">Rejected</span>
            @elseif ($approvals->status == 'p')
              <span class="label label-warning">Pending</span>
            @endif</td>
        </tr>
      </table>
      <div class="form-group">
        <div class="col-sm-12">
          <div class="pull-right">
            <a href="#modal-approve" data-toggle="modal" class=" btn btn-success">Approve</a>
            <a href="#modal-rejected"  data-toggle="modal" class=" btn btn-danger">Rejected</a>
            <a href="{{url('approvals')}}" class=" btn btn-warning">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Modal Approvw-->
<div class="modal fade" id="modal-approve" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Warning</h4>
      </div>
      <div class="modal-body">
        <center>Sure to Approve this equipment ?</center>
      </div>
      <div class="modal-footer">
        {{ Form::open(array('url' => 'approvals/update/'.$approvals->idapprovals, 'method' => 'post')) }}
          <input type="hidden" name="status" value="a">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-success">Yes</button>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

<!--Modal Rejected-->
<div class="modal fade" id="modal-rejected" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Warning</h4>
      </div>
      <div class="modal-body">
        <center>Sure to Rejected this equipment ?</center>
      </div>
      <div class="modal-footer">
        {{ Form::open(array('url' => 'approvals/update/'.$approvals->idapprovals, 'method' => 'post')) }}
          <input type="hidden" name="status" value="r">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-danger">Yes</button>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
