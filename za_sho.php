
<?php
	
use illuminate\html;
use Illuminat\Database\Eloquent\Model;
use app\patients;

public function toSearchableArray()
{
    $array = $this->toArray();
    if(empty($array)) {
        return $array;
    }
    return [
        'id'=> $array['id'],
        'number'=> $array['number'],
        'surname' => $array['surname'],
        'name' => $array['name'],
        'patronymic' => $array['patronymic'],
        'birthdate' => $array['birthdate'],
    ];
}

public function setBirthdateAttribute($input)
{
    if ($input != '') {
        $this->attributes['birthdate'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
    } else {
        $this->attributes['birthdate'] = '';
    }
}

213.108.206.229 

public function edit($id)
{
//			  $user = habitation::find($user_id);
//	  
//			  $userList =[];
  $status = Habitation::$status;
//            $user_id = Habitation::where('id', '=', $habitation->user_id)->pluck('user_id');
//            foreach ($user as $item) {
//                $userList[$item->id] = $item->getFullname();
//                                     }
}

//       $user = Habitation:: join('status', '=', 'send') ->where('habitation.id', $id) -> select('habitation', 'status','gender','genderList','bithday','doctypes','userList');
//       $users = User::all();
//   $userList = [];
//     foreach ($users as $item) {
//         $userList[$item->id] = $item->getFullname();
//         $user = CheckIn::table() -> get('habitation'); 
//     } 
//   }



@if ($habitation->status === 'send')
{!! Form::submit('Заселить', array('class' => 'btn btn-primary')) !!}
@endif
<div class="col-md-6">
{!! Form::select('id_patient', $patient, old('id_patient'), array('class'=>'form-control form_control_mntk select2', 'tabindex'=> 3)) !!}
</div>
{{--            /////////////////////////////////////////////////// type         /////////////////////////////--}}

<div id="type" class="tab-pane fade in active" >
    <form method="POST" action="{{route('dashboard.servicepension.storetype')}}">
        <div class="container">
            @php /** @var \Illuminate\Support\ViewErrorBag $errors */@endphp
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span>x</span>
                            </button>
                            {{$errors->first()}}
                        </div>
                    </div>
                </div>
            @endif
            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span>x</span>
                            </button>
                            {{session()->get('success')}}
                        </div>
                    </div>
                </div>
            @endif

@endsection


@section('javascript')


    <script>
        var ru = {"sLengthMenu": "Показать  _MENU_ записей",    
            "sSearch": "Поиск:",
            "sZeroRecords": "Записи отсутствуют.",
            "sInfo": "Записи с _START_ до _END_ из _TOTAL_ записей ",
            "sInfoEmpty": "Показано с 0 до 0 из 0 записей",
            "sInfoFiltered": "(отфильтровано из  _MAX_ записей )",
            "oPaginate": {
                "sFirst":    "Первая",
                "sPrevious": "Предыдущая",
                "sNext":     "Следующая",
                "sLast":     "Последняя"
            },
        };
        var dtable = $('#datatype').dataTable( {"oLanguage": ru} );

        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });




        <div class= "row p-1 form-group">
        <div class="col-md-6">
        {!! Form::label('getfullname()', 'Ф.И.О.', array('class'=>'control-label')) !!}
        {!! link_to_route(config('quickadmin.route').'.habitation.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'control-label')) !!}
        </div>
        <div class= "row p-1 form-group">
        <div class="col-md-9">
            {!! Form::label('Dogovor_number', 'Медкарта', array('class'=>'control-label')) !!}
        </div>
        <div class= "row p-1 form-group">
        <div class="col-md-10">
            {!! Form::label('Birthday', 'Дата рождения', array('class'=>'control-label')) !!}
        </div>
        <div class= "row p-1 form-group">
        <div class="col-md-10">
            {!! Form::label('Gender', 'Пол', array('class'=>'control-label')) !!}
        </div>
        <div class= "row p-1 form-group">
        <div class="col-md-8">
            {!! Form::label('Dogovor_date', 'Дата заселения', array('class'=>'control-label')) !!}
        </div>
        <div class= "row p-1 form-group">
        <div class="col-md-8">
            {!! Form::label('Plan_end_date', 'План выселения', array('class'=>'control-label')) !!}
        </div>
        <div class= "row p-1 form-group">
        <div class="col-md-8">
            {!! Form::label('User_id', 'Врач', array('class'=>'control-label')) !!}
        </div>
        <div class= "row p-1 form-group">
        <div class="col-md-9">
            {!! Form::label('Documenul_id', 'Договор', array('class'=>'control-label')) !!}
        </div>
    </div>



    $user_res = Habitation::$user_id;
    $user = [];
    
        foreach ($user_res as $user_re) {
        $user[$user_re->id] = $user_re->getfulluname();
        
    }

    foreach ($status as $item) where ('status' == 'send')
    { view('admin.checkincontroller.index') }
    else { return null }



             /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
          if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Checkin::destroy($toDelete);
        } else {
            Checkin::whereNotNull('id')->delete();
        }
        return redirect()->route(config('quickadmin.route') . '.Checkin.index');
        
    }

    var dtable = $('#datatype').dataTable( {"oLanguage": ru} );

    $(document).ready(function () {
        $('#delete').click(function () {
            if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-update') }}')) {
                var send = $('#send');
                var mass = $('.mass').is(":checked");
                if (mass == true) {
                    send.val('mass');
                } else {    
                    var toDelete = [];
                    $('.single').each(function () {
                        if ($(this).is(":checked")) {
                            toDelete.push($(this).data('id'));
                        }
                    });
                    send.val(JSON.stringify(toDelete));
                }
                $('#massDelete').submit();
            }
        });
    });
    <script>
    $(document).ready(function () {
        $('#delete').click(function () {
            if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                var send = $('#send');
                var mass = $('.mass').is(":checked");
                if (mass == true) {
                    send.val('mass');
                } else {
                    var toDelete = [];
                    $('.single').each(function () {
                        if ($(this).is(":checked")) {
                            toDelete.push($(this).data('id'));
                        }
                    });
                    send.val(JSON.stringify(toDelete));
                }
                $('#massDelete').submit();
            }
        });
    });
</script>
