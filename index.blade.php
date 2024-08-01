@extends('admin.layouts.master')
@section('content')


    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">На заселение</div>
        </div>
        <div class="portlet-body">
            <form method="POST" action="{{route('dashboard.checkin.store')}}">
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

                    <div class="row p-1 form-group">
                            <div class="col-sm-4">
                                {!! Form::label('patronymic', 'Фамилия', array('class'=>'control-label')) !!}
                            </div>
                            <div class="col-sm-8">
                                {!! Form::text('patronymic', old('patronymic'), array('class'=>'form-control form_control_mntk','tabindex'=>1)) !!}
                            </div>
                        </div>

                        <div class="row p-1 form-group">
                            <div class="col-sm-4">
                                {!! Form::label('name', 'Имя', array('class'=>'control-label')) !!}
                            </div>
                            <div class="col-sm-8">
                                {!! Form::text('name', old('name'), array('class'=>'form-control form_control_mntk','tabindex'=>2)) !!}
                            </div>
                        </div>

                        <div class="row p-1 form-group">
                            <div class="col-sm-4">
                                {!! Form::label('surname', 'Отчество', array('class'=>'control-label')) !!}
                            </div>
                            <div class="col-sm-8">
                                {!! Form::text('surname', old('surname'), array('class'=>'form-control form_control_mntk','tabindex'=>3)) !!}
                            </div>
                        </div>

                        <div class="row p-1 form-group">
                            <div class="col-sm-4">
                                {!! Form::label('user_id', 'Лечащий врач', array('class'=>'control-label')) !!}
                            </div>
                            <div class="col-sm-8">
                                {!! Form::select('user_id', $user_id, old('user_id'), array('class'=>'form-control form_control_mntk select2', 'tabindex'=> 4)) !!}
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Добавить</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                       
                </div>
            </form>
	    </div>
    </div>
  

   
                            <wbr>
                    <div class="table">
                        <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                            <thead>
                            <tr>
                               
                                <th>ФИО</th>
                                <th>Мед.Карта</th>
                                <th>Дата рождения</th>
                                <th>Пол</th>
                                <th>Дата засел.</th>
                                <th>Дата высел</th>
                                <th>Врач</th>
                                <th>Договор</th>
                                
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($CheckIn as $row)
                                <tr>
                                    
                                    <td>{{ $row->patient_id }}</td>
                                    <td>{{$row->dogovor_number }}</td>
                                    <td>{{ $row->bithday }}</td>
                                    <td>{{ $row->gender }}</td>
                                    <td>{{ $row->dogovor_date }}</td>
                                    <td>{{ $row->plan_end_date }}</td>
                                    <td>{{ $row->user_id }}</td>
                                    <td>{{ $row->Documenul_id }}</td>
                                    <td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                      

                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                    <br>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                   {!! Form::submit('Заселить', array('class' => 'btn btn-primary')) !!}
                              {!! link_to_route(config('quickadmin.route').'.habitation.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
                            </div>
                        
                    </div>
                                    <br>

                                    <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-danger" id="delete">
                                    {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                                </button>
                            </div>
                        </div>
                        {!! Form::open(['route' => config('quickadmin.route').'.CheckIn.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                        <input type="hidden" id="send" name="toDelete">
                        {!! Form::close() !!}
                    </div>
            
                 






                </div>
                <br>
            </form>
	    </div>
    </div>

   
    </script>
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

@endsection
