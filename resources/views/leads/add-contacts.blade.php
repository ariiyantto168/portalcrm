<section class="content-header">
    <h1>Leads</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li ><a href="{{url('/leads')}}"></a><i class="fa fa-address-card"></i>Leads</li>
      <li class="active"><i class="fa fa-eye"></i> Add Contact</li>

    </ol>
  </section>
  <section class="content">
    @php
        if(Auth::user()->role == 'a' || Auth::user()->role == 's' ){
            $disabled = 'disabled';
        }else{
            $disabled = '';
        }
    @endphp
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Lead</h3>
        <div class="box-tools pull-right">
        </div>
      </div>
      <div class="box-body table-responsive">
        <table id="" class="table table-bordered table-striped">
          <tbody>
            <tr>
                <td width="15%">Source</td>
                <td width="2%">:</td>
                <td>{{$leads->sources->name}}</td>
            </tr>
            <tr>
                <td>Industries</td>
                <td>:</td>
                <td>{{$leads->industries->name}}</td>
            </tr>
            <tr>
                <td>Gelar</td>
                <td>:</td>
                <td>{{$leads->gelar}}</td>
            </tr>
            <tr>
                <td>Source</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Source</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Source</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr> <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    {{-- update contact --}}
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                @if ($leads->contacts->count() > 0)
                    Update Contact
                @else
                    Add Contact
                @endif
            </h3>
            <div class="box-tools pull-right">
                @if ($leads->contacts->count() > 0)
                    <a  id="btn_update" class="btn btn-primary btn-sm" {{$disabled}}> <i class="fa fa-plus"></i> Add</a>
                @else
                    <a  id="btn_add" class="btn btn-primary btn-sm" {{$disabled}}> <i class="fa fa-plus" ></i> Add</a>
                @endif
            </div>
        </div>
        @if ($leads->contacts->count() > 0)
        {{-- open update contact --}}
        <div class="box-body">
            {{ Form::open(array('url' => 'leads/add-contacts-update/'.$leads->idleads, 'class' => 'form-horizontal')) }}
                <table class="table table-striped" id="table">
                    <tbody>
                        @foreach ($leads->contacts as $index => $contact)
                        <tr>

                        <td style=" text-align:center">
                            <label style="display: block;">{{$index+1}}</label>
                            <a class="btn btn-xs del" id="count" onclick="delete_contact('{{$contact->idcontacts}}')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <input type="hidden" name="idcontacts[]" value="{{$contact->idcontacts}}">
                        </td>

                        <td>
                            <small>Name</small>
                            <select class="form-control" name="gelar[]" id="gelar__{{$index+1}}" {{$disabled}}>
                                <option value="mr">Mr.</option>
                                <option value="ms">Ms.</option>
                                <option value="mrs">Mrs.</option>
                                <option value="dr">Dr.</option>
                              </select>
                              <small>Account Name</small>
                              <input type="text" class="form-control" id="account_name__{{$index+1}}" value="{{$contact->gelar}}" name="account[]" required>

                        </td>
                        <td>
                            <small>First Name</small>
                            <input type="text" class="form-control" id="first__{{$index+1}}" value="{{$contact->firstname}}" name="firstname[]" required>
                            <small>Last Name</small>
                            <input type="text" class="form-control" id="last__{{$index+1}}" value="{{$contact->lastname}}" name="lastname[]" required>

                        </td>
                        <td>
                            <small>Alamat</small>
                            <textarea name="alamat[]" rows="4" id="alamat__{{$index+1}}" class="form-control" required>{{$contact->alamat}}</textarea>

                        </td>
                        <td>
                            <small>Description</small>
                            <textarea name="description[]" rows="4" id="description__{{$index+1}}"  class="form-control" required>{{$contact->description}}</textarea>
                        </td>  
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <input type="submit" class="btn btn-success pull-right" value="Save">
            {{ Form::close() }}
            <a href="{{url('leads')}}" class="btn btn-warning ">Back</a>
            <input type="hidden" id="appendindex" value="{{$leads->contacts->count()+1}}">
        </div>
            {{-- close update contact --}}
        @else
        {{-- open new  contact --}}
        <div class="box-body">
            {{ Form::open(array('url' => 'leads/add-contacts-save/'.$leads->idleads, 'class' => 'form-horizontal')) }}
            <table class="table table-striped" id="table">
                <tbody>
                    <tr>
                        <td style=" text-align:center">
                            <label style="display: block;">1</label>
                            <a class="btn btn-xs"><i class="fa fa-minus" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <small>Name</small>
                            <select class="form-control" name="gelar[]" id="gelar_1" {{$disabled}}>
                                <option value="mr">Mr.</option>
                                <option value="ms">Ms.</option>
                                <option value="mrs">Mrs.</option>
                                <option value="dr">Dr.</option>
                              </select>
                              <small>Account Name</small>
                              <input type="text" class="form-control" id="account_name_1" placeholder="Account Name" name="account[]" required>

                        </td>
                        <td>
                            <small>First Name</small>
                            <input type="text" class="form-control" id="first_1" placeholder="first name" name="firstname[]" required>
                            <small>Last Name</small>
                            <input type="text" class="form-control" id="last_1" placeholder="last name" name="lastname[]" required>

                        </td>
                        <td>
                            <small>Alamat</small>
                            <textarea name="alamat[]" rows="4" id="alamat_1" class="form-control" required></textarea>

                        </td>
                        <td>
                            <small>Description</small>
                            <textarea name="description[]" rows="4" id="description_1"  class="form-control" required></textarea>
                        </td>
                    
                    </tr>
                </tbody>
            </table>
                <input type="submit" class="btn btn-success pull-right" value="Save">
            {{ Form::close() }}
            <input type="hidden" id="appendindex" value="2">

        </div>
        @endif
    </div>
            {{-- close new  contact --}}

  </section>



{{--open jquery  add new contact --}}
  <script>
      $('#btn_add').on('click', function(){
        var ais = $('#appendindex').val();
        $('#appendindex').val(parseInt(ais)+1);
          $('#table').append('<tr>'
                +'<td style=" text-align:center">'
                    +'<label style="display: block;">'+ais+'</label>'
                    +'<a class="btn btn-xs del"><i class="fa fa-trash" aria-hidden="true"></i></a>'
                +'</td>'
                +'<td>'
                    +'<small>Name</small>'
                    +'<select class="form-control" name="gelar[]" id="gelar_'+ais+'">'
                    +'<option value="mr">Mr.</option>'
                    +'<option value="ms">Ms.</option>'
                    +'<option value="mrs">Mrs.</option>'
                    +'<option value="dr">Dr.</option>'
                    +'</select>'
                    +'<small>Account Name</small>'
                    +'<input type="text" class="form-control" id="account_name_'+ais+'"  placeholder="Account Name" name="account[]" required>'

                +'</td>'
                +'<td>'
                    +'<small>First Name</small>'
                    +'<input type="text" class="form-control" id="first_'+ais+'" placeholder="first name" name="firstname[]" required>'
                    +'<small>Last Name</small>'
                    +'<input type="text" class="form-control" id="last_'+ais+'" placeholder="last name" name="lastname[]" required>'
                +'</td>'
                +'<td>'
                    +'<small>Alamat</small>'
                    +'<textarea name="alamat[]" rows="4" id="alamat_'+ais+'"  class="form-control" required></textarea>'

                +'</td>'
                    +'<td>'
                        +'<small>Description</small>'
                        +'<textarea name="description[]" id="description_'+ais+'" rows="4"  class="form-control" required></textarea>'
                    +'</td>'
            +'</tr>'
          );
      });
  </script>
  {{--close jquery  add new contact --}}

{{-- open jquery update contact --}}
<script>
    //delete row
    $('#table').on('click', '.del' ,function(){
       $(this).closest('tr').remove();
       if ($('#count').length-1) {
         $('#btn_save').prop("disabled", 'disabled');
       }
     });


    $('#btn_update').on('click', function(){
      var ais = $('#appendindex').val();
      $('#appendindex').val(parseInt(ais)+1);

        $('#table').append('<tr>'
              +'<td style=" text-align:center">'
                  +'<label style="display: block;">'+ais+'</label>'
                  +'<a class="btn btn-xs del"><i class="fa fa-trash" aria-hidden="true"></i></a>'
              +'</td>'
              +'<td>'
                    +'<input type="hidden" value="new" name="idcontacts[]" >'
                  +'<small>Name</small>'
                  +'<select class="form-control" name="gelar[]" id="gelar_'+ais+'">'
                  +'<option value="mr">Mr.</option>'
                  +'<option value="ms">Ms.</option>'
                  +'<option value="mrs">Mrs.</option>'
                  +'<option value="dr">Dr.</option>'
                  +'</select>'
                  +'<small>Account Name</small>'
                  +'<input type="text" class="form-control" id="account_name_'+ais+'"  placeholder="Account Name" name="account[]" required>'

              +'</td>'
              +'<td>'
                  +'<small>First Name</small>'
                  +'<input type="text" class="form-control" id="first_'+ais+'" placeholder="first name" name="firstname[]" required>'
                  +'<small>Last Name</small>'
                  +'<input type="text" class="form-control" id="last_'+ais+'" placeholder="last name" name="lastname[]" required>'
              +'</td>'
              +'<td>'
                  +'<small>Alamat</small>'
                  +'<textarea name="alamat[]" rows="4" id="alamat_'+ais+'"  class="form-control" required></textarea>'

              +'</td>'
                  +'<td>'
                      +'<small>Description</small>'
                      +'<textarea name="description[]" id="description_'+ais+'" rows="4"  class="form-control" required></textarea>'
                  +'</td>'
          +'</tr>'
        );
    });
</script>

{{-- close jquery update contact --}}