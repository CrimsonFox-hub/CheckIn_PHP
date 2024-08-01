
                            <wbr>
                    <div class="table">
                    <form method="GET" action="{{route('dashboard.checkin.index')}}">
                        
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
                                    
                                    <td>{{ $row->surname.' '.$row->name.' '.$row->patronymic  }}</td>
                                    <td>{{ $row->dogovor_number }}</td>
                                    <td>{{ $row->bithday }}</td>
                                    <td>{{ $row->gender }}</td>
                                    <td>{{ $row->dogovor_date }}</td>
                                    <td>{{ $row->plan_end_date }}</td>
                                    <td>{{ $row->user_id }}</td>
                                    <td>{{ $row->Documenul_id }}</td>
                           
                            </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                      

                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                    <br>
                                    {
                        caption: "",
                        width: 680,
                        dataField: "id",
                        allowFiltering: false,
                        allowSorting: false,
                            cellTemplate: function (container, options) {
                            $("<div >")
                                .append($('<a href="/dashboard/patients/' + options.value + '/edit" class="btn btn-xs btn-info">Редактировать</a>'))
                                   
                                   .appendTo(container);
                        }
                    }
                        
                    </div>
                                    <br>


                            </div>
                        </div>
                        {!! Form::open(['route' => config('quickadmin.route').'.Checkin.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                        <input type="hidden" id="send" name="toDelete">
                        {!! Form::close() !!}
                    </div>

                </div>
                <br>
            </form>
	    </div>
    </div>



        <!-- DevExtreme themes -->
        <link rel="stylesheet" type="text/css" href="/css/devexpress/dx.common.css" />
        <link rel="stylesheet" type="text/css" href="/css/devexpress/dx.win10.white.css" />
        <!-- A DevExtreme library -->
        <script type="text/javascript" src="/js/devexpress/dx.all.js"></script>
        <script>
            $(document).ready(function () {
                var gridDataSource = new DevExpress.data.DataSource({
                    load: function(loadOptions) {
                        var d = $.Deferred(),
                            params = {};
                        [
                            "skip",
                            "take",
                            "requireTotalCount",
                            "requireGroupCount",
                            "sort",
                            "filter",
                            "totalSummary",
                            "group",
                            "groupSummary"
                        ].forEach(function(i) {
                            if(i in loadOptions && isNotEmpty(loadOptions[i]))
                                params[i] = JSON.stringify(loadOptions[i]);
                        });
                        $.getJSON("/dashboard/patients/indexdata/", params)
                            .done(function(result) {
                                d.resolve(result.data, {
                                    totalCount: result.totalCount,
                                    summary: result.summary,
                                    groupCount: result.groupCount
                                });
                            });
                        return d.promise();
                    }
                });
                function isNotEmpty(value) {
                    return value !== undefined && value !== null && value !== "";
                }
                $("#patients-grid").dxDataGrid({
                    dataSource: gridDataSource,
                    paging: {
                        pageSize: 10
                    },
                    headerFilter: {
                        visible: false
                    },
                    filterRow: {
                        visible: false,
                        applyFilter: "auto"
                    },
                    searchPanel: { visible: true },
    
                    remoteOperations: {
                        filtering: true,
                        paging: true,
                        sorting: true,
                        groupPaging: false,
                        grouping: false,
                        summary: true
                    },
    
    
    
                    columns: [
                        {
                            caption: "ФИО",
                            width: 140,
                            dataField: "getFullname()",
                            allowHeaderFiltering: false
                        },
                        {
                            caption: "мед. карта",
                            dataField: "dogovor_number",
                            allowHeaderFiltering: false
                        },
                        {
                            caption: "Дата рождения",
                            width: 140,
                            dataField: "birthdate",
                            allowFiltering: false,
                            allowSorting: false
                        },
                        {
                            caption: "Пол",
                            dataField: "gender",
                            allowHeaderFiltering: false
                        },
                        {
                            caption: "Дата засел.",
                            width: 140,
                            dataField: "dogovor_date",
                            allowFiltering: false,
                            allowSorting: false
                        },
                        {
                            caption: "Дата высел.",
                            width: 140,
                            dataField: "plane_end_date",
                            allowFiltering: false,
                            allowSorting: false
                        },
                        {
                            caption: "Доктор",
                            allowHeaderFiltering: false,
                            dataField: "user_id"
                        },
                        
                        {
                            caption: "Договор",
                            width: 100,
                            dataField: "Documenul_id",
                            allowFiltering: false,
                            allowSorting: false
                        },
                        {
                            caption: "",
                            width: 680,
                            dataField: "id",
                            allowFiltering: false,
                            allowSorting: false,
                            cellTemplate: function (container, options) {
                                $("<div >")
                                    .append($('<a href="/dashboard/patients/' + options.value + '/edit" class="btn btn-xs btn-info">Редактировать</a>'))
                                    .append($('<form method="POST" action="/dashboard/patients/' + options.value + '" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm(\'Вы действительно хотите удалить?\');"><input name="_method" type="hidden" value="DELETE"><input class="btn btn-xs btn-danger " type="submit" value="Удалить"></form>'))
                                    .appendTo(container);
                            }
                        }
    
                    ]
                });
            });
        </script>