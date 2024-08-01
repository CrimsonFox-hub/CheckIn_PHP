<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use illuminate\html;
use Illuminat\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Redirect;
use Schema;
use App\Habitation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\CheckIn;
use Session;
use App\Doc_id;

class CheckInControllerController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }
	     /**
	 * Index page
	 * Контроллер на заселение
     * @param Request $request
     *
     * @return \Illuminate\View\View
	    */
        
        public function index()
        {   
            $CheckIn = habitation::all();
            $name = habitation::all();
            $surname = habitation::all();
            $patronymic = habitation::all();
            $user_id = [];
            $patient_id =[];
            
            $users_raw = user::all();
            foreach ($users_raw as $item) {
                $user_id[$item->id] = $item->getFullname();
                                          }
            foreach ($user_id as $item) {

            $item = new Habitation();
//pacient
            return view('admin.checkincontroller.index') ->with([
                'user_id'=>$user_id,
                'CheckIn'=>$CheckIn,
                'name' =>  $name,
                'surname' => $surname,
                'patronymic' => $patronymic,

            ]) ;
		}
        $patient_raw = patient::all();
        foreach ($patient_raw as $item) {
            $patient_id[$item->id] = $item->getFullname();
                                        }
        foreach ($patient_id as $item)
        {
            return view('admin.checkincontroller.index') ->with([
                'patients_id'=>$patient_id,
                'CheckIn'=>$CheckIn,
                'name' =>  $name,
                'surname' => $surname,
                'patronymic' => $patronymic,
                'gender' => $gender,
                'birthday' => $birthday,
                'dogovor_number' => $dogovor_number,
                'dogovor_date' => $dogovor_date,
                'plan_end_date' => $plan_end_date,
                'user_id' => $user_id,
                'Documenul_id' => $Documenul_id

            ]) ;
        }
    }
        public function store(CreateCheckInRequest $request)
        {
            $data = $request ->input();
            $item = new Habitation($data);
            if($item->dogovor_date == "")
            {
                $item->dogovor_date == carbon::now();
            }
            $item->save();
            //return('hh'); изменить до сохранения запроса
            if($item){
                return redirect()
                    ->route('dashboard.checkin.index')
                    ->with(['success'=>'Успешно сохранено']);
            }else{
                return back()
                    ->withErrors(['msg'=>'Ошибка сохранения'])
                    ->withInput();
            }
        }

			/** 
		* изменения статуса send on saselen + передача с habitation в карту пац.
		* @param Post $user
		*
		* @return \Illuminate\View\View
		   */
		   
		  public function edit($status)
		  {
            $status = Habitation::$status;
            $status_row = new habitation($status);
			    if($status_row->$status == 'send')
            {
                $status_row->$status == 'saselen';
            }
        }

    /**
     * Show the form for editing the specified services.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function update(CreateCheckInRequest $request,$id){

        $CheckIn = CheckIn::findOrFail($id);
        if($request->dogovor_date == ""){
            $request['dateE'] = null;
        }
        $CheckIn->update($request->all());

        if($CheckIn){
            return redirect()
                ->route('dashboard.CheckIn.index')
                ->with(['success'=>'Успешно сохранено']);
        }else{
            return back()
                ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }
    }

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
            Habitation::destroy($toDelete);
        } else {
            Habitation::whereNotNull('id')->delete();
        }
        return redirect()->route(config('quickadmin.route') . '.habitation.index');
        
    }
    /**
     * Remove the specified habitation from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        Habitation::destroy($id);

        return redirect()->route(config('quickadmin.route') . '.habitation.index');
    }

   
    public function close(Request $request)
    {
        $fields = $request->all();
        $ids = json_decode($fields['invisible']);
        $habitations = [];
        foreach ($ids as $id) {
            $habitation = Habitation::findOrFail($id);
            $habitations[] = $habitation;
            $diff = strtotime($habitation->dogovor_date) - strtotime($fields['plane_end_date']);
            if ($diff > 0)
            {
                Flash::error("Дата выписки не может быть раньше даты заселения");
                return redirect()->back();
            }
        }
        
    }
	
}
