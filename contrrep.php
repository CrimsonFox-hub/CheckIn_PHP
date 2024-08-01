use Illuminate\Support\Facades\Auth;
use illuminate\html;
use Illuminat\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Redirect;
use Schema;
use Session;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\CreateCheckInRequest;
use App\Docstay;
use App\Habitation;
use App\admissionRep;
use App\Room;



class admissionRepController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }
	     /**
	 * Index page
	 * 
     * @param Request $request
     *
     * @return \Illuminate\View\View
	    */
        
        public function index(Request $request)
        {   
            $level = Room::all();
			$levelList = [];
            foreach ($level as $item1) {
                $levelList[$item1->level_id] = $item1->get();
            }

            $room = Room::all();
			$roomList = [];
            foreach ($room as $item2) {
                $roomList[$item2->number] = $item2->get();
            }

            $doctypes = Docstay::all();
            $doctypeList = [];
            foreach ($doctypes as $item3) {
                $doctypesList[$item3->title] = $item3->get();
            }
            
            $status = Habitation::$status;
            $gender = Habitation::$gender;    
			//исправить и найти на что менять habitation
			$query = admissionRep::orderBy('id')->get();
            
            $patients = Habitation::all();
            $patientList = [];
            foreach ($patients as $item4) {
                $patientList[$item4->id] = $item4->getFullname();
            }
            if ($request->has('dogovor_date')) {
                $query->whereDate('dogovor_date','=', date("Y-m-d",strtotime($request->get('dogovor_date'))));
            }
            if ($request->has('end_date')) {
                $query->whereDate('end_date','=', date("Y-m-d",strtotime($request->get('end_date'))));
            }
            if ($request->has('name')) {
                $query->where('name', 'like', '%'.$request->get('name').'%');
            }
            if ($request->has('surname')) {
                $query->where('surname', 'like', '%'.$request->get('surname').'%');
            }
            if ($request->has('patronymic')) {
                $query->where('patronymic', 'like', '%'.$request->get('patronymic').'%');
            }
            if ($request->has('birthday')) {
                $query->whereDate('birthday','=', date("Y-m-d",strtotime($request->get('birthday'))));
            }
            if ($request->has('doctypes') && $request->get('doctypes')!='all') {
                $query->where('doctypes', $request->get('doctypes'));
            }
            if ($request->has('level') && $request->get('level')!='all') {
                $query->where('level','=', $request->get('level'));
            }
            if ($request->has('room') && $request->get('room')!='all') {
                $query->where('room','=', $request->get('room'));
            }
            $admissionRep = $query->where('status','=','saselen') ->groupBy('id')->get();
            return view('admin.admissionRep.index', compact('status','birthday', 'doctypes','level','room'));
        }
            
    
       
    /**
     * Show the form for editing the specified services.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function store(CreateCheckInRequest $request){
        $fields = $request->all();
        return redirect()->route(config('quickadmin.route') . '.admissionRep.index');
    }

         /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(CreateCheckInRequest $request)
    {
          if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Checkin::destroy($toDelete);
        } else {
            Checkin::whereNotNull('id')->delete();
        }
        return redirect()->route(config('quickadmin.route') . '.admissionRep.index');
        
    }
    
    /**
     * Remove the specified habitation from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        Checkin::destroy($id);

        return redirect()->route(config('quickadmin.route') . '.admissionRep.index');
    }
	
}







{!! Form::open(array('route' => config('quickadmin.route').'.admissionRep.index', 'class' => 'form-horizontal')) !!}
     
     <table class="table table-striped table-hover table-responsive datatable" id="datatable">
         <thead>
         <tr>
            
             <th>П/П</th>
             <th>ФИО</th>
             <th>Дата рождения</th>
             <th>Дата засел.</th>
             <th>Дата высел.</th>
             <th>Гражданство</th>
             <th>Тип проживания</th>
             <th>Номер палаты</th>
             
         </tr>
         </thead>

         <tbody>
         @foreach ($habitation as $row)
             <tr>
             
             <td>{{ $row->id() }}</td>
             <td>{{ $row->getFullname() }}</td>
             <td>{{ ($row->birthday == null) ? '' : date('d.m.Y', strtotime($row->birthday)) }}</td>
             <td>{{ ($row->dogovor_date == null) ? '' : date('d.m.Y', strtotime($row->dogovor_date)) }}</td>
             <td>{{ ($row->end_date == null) ? '' : date('d.m.Y', strtotime($row->dogovor_date)) }}</td>
             <td>{{ $row->title }}</td>
             <td>{{ $row->level }}</td>
             <td>{{ $row->room }}</td>
         
             </tr>
         @endforeach
         </tbody>
     </table>
  
{!! Form::close() !!}

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
</script>
@endsection
