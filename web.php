<?php
use App\Http\Controllers\Admin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['as' => 'home.index', 'uses' =>'\App\Http\Controllers\HomeController@index']);

Auth::routes();
Route::group(['prefix'=>'/dashboard'], function()
{
    Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
    Route::get('/smpvmphealing/{id}/show/', ['uses' => 'Admin\SmpvmphealingController@show']);
    Route::get('/smpvmphealingorsk/{id}/show/', ['uses' => 'Admin\SmpvmphealingorskController@show']);
    Route::post('/smpvmphealing/{id}/makecompletedgisoms/', ['uses' => 'Admin\SmpvmphealingController@makecompletedgisoms']);

    Route::post('/smpvmphealing/{id}/makegisoms1/', ['uses' => 'Admin\SmpvmphealingController@makegisoms1']);


    Route::post('/smpvmphealingorsk/{id}/makecompletedgisoms/', ['uses' => 'Admin\SmpvmphealingorskController@makecompletedgisoms']);
    Route::get('/smp/getcard/', ['uses' => 'Admin\SmpController@getcard']);
    Route::post('/smp/getcard/', ['uses' => 'Admin\SmpController@getcard']);
    Route::get('/kassa/pay/', ['uses' => 'Admin\KassaController@pay']);
    Route::post('/kassa/pay/', ['uses' => 'Admin\KassaController@pay']);
    Route::get('/kassa/getcashierinfo/', ['uses' => 'Admin\KassaController@getCashierInfo']);
    Route::get('/kassa/indexdata/', ['as' => 'dashboard.kassa.indexdata', 'uses' =>'\App\Http\Controllers\Admin\KassaController@indexdata']);
    Route::get('/dogovor/indexdata/', ['as' => 'dashboard.dogovor.indexdata', 'uses' =>'\App\Http\Controllers\Admin\DogovorController@indexdata']);
    Route::get('/kassa/{id}/showpay/', ['as' => 'dashboard.kassa.showpay', 'uses' =>'\App\Http\Controllers\Admin\KassaController@showpay']);
    Route::get('/kassa/{id}/printdop/', ['as' => 'dashboard.kassa.printdop', 'uses' =>'\App\Http\Controllers\Admin\KassaController@printdop']);
    Route::get('/kassa/{id}/printdogovor/', ['as' => 'dashboard.kassa.printdogovor', 'uses' =>'\App\Http\Controllers\Admin\KassaController@printdogovor']);

    Route::get('/kassa/{id}/masspay/', ['as' => 'dashboard.kassa.masspay', 'uses' => 'Admin\KassaController@masspay']);
    Route::patch('/kassa/{id}/storemasspay/', ['as' => 'dashboard.kassa.storemasspay', 'uses' => 'Admin\KassaController@storemasspay']);
    Route::get('/history1cexchange/{id}/show/', ['as' => 'dashboard.history1cexchange.show', 'uses' => 'Admin\History1cexchangeController@show']);
    Route::post('/manual1cexchange/create/', ['as' => 'dashboard.manual1cexchange.store', 'uses' => 'Admin\Manual1cexchangeController@store']);
    Route::get('/mypatients/{id}/show/', ['as' => 'dashboard.mypatients.show', 'uses' => 'Admin\MypatientsController@show']);
    Route::delete('/mypatients/{id}/destroy/', ['as' => 'dashboard.mypatients.destroy', 'uses' => 'Admin\MypatientsController@destroy']);
    Route::get('/mypatients/{id}/showall/', ['as' => 'dashboard.mypatients.showall', 'uses' => 'Admin\MypatientsController@showall']);
    Route::get('/mypatients/{id}/transferresearch/', ['as' => 'dashboard.mypatients.transferresearch', 'uses' => 'Admin\MypatientsController@transferresearch']);
    Route::get('/mypatients/{id}/edit/', ['as' => 'dashboard.mypatients.edit', 'uses' => 'Admin\MypatientsController@edit']);
    Route::get('/mypatients/{id}/latest/', ['as' => 'dashboard.mypatients.latest', 'uses' => 'Admin\MypatientsController@latest']);
    Route::get('/mypatients/createcurs/{patients_id}/', ['as' => 'dashboard.mypatients.createcurs', 'uses' => 'Admin\MypatientsController@createcurs']);
    Route::patch('/mypatients/{id}/updatecurs/', ['as' => 'dashboard.mypatients.updatecurs', 'uses' => 'Admin\MypatientsController@updatecurs']);
    Route::get('/mypatients/createpreparat/{patients_id}/', ['as' => 'dashboard.mypatients.createpreparat', 'uses' => 'Admin\MypatientsController@createpreparat']);
    Route::get('/mypatients/createpreparat2/{patients_id}/', ['as' => 'dashboard.mypatients.createpreparat2', 'uses' => 'Admin\MypatientsController@createpreparat2']);
    Route::patch('/mypatients/{id}/updatepreparat/', ['as' => 'dashboard.mypatients.updatepreparat', 'uses' => 'Admin\MypatientsController@updatepreparat']);
    Route::patch('/mypatients/{id}/updatepreparatgroup/', ['as' => 'dashboard.mypatients.updatepreparatgroup', 'uses' => 'Admin\MypatientsController@updatepreparatgroup']);
    Route::post('/mypatients/storepreparat/', ['as' => 'dashboard.mypatients.storepreparat', 'uses' => 'Admin\MypatientsController@storepreparat']);
    Route::get('/printappointments/printpreparat/{patients_id}/', ['as' => 'dashboard.printappointments.printpreparat', 'uses' => 'Admin\PrintappointmentsController@printpreparat']);
    Route::get('/printappointments/showpreparat/{patients_id}/', ['as' => 'dashboard.printappointments.showpreparat', 'uses' => 'Admin\PrintappointmentsController@showpreparat']);
    Route::post('/printappointments/storetransfer/', ['as' => 'dashboard.printappointments.storetransfer', 'uses' => 'Admin\PrintappointmentsController@storetransfer']);
    Route::post('/reorderqueue/sort/', ['as' => 'dashboard.reorderqueue.sort', 'uses' => 'Admin\ReorderqueueController@sort']);

    Route::post('/mypatients/storecurs/', ['as' => 'dashboard.mypatients.storecurs', 'uses' => 'Admin\MypatientsController@storecurs']);

    Route::get('/mypatients/createresearch/{patients_id}/', ['as' => 'dashboard.mypatients.createresearch', 'uses' => 'Admin\MypatientsController@createresearch']);
    Route::post('/mypatients/storeresearch/', ['as' => 'dashboard.mypatients.storeresearch', 'uses' => 'Admin\MypatientsController@storeresearch']);
    Route::get('/mypatients/{id}/showresearch/', ['as' => 'dashboard.mypatients.showresearch', 'uses' => 'Admin\MypatientsController@showresearch']);

    Route::get('/labresearch/{id}/show/', ['as' => 'dashboard.labresearch.show', 'uses' => 'Admin\LabresearchController@show']);
    Route::post('/labresearch/save/', ['as' => 'dashboard.labresearch.save', 'uses' => 'Admin\LabresearchController@save']);

    Route::get('/mypatients/createservice/{patients_id}/', ['as' => 'dashboard.mypatients.createservice', 'uses' => 'Admin\MypatientsController@createservice']);
    Route::get('/mypatients/createcertificate/{patients_id}/', ['as' => 'dashboard.mypatients.createcertificate', 'uses' => 'Admin\MypatientsController@createcertificate']);
    Route::post('/mypatients/storecertificate/', ['as' => 'dashboard.mypatients.storecertificate', 'uses' => 'Admin\MypatientsController@storecertificate']);

    Route::post('/mypatients/storeservice/', ['as' => 'dashboard.mypatients.storeservice', 'uses' => 'Admin\MypatientsController@storeservice']);
    Route::get('/mypatients/{id}/editinspection/', ['as' => 'dashboard.mypatients.editinspection', 'uses' => 'Admin\MypatientsController@editinspection']);
    Route::get('/mypatients/{id}/deleteinspection/', ['as' => 'dashboard.mypatients.deleteinspection', 'uses' => 'Admin\MypatientsController@deleteinspection']);
    Route::get('/mypatients/{id}/printlabrequest/', ['as' => 'dashboard.mypatients.printlabrequest', 'uses' => 'Admin\MypatientsController@printlabrequest']);

    Route::get('/mypatients/{id}/printvmp/', ['as' => 'dashboard.mypatients.printvmp', 'uses' => 'Admin\MypatientsController@printvmp']);

    Route::get('/complexservice/{id}/changedifficulty/', ['as' => 'dashboard.complexservice.changedifficulty', 'uses' => 'Admin\ComplexserviceController@changedifficulty']);
    Route::post('/complexservice/storedifficulty/', ['as' => 'dashboard.complexservice.storedifficulty', 'uses' => 'Admin\ComplexserviceController@storedifficulty']);

    Route::get('/complexservice/{id}/changeprice/', ['as' => 'dashboard.complexservice.changeprice', 'uses' => 'Admin\ComplexserviceController@changeprice']);
    Route::post('/complexservice/storeprice/', ['as' => 'dashboard.complexservice.storeprice', 'uses' => 'Admin\ComplexserviceController@storeprice']);

    Route::get('/mypatients/createinspection/{patients_id}/', ['as' => 'dashboard.mypatients.createinspection', 'uses' => 'Admin\MypatientsController@createinspection']);
    Route::patch('/mypatients/{id}/updateinspection/', ['as' => 'dashboard.mypatients.updateinspection', 'uses' => 'Admin\MypatientsController@updateinspection']);
    Route::post('/mypatients/storeinspection/', ['as' => 'dashboard.mypatients.storeinspection', 'uses' => 'Admin\MypatientsController@storeinspection']);
    Route::get('/insuranceorganizations/{id}/clientinsurance/', ['as' => 'dashboard.insuranceorganizations.clientinsurance', 'uses' => 'Admin\InsuranceorganizationsController@clientinsurance']);
    Route::get('/insuranceorganizations/{id}/massclientinsurance/', ['as' => 'dashboard.insuranceorganizations.massclientinsurance', 'uses' => 'Admin\InsuranceorganizationsController@massclientinsurance']);

    Route::get('/mypatients/{id}/processservice/', ['as' => 'dashboard.mypatients.processservice', 'uses' => 'Admin\MypatientsController@processservice']);
    Route::get('/patients/{id}/print/', ['as' => 'dashboard.patients.print', 'uses' => 'Admin\PatientsController@print']);
    Route::get('/patients/{id}/download/', ['as' => 'dashboard.patients.download', 'uses' => 'Admin\PatientsController@download']);
    Route::get('/mypatients/{id}/stacionarcardlist/', ['as' => 'dashboard.mypatients.stacionarcardlist', 'uses' => 'Admin\MypatientsController@stacionarcardlist']);
    Route::get('/patients/{id}/stacionarcardlist/', ['as' => 'dashboard.patients.stacionarcardlist', 'uses' => 'Admin\PatientsController@stacionarcardlist']);
    Route::get('/mypatients/{id}/printstacionarcard/', ['as' => 'dashboard.mypatients.printstacionarcard', 'uses' => 'Admin\MypatientsController@printstacionarcard']);
    Route::get('/mypatients/{id}/printstacionarcardagree/', ['as' => 'dashboard.mypatients.printstacionarcardagree', 'uses' => 'Admin\MypatientsController@printstacionarcardagree']);
    Route::get('/mypatients/{id}/printstacionarcardall/', ['as' => 'dashboard.mypatients.printstacionarcardall', 'uses' => 'Admin\MypatientsController@printstacionarcardall']);
    Route::get('/anesthesiologist/{id}/printagreeosmotr/', ['as' => 'dashboard.anesthesiologist.printagreeosmotr', 'uses' => 'Admin\AnesthesiologistController@printagreeosmotr']);
    Route::patch('/mypatients/{id}/storecard/', ['as' => 'dashboard.mypatients.storecard', 'uses' => 'Admin\MypatientsController@storecard']);
    Route::patch('/mypatients/{id}/osmotr_edit/', ['as' => 'dashboard.mypatients.osmotr_edit', 'uses' => 'Admin\MypatientsController@osmotr_edit']);
    Route::get('/mypatients/{id}/editcard/', ['as' => 'dashboard.mypatients.editcard', 'uses' => 'Admin\MypatientsController@editcard']);
    Route::get('/mypatients/{id}/stacionarcardshow/', ['as' => 'dashboard.mypatients.stacionarcardshow', 'uses' => 'Admin\MypatientsController@stacionarcardshow']);
    Route::get('/mypatients/{id}/stacionarcardlatest/', ['as' => 'dashboard.mypatients.stacionarcardlatest', 'uses' => 'Admin\MypatientsController@stacionarcardlatest']);
    Route::post('/mypatients/staccardstoreinspection/', ['as' => 'dashboard.mypatients.staccardstoreinspection', 'uses' => 'Admin\MypatientsController@staccardstoreinspection']);
    Route::get('/mypatients/{id}/printstacionarcardlatest/', ['as' => 'dashboard.mypatients.printstacionarcardlatest', 'uses' => 'Admin\MypatientsController@printstacionarcardlatest']);
    Route::get('/mypatients/{id}/showprotokol/', ['as' => 'dashboard.mypatients.showprotokol', 'uses' => 'Admin\MypatientsController@showprotokol']);
    Route::post('/mypatients/{id}/sendtoolk/', ['as' => 'dashboard.mypatients.sendtoolk', 'uses' => 'Admin\MypatientsController@sendtoolk']);
    Route::post('/mypatients/{id}/sendtoan/', ['as' => 'dashboard.mypatients.sendtoan', 'uses' => 'Admin\MypatientsController@sendtoan']);
    Route::get('/mypatients/{id}/closecard/', ['as' => 'dashboard.mypatients.closecard', 'uses' => 'Admin\MypatientsController@closecard']);
    Route::get('/mypatients/{id}/opencard/', ['as' => 'dashboard.mypatients.opencard', 'uses' => 'Admin\MypatientsController@opencard']);
    Route::get('/mypatients/{id}/research/', ['as' => 'dashboard.mypatients.research', 'uses' => 'Admin\MypatientsController@research']);
    Route::get('/mypatients/{id}/researchfiles/', ['as' => 'dashboard.mypatients.researchfiles', 'uses' => 'Admin\MypatientsController@researchfiles']);


    Route::get('/mypatients/{id}/inspections/', ['as' => 'dashboard.mypatients.inspections', 'uses' => 'Admin\MypatientsController@inspections']);
    Route::get('/mypatients/{id}/preparats/', ['as' => 'dashboard.mypatients.preparats', 'uses' => 'Admin\MypatientsController@preparats']);
    Route::get('/mypatients/{id}/preparats2/', ['as' => 'dashboard.mypatients.preparats2', 'uses' => 'Admin\MypatientsController@preparats2']);
    Route::post('/mypatients/{id}/sendtostacionar/', ['as' => 'dashboard.mypatients.sendtostacionar', 'uses' => 'Admin\MypatientsController@sendtostacionar']);

    Route::get('/mypatients/{id}/sickleave/', ['as' => 'dashboard.mypatients.sickleave', 'uses' => 'Admin\MypatientsController@sickleave']);
    Route::get('/mypatients/sickleaveadd/', ['as' => 'dashboard.mypatients.sickleaveadd', 'uses' => 'Admin\MypatientsController@sickleaveadd']);
    Route::get('/mypatients/sickleavestore/', ['as' => 'dashboard.mypatients.sickleavestore', 'uses' => 'Admin\MypatientsController@sickleavestore']);

    Route::post('/mypatients/setmode/', ['as' => 'dashboard.mypatients.setmode', 'uses' => 'Admin\MypatientsController@setmode']);
    Route::post('/mypatients/settable/', ['as' => 'dashboard.mypatients.settable', 'uses' => 'Admin\MypatientsController@settable']);

    Route::post('/mypatients/deletetarget/', ['as' => 'dashboard.mypatients.deletetarget', 'uses' => 'Admin\MypatientsController@deletetarget']);
    Route::post('/mypatients/settargetother/', ['as' => 'dashboard.mypatients.settargetother', 'uses' => 'Admin\MypatientsController@settargetother']);
    Route::post('/mypatients/settargetterapevt/', ['as' => 'dashboard.mypatients.settargetterapevt', 'uses' => 'Admin\MypatientsController@settargetterapevt']);


    Route::get('/mypatients/{id}/sickleaveprint/', ['as' => 'dashboard.mypatients.sickleaveprint', 'uses' => 'Admin\MypatientsController@sickleaveprint']);

    Route::get('/mypatients/{id}/printresearch/', ['as' => 'dashboard.mypatients.printresearch', 'uses' => 'Admin\MypatientsController@printresearch']);
    Route::get('/mypatients/{id}/printlatest/', ['as' => 'dashboard.mypatients.printlatest', 'uses' => 'Admin\MypatientsController@printlatest']);

    Route::get('/selectdepartament/', ['as' => 'home.selectdepartament', 'uses' => 'HomeController@select_departament']);
    Route::post('/selectdepartamentapply/', ['as' => 'home.selectdepartamentapply', 'uses' => 'HomeController@select_departament_apply']);
    Route::post('/createstcardapply/', ['as' => 'createstcard.apply', 'uses' => 'Admin\CreatestcardController@apply']);

    Route::get('/calculatequeue/', ['as' => 'dashboard.managequeue.calculatequeue', 'uses' => 'Admin\ManagequeueController@calculatequeue']);

    Route::get('/patients/{id}/actions/', ['as' => 'dashboard.patients.actions', 'uses' => 'Admin\PatientsController@actions']);
    Route::get('/patients/{id}/exchange/', ['as' => 'dashboard.patients.exchange', 'uses' => 'Admin\PatientsController@exchange']);

    Route::get('/elqueue/{id}/req/', ['as' => 'dashboard.elqueue.req', 'uses' => 'Admin\ElqueueController@req']);
    Route::post('/elqueue/setdoctor/', ['as' => 'dashboard.elqueue.setdoctor', 'uses' => 'Admin\ElqueueController@setdoctor']);

    Route::get('/eyeglass/{id}/create', ['as' => 'dashboard.eyeglass.create','uses' => 'Admin\EyeglassController@create']);
    Route::post('/eyeglass/showsliders', ['as' => 'dashboard.eyeglass.showsliders','uses' => 'Admin\EyeglassController@showsliders']);
    Route::get('/eyeglass/index', ['as' => 'dashboard.eyeglass.index','uses' => 'Admin\EyeglassController@index']);
    Route::get('/eyeglass/find', ['as' => 'dashboard.eyeglass.find','uses' => 'Admin\EyeglassController@find']);
    Route::get('/eyeglass/findPatient', ['as' => 'dashboard.eyeglass.findPatient','uses' => 'Admin\EyeglassController@findPatient']);
    Route::get('/eyeglass/{id}/edit', ['as' => 'dashboard.eyeglass.edit','uses' => 'Admin\EyeglassController@edit']);
    Route::post('/eyeglass/{id}/update',['as' => 'dashboard.eyeglass.update','uses' => 'Admin\EyeglassController@update']);
    Route::get('/eyeglass/{id}/download',['as' => 'dashboard.eyeglass.download','uses' => 'Admin\EyeglassController@download']);
    Route::post('/eyeglass/storeasnew',['as' => 'dashboard.eyeglass.storeasnew','uses' => 'Admin\EyeglassController@storeasnew']);
    Route::post('/eyeglass/store',['as' => 'dashboard.eyeglass.store','uses' => 'Admin\EyeglassController@store']);
    Route::get('/eyeglass/{id}/changetoadmission',['as' => 'dashboard.eyeglass.changetoadmission','uses' => 'Admin\EyeglassController@changetoadmission']);
    Route::post('/eyeglass/changetoacquisition',['as' => 'dashboard.eyeglass.changetoacquisition','uses' => 'Admin\EyeglassController@changetoacquisition']);
    Route::get('/eyeglass/{id}/changetostock',['as' => 'dashboard.eyeglass.changetostock','uses' => 'Admin\EyeglassController@changetostock']);
    Route::get('/eyeglass/{id}/changetoimplanted',['as' => 'dashboard.eyeglass.changetoimplanted','uses' => 'Admin\EyeglassController@changetoimplanted']);
    Route::delete('/eyeglass/{id}/destroy',['as' => 'dashboard.eyeglass.destroy','uses' => 'Admin\EyeglassController@destroy']);

    Route::get('/lens/index', ['as' => 'dashboard.lens.index','uses' => 'Admin\LensController@index']);
    Route::get('/lens/create', ['as' => 'dashboard.lens.create','uses' => 'Admin\LensController@create']);
    Route::get('/lens/{id}/edit', ['as' => 'dashboard.lens.edit','uses' => 'Admin\LensController@edit']);
    Route::post('/lens/{id}/update',['as' => 'dashboard.lens.update','uses' => 'Admin\LensController@update']);
    Route::post('/lens/store',['as' => 'dashboard.lens.store','uses' => 'Admin\LensController@store']);
    Route::delete('/lens/{id}/destroy',['as' => 'dashboard.lens.destroy','uses' => 'Admin\LensController@destroy']);
    Route::post('/lens/massDelete',['as' => 'dashboard.lens.massDelete','uses' => 'Admin\LensController@massDelete']);


    Route::get('/habitation/group/', ['as' => 'dashboard.habitation.group', 'uses' => 'Admin\HabitationController@group'])->name('habitation.group');
    Route::post('/habitation/close/', ['as' => 'dashboard.habitation.close', 'uses' => 'Admin\HabitationController@close']);
    Route::post('/habitation/extension/', ['as' => 'dashboard.habitation.extension', 'uses' => 'Admin\HabitationController@extension']);
    Route::get('/habitation/{id}/evict/', ['as' => 'dashboard.habitation.evict', 'uses' => 'Admin\HabitationController@evict']);
    Route::get('/habitation/check/', ['as' => 'dashboard.habitation.check', 'uses' => 'Admin\HabitationController@check']);

    Route::get('/checkplace/check/', ['as' => 'dashboard.checkplace.check', 'uses' => 'Admin\CheckplaceController@check']);
    Route::post('/checkplace/save_all_param/', ['as' => 'dashboard.checkplace.save_all_param', 'uses' => 'Admin\CheckplaceController@save_all_param']);
    Route::post('/checkplace/check_save/', ['as' => 'dashboard.checkplace.check_save', 'uses' => 'Admin\CheckplaceController@check_save']);
    Route::get('/checkplace/dogovor/', ['as' => 'dashboard.checkplace.dogovor', 'uses' => 'Admin\CheckplaceController@dogovor']);
    Route::get('/checkplace/karta/', ['as' => 'dashboard.checkplace.kartahabitation', 'uses' => 'Admin\CheckplaceController@kartahabitation']);
    
    Route::post('/endhabitation/{id}/close/', ['as' => 'dashboard.endhabitation.close', 'uses' => 'Admin\EndhabitationController@close']);  
    Route::get('/habitation/{id}/printresidentcard/', ['as' => 'dashboard.habitation.printresidentcard', 'uses' => 'Admin\HabitationController@printresidentcard']);
    Route::get('/habitation/floorplan/', ['as' => 'dashboard.habitation.floorplan', 'uses' => 'Admin\HabitationController@floorplan']);
    Route::post('/habitation/updateplan/', ['as' => 'dashboard.habitation.updateplan', 'uses' => 'Admin\HabitationController@updateplan']);
    Route::post('/habitation/tobook/', ['as' => 'dashboard.habitation.tobook', 'uses' => 'Admin\HabitationController@tobook']);

    Route::get('/reportstacionar/full/', ['as' => 'dashboard.reportstacionar.full', 'uses' => 'Admin\ReportstacionarController@full']);
    Route::get('/reportstacionar/close/', ['as' => 'dashboard.reportstacionar.close', 'uses' => 'Admin\ReportstacionarController@close']);
    Route::get('/reportstacionar/dolg/', ['as' => 'dashboard.reportstacionar.dolg', 'uses' => 'Admin\ReportstacionarController@dolg']);
    Route::get('/reportstacionar/etag/', ['as' => 'dashboard.reportstacionar.etag', 'uses' => 'Admin\ReportstacionarController@etag']);


    Route::get('/perimetria/{id}/change/', ['as' => 'dashboard.perimetria.change', 'uses' => 'Admin\PerimetriaController@change']);
    Route::get('/perimetria/{id}/req/', ['as' => 'dashboard.perimetria.req', 'uses' => 'Admin\PerimetriaController@req']);
    Route::get('/testsnabinacular/{id}/req/', ['as' => 'dashboard.testsnabinacular.req', 'uses' => 'Admin\TestsnabinacularController@req']);
    Route::get('/endotelialbiomicroscopy/{id}/req/', ['as' => 'dashboard.endotelialbiomicroscopy.req', 'uses' => 'Admin\EndotelialbiomicroscopyController@req']);



    Route::get('/plusoptix/{id}/change/', ['as' => 'dashboard.plusoptix.change', 'uses' => 'Admin\PlusoptixController@change']);
    Route::get('/avtorefraktometria/{id}/change/', ['as' => 'dashboard.avtorefraktometria.change', 'uses' => 'Admin\AvtorefraktometriaController@change']);
    Route::get('/avtorefraktometria/{id}/req/', ['as' => 'dashboard.avtorefraktometria.req', 'uses' => 'Admin\AvtorefraktometriaController@req']);

    Route::post('/mypatients/{id}/storeprocess/', ['as' => 'dashboard.mypatients.storeprocess', 'uses' => 'Admin\MypatientsController@storeprocess']);
    Route::get('/mypatients/{id}/editprocess/', ['as' => 'dashboard.mypatients.editprocess', 'uses' => 'Admin\MypatientsController@editprocess']);

    Route::get('/mypatients/{id}/cancelresearch/', ['as' => 'dashboard.mypatients.cancelresearch', 'uses' => 'Admin\MypatientsController@cancelresearch']);

    Route::get('/mypatients/{id}/printinspection/', ['as' => 'dashboard.mypatients.printinspection', 'uses' => 'Admin\MypatientsController@printinspection']);
    Route::get('/mypatients/{id}/printinspection_stac/', ['as' => 'dashboard.mypatients.printinspection_stac', 'uses' => 'Admin\MypatientsController@printinspection_stac']);
    Route::get('/mypatients/{id}/showinspection/', ['as' => 'dashboard.mypatients.showinspection', 'uses' => 'Admin\MypatientsController@showinspection']);
    Route::get('/mypatients/{id}/showinspection_stac/', ['as' => 'dashboard.mypatients.showinspection_stac', 'uses' => 'Admin\MypatientsController@showinspection_stac']);
    Route::get('/mypatients/{id}/prolongatepreparat/', ['as' => 'dashboard.mypatients.prolongatepreparat', 'uses' => 'Admin\MypatientsController@prolongatepreparat']);
    Route::get('/mypatients/{id}/prolongatecurs/', ['as' => 'dashboard.mypatients.prolongatecurs', 'uses' => 'Admin\MypatientsController@prolongatecurs']);

    Route::post('/mypatients/storepreparatprolongate/', ['as' => 'dashboard.mypatients.storepreparatprolongate', 'uses' => 'Admin\MypatientsController@storepreparatprolongate']);
    Route::post('/mypatients/storecursprolongate/', ['as' => 'dashboard.mypatients.storecursprolongate', 'uses' => 'Admin\MypatientsController@storecursprolongate']);
    Route::get('/mypatients/{patients_id}/tppreparat/', ['as' => 'dashboard.mypatients.tppreparat', 'uses' => 'Admin\MypatientsController@tppreparat']);

    Route::get('/mypatients/{patients_id}/transferpatient/', ['as' => 'dashboard.mypatients.transferpatient', 'uses' => 'Admin\MypatientsController@transferpatient']);
    Route::post('/mypatients/storetransferpatient/', ['as' => 'dashboard.mypatients.storetransferpatient', 'uses' => 'Admin\MypatientsController@storetransferpatient']);

    Route::get('/ascan/{id}/closeos/', ['as' => 'dashboard.ascan.closeos', 'uses' => 'Admin\AscanController@closeos']);
    Route::get('/avtorefraktometria/{id}/closeos/', ['as' => 'dashboard.avtorefraktometria.closeos', 'uses' => 'Admin\AvtorefraktometriaController@closeos']);
    Route::get('/bscan/{id}/closeos/', ['as' => 'dashboard.bscan.closeos', 'uses' => 'Admin\BscanController@closeos']);
    Route::get('/angitok/{id}/closeos/', ['as' => 'dashboard.angitok.closeos', 'uses' => 'Admin\AngitokController@closeos']);
    Route::get('/angitok1/{id}/closeos/', ['as' => 'dashboard.angitok1.closeos', 'uses' => 'Admin\Angitok1Controller@closeos']);
    Route::get('/comperimetria/{id}/closeos/', ['as' => 'dashboard.comperimetria.closeos', 'uses' => 'Admin\ComperimetriaController@closeos']);
    Route::get('/comperimetria/{id}/req/', ['as' => 'dashboard.comperimetria.req', 'uses' => 'Admin\ComperimetriaController@req']);
    Route::get('/diafanoskopiya/{id}/closeos/', ['as' => 'dashboard.diafanoskopiya.closeos', 'uses' => 'Admin\DiafanoskopiyaController@closeos']);
    Route::get('/dr/{id}/closeos/', ['as' => 'dashboard.dr.closeos', 'uses' => 'Admin\DrController@closeos']);
    Route::get('/eklektr/{id}/closeos/', ['as' => 'dashboard.eklektr.closeos', 'uses' => 'Admin\EklektrController@closeos']);
    Route::get('/ergraf/{id}/closeos/', ['as' => 'dashboard.ergraf.closeos', 'uses' => 'Admin\ErgrafController@closeos']);
    Route::get('/exo/{id}/closeos/', ['as' => 'dashboard.exo.closeos', 'uses' => 'Admin\ExoController@closeos']);
    Route::get('/eyearea/{id}/closeos/', ['as' => 'dashboard.eyearea.closeos', 'uses' => 'Admin\EyeareaController@closeos']);
    Route::get('/flua/{id}/closeos/', ['as' => 'dashboard.flua.closeos', 'uses' => 'Admin\FluaController@closeos']);
    Route::get('/gonioskopiya/{id}/closeos/', ['as' => 'dashboard.gonioskopiya.closeos', 'uses' => 'Admin\GonioskopiyaController@closeos']);
    Route::get('/keratopahimetria/{id}/closeos/', ['as' => 'dashboard.keratopahimetria.closeos', 'uses' => 'Admin\KeratopahimetriaController@closeos']);
    Route::get('/ktp/{id}/closeos/', ['as' => 'dashboard.ktp.closeos', 'uses' => 'Admin\KtpController@closeos']);
    Route::get('/obiom/{id}/closeos/', ['as' => 'dashboard.obiom.closeos', 'uses' => 'Admin\ObiomController@closeos']);
    Route::get('/omiz/{id}/closeos/', ['as' => 'dashboard.omiz.closeos', 'uses' => 'Admin\OmizController@closeos']);
    Route::get('/omiz/{id}/req/', ['as' => 'dashboard.omiz.req', 'uses' => 'Admin\OmizController@req']);
    Route::get('/ostrotavochkah/{id}/closeos/', ['as' => 'dashboard.ostrotavochkah.closeos', 'uses' => 'Admin\OstrotavochkahController@closeos']);

    Route::get('/ostrotavochkah/{id}/req/', ['as' => 'dashboard.ostrotavochkah.req', 'uses' => 'Admin\OstrotavochkahController@req']);

    Route::get('/pc/{id}/closeos/', ['as' => 'dashboard.pc.closeos', 'uses' => 'Admin\PcController@closeos']);
    Route::get('/pentacam/{id}/closeos/', ['as' => 'dashboard.pentacam.closeos', 'uses' => 'Admin\PentacamController@closeos']);
    Route::get('/perimetria/{id}/closeos/', ['as' => 'dashboard.perimetria.closeos', 'uses' => 'Admin\PerimetriaController@closeos']);
    Route::get('/plusoptix/{id}/closeos/', ['as' => 'dashboard.plusoptix.closeos', 'uses' => 'Admin\PlusoptixController@closeos']);
    Route::get('/pnevmotonometria/{id}/closeos/', ['as' => 'dashboard.pnevmotonometria.closeos', 'uses' => 'Admin\PnevmotonometriaController@closeos']);

    Route::get('/pnevmotonometria/{id}/req/', ['as' => 'dashboard.pnevmotonometria.req', 'uses' => 'Admin\PnevmotonometriaController@req']);

    Route::get('/podborochkov/{id}/closeos/', ['as' => 'dashboard.podborochkov.closeos', 'uses' => 'Admin\PodborochkovController@closeos']);
    Route::get('/podborochkov/{id}/req/', ['as' => 'dashboard.podborochkov.req', 'uses' => 'Admin\PodborochkovController@req']);
    Route::get('/tok1/{id}/closeos/', ['as' => 'dashboard.tok1.closeos', 'uses' => 'Admin\Tok1Controller@closeos']);
    Route::get('/tok23/{id}/closeos/', ['as' => 'dashboard.tok23.closeos', 'uses' => 'Admin\Tok23Controller@closeos']);
    Route::get('/tonograf/{id}/closeos/', ['as' => 'dashboard.tonograf.closeos', 'uses' => 'Admin\TonografController@closeos']);
    Route::get('/tonometriamaklakov/{id}/closeos/', ['as' => 'dashboard.tonometriamaklakov.closeos', 'uses' => 'Admin\TonometriamaklakovController@closeos']);
    Route::get('/tonometriamaklakov/{id}/req/', ['as' => 'dashboard.tonometriamaklakov.req', 'uses' => 'Admin\TonometriamaklakovController@req']);
    Route::get('/ubiomik/{id}/closeos/', ['as' => 'dashboard.ubiomik.closeos', 'uses' => 'Admin\UbiomikController@closeos']);
    Route::get('/ubiomik/{id}/req/', ['as' => 'dashboard.ubiomik.req', 'uses' => 'Admin\UbiomikController@req']);
    Route::get('/zvp/{id}/closeos/', ['as' => 'dashboard.zvp.closeos', 'uses' => 'Admin\ZvpController@closeos']);
    Route::get('/oktpo/{id}/closeos/', ['as' => 'dashboard.oktpo.closeos', 'uses' => 'Admin\OktpoController@closeos']);
    Route::get('/microperimetria/{id}/closeos/', ['as' => 'dashboard.microperimetria.closeos', 'uses' => 'Admin\MicroperimetriaController@closeos']);
    Route::get('/ubiom/{id}/closeos/', ['as' => 'dashboard.ubiom.closeos', 'uses' => 'Admin\UbiomController@closeos']);
    Route::get('/tok23/{id}/printresearch', ['as' => 'dashboard.tok23.printresearch', 'uses' => 'Admin\Tok23Controller@printresearch']);

    Route::get('/comperimetria/{id}/closeou/', ['as' => 'dashboard.comperimetria.closeou', 'uses' => 'Admin\ComperimetriaController@closeou']);
    Route::get('/ubiomik/{id}/closeou/', ['as' => 'dashboard.ubiomik.closeou', 'uses' => 'Admin\UbiomikController@closeou']);
    Route::get('/angitok/{id}/closeou/', ['as' => 'dashboard.angitok.closeou', 'uses' => 'Admin\AngitokController@closeou']);


    Route::get('/mypatients/{id}/printinspectionext/', ['as' => 'dashboard.mypatients.printinspectionext', 'uses' => 'Admin\MypatientsController@printinspectionext']);
    Route::get('/mypatients/{id}/changedate/', ['as' => 'dashboard.mypatients.changedate', 'uses' => 'Admin\MypatientsController@changedate']);
    Route::post('/mypatients/storedate/', ['as' => 'dashboard.mypatients.storedate', 'uses' => 'Admin\MypatientsController@storedate']);

    Route::get('/managequeue/print/', ['as' => 'dashboard.managequeue.print', 'uses' => 'Admin\ManagequeueController@printqueue']);
    Route::get('/managequeue/printbytable/', ['as' => 'dashboard.managequeue.printbytable', 'uses' => 'Admin\ManagequeueController@printbytable']);

    Route::get('/managequeue/fixday/', ['as' => 'dashboard.managequeue.fixday', 'uses' => 'Admin\ManagequeueController@fixday']);
    Route::get('/managequeue/unfixday/', ['as' => 'dashboard.managequeue.unfixday', 'uses' => 'Admin\ManagequeueController@unfixday']);

    Route::get('/managequeue/printbyvrach/', ['as' => 'dashboard.managequeue.printbyvrach', 'uses' => 'Admin\ManagequeueController@printbyvrach']);
    Route::get('/managequeue/printbygroup/', ['as' => 'dashboard.managequeue.printbygroup', 'uses' => 'Admin\ManagequeueController@printbygroup']);
    Route::get('/mypatients/{id}/showaddress/', ['as' => 'dashboard.mypatients.showaddress', 'uses' => 'Admin\MypatientsController@showaddress']);
    Route::get('/{id}/patientresearch/', ['as' => 'dashboard.patientsearch.patientresearch', 'uses' => 'Admin\PatientsearchController@patientresearch']);
    Route::get('/{id}/newresearch/', ['as' => 'dashboard.patientsearch.newresearch', 'uses' => 'Admin\PatientsearchController@newresearch']);
    Route::get('/{id}/closeresearch/', ['as' => 'dashboard.patientsearch.closeresearch', 'uses' => 'Admin\PatientsearchController@closeresearch']);
    Route::get('/{id}/endresearch/', ['as' => 'dashboard.elqueue.endresearch', 'uses' => 'Admin\ElqueueController@endresearch']);

    Route::get('/managequeue/printbyday/', ['as' => 'dashboard.managequeue.printbyday', 'uses' => 'Admin\ManagequeueController@printbyday']);
    Route::post('/managequeue/moveitem/', ['as' => 'dashboard.managequeue.moveitem', 'uses' => 'Admin\ManagequeueController@moveitem']);
    Route::post('/managequeue/massmoveitem/', ['as' => 'dashboard.managequeue.massmoveitem', 'uses' => 'Admin\ManagequeueController@massmoveitem']);
    Route::post('/managequeue/moveme/', ['as' => 'dashboard.managequeue.moveme', 'uses' => 'Admin\ManagequeueController@moveme']);
    Route::post('/managequeue/deleteitem/', ['as' => 'dashboard.managequeue.deleteitem', 'uses' => 'Admin\ManagequeueController@deleteitem']);
    Route::get('/managequeue/printorm/', ['as' => 'dashboard.managequeue.printorm', 'uses' => 'Admin\ManagequeueController@printorm']);
    Route::get('/managequeue/check/', ['as' => 'dashboard.managequeue.check', 'uses' => 'Admin\ManagequeueController@check']);
    Route::get('/managequeue/printormbypatients/', ['as' => 'dashboard.managequeue.printormbypatients', 'uses' => 'Admin\ManagequeueController@printormbypatients']);

    Route::get('/ascan/{id}/closeod/', ['as' => 'dashboard.ascan.closeod', 'uses' => 'Admin\AscanController@closeod']);
    Route::get('/avtorefraktometria/{id}/closeod/', ['as' => 'dashboard.avtorefraktometria.closeod', 'uses' => 'Admin\AvtorefraktometriaController@closeod']);
    Route::get('/bscan/{id}/closeod/', ['as' => 'dashboard.bscan.closeod', 'uses' => 'Admin\BscanController@closeod']);
    Route::get('/angitok/{id}/closeod/', ['as' => 'dashboard.angitok.closeod', 'uses' => 'Admin\AngitokController@closeod']);
    Route::get('/angitok1/{id}/closeod/', ['as' => 'dashboard.angitok1.closeod', 'uses' => 'Admin\Angitok1Controller@closeod']);
    Route::get('/comperimetria/{id}/closeod/', ['as' => 'dashboard.comperimetria.closeod', 'uses' => 'Admin\ComperimetriaController@closeod']);
    Route::get('/diafanoskopiya/{id}/closeod/', ['as' => 'dashboard.diafanoskopiya.closeod', 'uses' => 'Admin\DiafanoskopiyaController@closeod']);
    Route::get('/dr/{id}/closeod/', ['as' => 'dashboard.dr.closeod', 'uses' => 'Admin\DrController@closeod']);
    Route::get('/eklektr/{id}/closeod/', ['as' => 'dashboard.eklektr.closeod', 'uses' => 'Admin\EklektrController@closeod']);
    Route::get('/ergraf/{id}/closeod/', ['as' => 'dashboard.ergraf.closeod', 'uses' => 'Admin\ErgrafController@closeod']);
    Route::get('/exo/{id}/closeod/', ['as' => 'dashboard.exo.closeod', 'uses' => 'Admin\ExoController@closeod']);
    Route::get('/eyearea/{id}/closeod/', ['as' => 'dashboard.eyearea.closeod', 'uses' => 'Admin\EyeareaController@closeod']);
    Route::get('/flua/{id}/closeod/', ['as' => 'dashboard.flua.closeod', 'uses' => 'Admin\FluaController@closeod']);
    Route::get('/flua/{id}/req/', ['as' => 'dashboard.flua.req', 'uses' => 'Admin\FluaController@req']);
    Route::get('/gonioskopiya/{id}/closeod/', ['as' => 'dashboard.gonioskopiya.closeod', 'uses' => 'Admin\GonioskopiyaController@closeod']);
    Route::get('/keratopahimetria/{id}/closeod/', ['as' => 'dashboard.keratopahimetria.closeod', 'uses' => 'Admin\KeratopahimetriaController@closeod']);
    Route::get('/ktp/{id}/closeod/', ['as' => 'dashboard.ktp.closeod', 'uses' => 'Admin\KtpController@closeod']);
    Route::get('/obiom/{id}/closeod/', ['as' => 'dashboard.obiom.closeod', 'uses' => 'Admin\ObiomController@closeod']);
    Route::get('/omiz/{id}/closeod/', ['as' => 'dashboard.omiz.closeod', 'uses' => 'Admin\OmizController@closeod']);

    Route::get('/obiom/{id}/req/', ['as' => 'dashboard.obiom.req', 'uses' => 'Admin\ObiomController@req']);
    Route::get('/omiz/{id}/req/', ['as' => 'dashboard.omiz.req', 'uses' => 'Admin\OmizController@req']);
    Route::get('/ktp/{id}/req/', ['as' => 'dashboard.ktp.req', 'uses' => 'Admin\KtpController@req']);

    Route::get('/ostrotavochkah/{id}/closeod/', ['as' => 'dashboard.ostrotavochkah.closeod', 'uses' => 'Admin\OstrotavochkahController@closeod']);
    Route::get('/pc/{id}/closeod/', ['as' => 'dashboard.pc.closeod', 'uses' => 'Admin\PcController@closeod']);
    Route::get('/pentacam/{id}/closeod/', ['as' => 'dashboard.pentacam.closeod', 'uses' => 'Admin\PentacamController@closeod']);
    Route::get('/perimetria/{id}/closeod/', ['as' => 'dashboard.perimetria.closeod', 'uses' => 'Admin\PerimetriaController@closeod']);
    Route::get('/plusoptix/{id}/closeod/', ['as' => 'dashboard.plusoptix.closeod', 'uses' => 'Admin\PlusoptixController@closeod']);
    Route::get('/plusoptix/{id}/req/', ['as' => 'dashboard.plusoptix.req', 'uses' => 'Admin\PlusoptixController@req']);
    Route::get('/pnevmotonometria/{id}/closeod/', ['as' => 'dashboard.pnevmotonometria.closeod', 'uses' => 'Admin\PnevmotonometriaController@closeod']);
    Route::get('/podborochkov/{id}/closeod/', ['as' => 'dashboard.podborochkov.closeod', 'uses' => 'Admin\PodborochkovController@closeod']);
    Route::get('/tok1/{id}/closeod/', ['as' => 'dashboard.tok1.closeod', 'uses' => 'Admin\Tok1Controller@closeod']);
    Route::get('/tok23/{id}/closeod/', ['as' => 'dashboard.tok23.closeod', 'uses' => 'Admin\Tok23Controller@closeod']);
    Route::get('/tonograf/{id}/closeod/', ['as' => 'dashboard.tonograf.closeod', 'uses' => 'Admin\TonografController@closeod']);
    Route::get('/tonometriamaklakov/{id}/closeod/', ['as' => 'dashboard.tonometriamaklakov.closeod', 'uses' => 'Admin\TonometriamaklakovController@closeod']);
    Route::get('/ubiomik/{id}/closeod/', ['as' => 'dashboard.ubiomik.closeod', 'uses' => 'Admin\UbiomikController@closeod']);
    Route::get('/zvp/{id}/closeod/', ['as' => 'dashboard.zvp.closeod', 'uses' => 'Admin\ZvpController@closeod']);
    Route::get('/oktpo/{id}/closeod/', ['as' => 'dashboard.oktpo.closeod', 'uses' => 'Admin\OktpoController@closeod']);
    Route::get('/microperimetria/{id}/closeod/', ['as' => 'dashboard.microperimetria.closeod', 'uses' => 'Admin\MicroperimetriaController@closeod']);
    Route::get('/ubiom/{id}/closeod/', ['as' => 'dashboard.ubiom.closeod', 'uses' => 'Admin\UbiomController@closeod']);
    Route::get('/ubiom/{id}/req/', ['as' => 'dashboard.ubiom.req', 'uses' => 'Admin\UbiomController@req']);
    Route::get('/ascan/{id}/close/', ['as' => 'dashboard.ascan.close', 'uses' => 'Admin\AscanController@close']);
    Route::get('/ascan/{id}/req/', ['as' => 'dashboard.ascan.req', 'uses' => 'Admin\AscanController@req']);
    Route::get('/avtorefraktometria/{id}/close/', ['as' => 'dashboard.avtorefraktometria.close', 'uses' => 'Admin\AvtorefraktometriaController@close']);
    Route::get('/bscan/{id}/close/', ['as' => 'dashboard.bscan.close', 'uses' => 'Admin\BscanController@close']);
    Route::get('/angitok/{id}/close/', ['as' => 'dashboard.angitok.close', 'uses' => 'Admin\AngitokController@close']);
    Route::get('/angitok1/{id}/close/', ['as' => 'dashboard.angitok1.close', 'uses' => 'Admin\Angitok1Controller@close']);
    Route::get('/comperimetria/{id}/close/', ['as' => 'dashboard.comperimetria.close', 'uses' => 'Admin\ComperimetriaController@close']);
    Route::get('/diafanoskopiya/{id}/close/', ['as' => 'dashboard.diafanoskopiya.close', 'uses' => 'Admin\DiafanoskopiyaController@close']);
    Route::get('/diafanoskopiya/{id}/req/', ['as' => 'dashboard.diafanoskopiya.req', 'uses' => 'Admin\DiafanoskopiyaController@req']);
    Route::get('/dr/{id}/close/', ['as' => 'dashboard.dr.close', 'uses' => 'Admin\DrController@close']);
    Route::get('/dr/{id}/req/', ['as' => 'dashboard.dr.req', 'uses' => 'Admin\DrController@req']);
    Route::get('/eklektr/{id}/close/', ['as' => 'dashboard.eklektr.close', 'uses' => 'Admin\EklektrController@close']);
    Route::get('/ergraf/{id}/close/', ['as' => 'dashboard.ergraf.close', 'uses' => 'Admin\ErgrafController@close']);
    Route::get('/exo/{id}/close/', ['as' => 'dashboard.exo.close', 'uses' => 'Admin\ExoController@close']);
    Route::get('/eyearea/{id}/close/', ['as' => 'dashboard.eyearea.close', 'uses' => 'Admin\EyeareaController@close']);
    Route::get('/flua/{id}/close/', ['as' => 'dashboard.flua.close', 'uses' => 'Admin\FluaController@close']);
    Route::get('/gonioskopiya/{id}/close/', ['as' => 'dashboard.gonioskopiya.close', 'uses' => 'Admin\GonioskopiyaController@close']);
    Route::get('/keratopahimetria/{id}/close/', ['as' => 'dashboard.keratopahimetria.close', 'uses' => 'Admin\KeratopahimetriaController@close']);
    Route::get('/keratopahimetria/{id}/req/', ['as' => 'dashboard.keratopahimetria.req', 'uses' => 'Admin\KeratopahimetriaController@req']);
    Route::get('/ktp/{id}/close/', ['as' => 'dashboard.ktp.close', 'uses' => 'Admin\KtpController@close']);
    Route::get('/obiom/{id}/close/', ['as' => 'dashboard.obiom.close', 'uses' => 'Admin\ObiomController@close']);
    Route::get('/omiz/{id}/close/', ['as' => 'dashboard.omiz.close', 'uses' => 'Admin\OmizController@close']);
    Route::get('/ostrotavochkah/{id}/close/', ['as' => 'dashboard.ostrotavochkah.close', 'uses' => 'Admin\OstrotavochkahController@close']);
    Route::get('/pc/{id}/close/', ['as' => 'dashboard.pc.close', 'uses' => 'Admin\PcController@close']);
    Route::get('/pc/{id}/req/', ['as' => 'dashboard.pc.req', 'uses' => 'Admin\PcController@req']);
    Route::get('/pentacam/{id}/close/', ['as' => 'dashboard.pentacam.close', 'uses' => 'Admin\PentacamController@close']);
    Route::get('/perimetria/{id}/close/', ['as' => 'dashboard.perimetria.close', 'uses' => 'Admin\PerimetriaController@close']);
    Route::get('/plusoptix/{id}/close/', ['as' => 'dashboard.plusoptix.close', 'uses' => 'Admin\PlusoptixController@close']);
    Route::get('/pnevmotonometria/{id}/close/', ['as' => 'dashboard.pnevmotonometria.close', 'uses' => 'Admin\PnevmotonometriaController@close']);
    Route::get('/podborochkov/{id}/close/', ['as' => 'dashboard.podborochkov.close', 'uses' => 'Admin\PodborochkovController@close']);
    Route::get('/tok1/{id}/close/', ['as' => 'dashboard.tok1.close', 'uses' => 'Admin\Tok1Controller@close']);
    Route::get('/tok23/{id}/close/', ['as' => 'dashboard.tok23.close', 'uses' => 'Admin\Tok23Controller@close']);
    Route::get('/tonograf/{id}/close/', ['as' => 'dashboard.tonograf.close', 'uses' => 'Admin\TonografController@close']);
    Route::get('/tonograf/{id}/req/', ['as' => 'dashboard.tonograf.req', 'uses' => 'Admin\TonografController@req']);
    Route::get('/tonometriamaklakov/{id}/close/', ['as' => 'dashboard.tonometriamaklakov.close', 'uses' => 'Admin\TonometriamaklakovController@close']);
    Route::get('/ubiomik/{id}/close/', ['as' => 'dashboard.ubiomik.close', 'uses' => 'Admin\UbiomikController@close']);
    Route::get('/zvp/{id}/close/', ['as' => 'dashboard.zvp.close', 'uses' => 'Admin\ZvpController@close']);
    Route::get('/oktpo/{id}/close/', ['as' => 'dashboard.oktpo.close', 'uses' => 'Admin\OktpoController@close']);
    Route::get('/microperimetria/{id}/close/', ['as' => 'dashboard.microperimetria.close', 'uses' => 'Admin\MicroperimetriaController@close']);
    Route::get('/ubiom/{id}/close/', ['as' => 'dashboard.ubiom.close', 'uses' => 'Admin\UbiomController@close']);

    Route::get('/olk/indexdataa/', ['as' => 'dashboard.olk.indexdataa', 'uses' =>'\App\Http\Controllers\Admin\OlkController@indexdataa']);
    Route::get('/aolknew/indexdata/', ['as' => 'dashboard.aolknew.indexdata', 'uses' =>'\App\Http\Controllers\Admin\AolknewController@indexdata']);
    Route::get('/aolkaccepted/indexdata/', ['as' => 'dashboard.aolkaccepted.indexdata', 'uses' =>'\App\Http\Controllers\Admin\AolkacceptedController@indexdata']);
    Route::get('/aolknotaccepted/indexdata/', ['as' => 'dashboard.aolknotaccepted.indexdata', 'uses' =>'\App\Http\Controllers\Admin\AolknotacceptedController@indexdata']);

    Route::get('/patients/indexdata/', ['as' => 'dashboard.patients.indexdata', 'uses' => 'Admin\PatientsController@indexdata']);
    Route::get('/patientsearch/indexdata/', ['as' => 'dashboard.patientsearch.indexdata', 'uses' => 'Admin\PatientsearchController@indexdata']);
    Route::get('/mypatients/{id}/anestesiolog/', ['as' => 'dashboard.mypatients.anestesiolog', 'uses' => 'Admin\MypatientsController@anestesiolog']);
    Route::get('/mypatients/{id}/protocols/', ['as' => 'dashboard.mypatients.protocols', 'uses' => 'Admin\MypatientsController@protocols']);

    Route::get('/olk/indexdata/', ['as' => 'dashboard.olk.indexdata', 'uses' => 'Admin\OlkController@indexdata']);
    Route::get('/olkhistory/indexdata/', ['as' => 'dashboard.olkhistory.indexdata', 'uses' => 'Admin\OlkhistoryController@indexdata']);
    Route::get('/olkcurrent/indexdata/', ['as' => 'dashboard.olkcurrent.indexdata', 'uses' => 'Admin\OlkcurrentController@indexdata']);
    Route::get('/olknotaccepted/indexdata/', ['as' => 'dashboard.olknotaccepted.indexdata', 'uses' => 'Admin\OlknotacceptedController@indexdata']);
    Route::get('/olkaccepted/indexdata/', ['as' => 'dashboard.olkaccepted.indexdata', 'uses' => 'Admin\OlkacceptedController@indexdata']);
    Route::get('/cardapprove/indexdata/', ['as' => 'dashboard.cardapprove.indexdata', 'uses' => 'Admin\CardapproveController@indexdata']);
    Route::get('/kassa/getprint/', ['as' => 'dashboard.kassa.getprint', 'uses' => 'Admin\KassaController@getPrint']);
    Route::get('/olkskleroplastika/{id}/print/', ['as' => 'dashboard.olkskleroplastika.print', 'uses' => 'Admin\OlkskleroplastikaController@printOlk']);
    Route::get('/olklrvk/{id}/print/', ['as' => 'dashboard.olklrvk.print', 'uses' => 'Admin\OlklrvkController@printOlk']);
    Route::get('/olklks/{id}/print/', ['as' => 'dashboard.olklks.print', 'uses' => 'Admin\OlklksController@printOlk']);
    Route::get('/olklasik/{id}/print/', ['as' => 'dashboard.olklasik.print', 'uses' => 'Admin\OlklasikController@printOlk']);
    Route::get('/olkkosoglazie/{id}/print/', ['as' => 'dashboard.olkkosoglazie.print', 'uses' => 'Admin\OlkkosoglazieController@printOlk']);
    Route::get('/olkkl/{id}/print/', ['as' => 'dashboard.olkkl.print', 'uses' => 'Admin\OlkklController@printOlk']);
    Route::get('/olkkatarakta/{id}/print/', ['as' => 'dashboard.olkkatarakta.print', 'uses' => 'Admin\OlkkataraktaController@printOlk']);
    Route::get('/olkglaukoma/{id}/print/', ['as' => 'dashboard.olkglaukoma.print', 'uses' => 'Admin\OlkglaukomaController@printOlk']);
    Route::get('/olkfrk/{id}/print/', ['as' => 'dashboard.olkfrk.print', 'uses' => 'Admin\OlkfrkController@printOlk']);
    Route::get('/olkeo/{id}/print/', ['as' => 'dashboard.olkeo.print', 'uses' => 'Admin\OlkeoController@printOlk']);
    Route::get('/olkbrah/{id}/print/', ['as' => 'dashboard.olkbrah.print', 'uses' => 'Admin\OlkbrahController@printOlk']);
    Route::get('/olkplastic/{id}/print/', ['as' => 'dashboard.olkplastic.print', 'uses' => 'Admin\OlkplasticController@printOlk']);
    Route::get('/olkkeratoplastika/{id}/print/', ['as' => 'dashboard.olkkeratoplastika.print', 'uses' => 'Admin\OlkkeratoplastikaController@printOlk']);
    Route::get('/olkobstruction/{id}/print/', ['as' => 'dashboard.olkobstruction.print', 'uses' => 'Admin\OlkobstructionController@printOlk']);
    Route::get('/mypatients/{id}/printepikriz/', ['as' => 'dashboard.mypatients.printepikriz', 'uses' => 'Admin\MypatientsController@printepikriz']);
    Route::post('/mypatients/{id}/storetemplateepikriz/', ['as' => 'dashboard.mypatients.storetemplateepikriz', 'uses' => 'Admin\MypatientsController@storetemplateepikriz']);
    Route::get('/tfoms/export/', ['as' => 'dashboard.admin.tfoms.export', 'uses' => 'Admin\TfomsController@export']);
    Route::delete('/mypatients/{id}/deletepreparat/', ['as' => 'dashboard.mypatients.deletepreparat', 'uses' => 'Admin\MypatientsController@deletepreparat']);
    Route::get('/mypatients/{id}/makefixed/', ['as' => 'dashboard.mypatients.makefixed', 'uses' => 'Admin\MypatientsController@makefixed']);
    Route::get('/mypatients/{id}/selecttime/', ['as' => 'dashboard.mypatients.selecttime', 'uses' => 'Admin\MypatientsController@selecttime']);
    Route::post('/mypatients/{id}/storetime/', ['as' => 'dashboard.mypatients.storetime', 'uses' => 'Admin\MypatientsController@storetime']);
    Route::post('/mypatients/saverecomendations/', ['as' => 'dashboard.mypatients.saverecomendations', 'uses' => 'Admin\MypatientsController@saverecomendations']);
    Route::get('/mypatients/{id}/storetime/', ['as' => 'dashboard.mypatients.storetime', 'uses' => 'Admin\MypatientsController@storetime']);
    Route::get('/mypatients/{id}/printtime/', ['as' => 'dashboard.mypatients.printtime', 'uses' => 'Admin\MypatientsController@printtime']);
    Route::get('/fordog/indexdata/', ['as' => 'dashboard.fordog.indexdata', 'uses' => 'Admin\FordogController@indexdata']);
    Route::get('/fordog/print/', ['as' => 'dashboard.fordog.print', 'uses' => 'Admin\FordogController@print']);

    Route::get('/refund/indexdata/', ['as' => 'dashboard.refund.indexdata', 'uses' => 'Admin\RefundController@indexdata']);
    Route::get('/refund/{id}/print/', ['as' => 'dashboard.refund.print', 'uses' => 'Admin\RefundController@print']);

    Route::get('/question/index', ['as' => 'dashboard.question.index','uses' => 'Admin\QuestionController@index']);
    Route::post('/question/store', ['as' => 'dashboard.question.store','uses' => 'Admin\QuestionController@store']);

    Route::get('/servicepension/index', ['as' => 'dashboard.servicepension.index','uses' => 'Admin\ServicepensionController@index']);
    Route::post('/servicepension/store', ['as' => 'dashboard.servicepension.store','uses' => 'Admin\ServicepensionController@store']);
    Route::get('/servicepension/edit/{id}', ['as' => 'dashboard.servicepension.edit','uses' => 'Admin\ServicepensionController@edit']);
    Route::post('/servicepension/update/{id}', ['as' => 'dashboard.servicepension.update','uses' => 'Admin\ServicepensionController@update']);
    Route::get('/servicepension/destroy/{id}', ['as' => 'dashboard.servicepension.destroy','uses' => 'Admin\ServicepensionController@destroy']);
    Route::post('/servicepension/massDelete', ['as' => 'dashboard.servicepension.massDelete','uses' => 'Admin\ServicepensionController@massDelete']);

    Route::post('/servicepension/storetype', ['as' => 'dashboard.servicepension.storetype','uses' => 'Admin\ServicepensionController@storetype']);
    Route::get('/servicepension/indextype', ['as' => 'dashboard.servicepension.indextype','uses' => 'Admin\ServicepensionController@indextype']);
    Route::get('/servicepension/edittype/{id}', ['as' => 'dashboard.servicepension.edittype','uses' => 'Admin\ServicepensionController@edittype']);
    Route::get('/servicepension/destroytype/{id}', ['as' => 'dashboard.servicepension.destroytype','uses' => 'Admin\ServicepensionController@destroytype']);
    Route::post('/servicepension/updatetype/{id}', ['as' => 'dashboard.servicepension.updatetype','uses' => 'Admin\ServicepensionController@updatetype']);
    Route::post('/servicepension/massDeletetype', ['as' => 'dashboard.servicepension.massDeletetype','uses' => 'Admin\ServicepensionController@massDeletetype']);

    Route::post('/addservices/store', ['as' => 'dashboard.addservices.store','uses' => 'Admin\AddServicesController@store']);
    Route::get('/addservices/select-typeservice/{id}', ['as' => 'dashboard.addservices.select-typeservice','uses' => 'Admin\AddServicesController@getService']);
    //тариф
    Route::post('/tariffs/store', ['as' => 'dashboard.tariffs.store','uses' => 'Admin\TariffsController@store']);
    Route::get('/tariffs/index', ['as' => 'dashboard.tariffs.index','uses' => 'Admin\TariffsController@index']);
    Route::get('/tariffs/edit/{id}', ['as' => 'dashboard.tariffs.edit','uses' => 'Admin\TariffsController@edit']);
    Route::get('/tariffs/destroy/{id}', ['as' => 'dashboard.tariffs.destroy','uses' => 'Admin\TariffsController@destroy']);
    Route::post('/tariffs/update/{id}', ['as' => 'dashboard.tariffs.update','uses' => 'Admin\TariffsController@update']);
    Route::post('/tariffs/massDelete', ['as' => 'dashboard.tariffs.massDelete','uses' => 'Admin\TariffsController@massDelete']);
    //торговая наценка
    Route::post('/tariffs-margin/store', ['as' => 'dashboard.tariffs-margin.store','uses' => 'Admin\TariffsController@storeMargin']);
    Route::get('/tariffs-margin/index', ['as' => 'dashboard.tariffs-margin.index','uses' => 'Admin\TariffsController@indexMargin']);
    Route::get('/tariffs-margin/edit/{id}', ['as' => 'dashboard.tariffs-margin.edit','uses' => 'Admin\TariffsController@editMargin']);
    Route::get('/tariffs-margin/destroy/{id}', ['as' => 'dashboard.tariffs-margin.destroy','uses' => 'Admin\TariffsController@destroyMargin']);
    Route::post('/tariffs-margin/update/{id}', ['as' => 'dashboard.tariffs-margin.update','uses' => 'Admin\TariffsController@updateMargin']);
    Route::post('/tariffs-margin/massDelete', ['as' => 'dashboard.tariffs-margin.massDelete','uses' => 'Admin\TariffsController@massDeleteMargin']);
    //ндс
    Route::post('/tariffs-nds/store', ['as' => 'dashboard.tariffs-nds.store','uses' => 'Admin\TariffsController@storends']);
    Route::get('/tariffs-nds/index', ['as' => 'dashboard.tariffs-nds.index','uses' => 'Admin\TariffsController@indexnds']);
    Route::get('/tariffs-nds/edit/{id}', ['as' => 'dashboard.tariffs-nds.edit','uses' => 'Admin\TariffsController@editnds']);
    Route::get('/tariffs-nds/destroy/{id}', ['as' => 'dashboard.tariffs-nds.destroy','uses' => 'Admin\TariffsController@destroynds']);
    Route::post('/tariffs-nds/update/{id}', ['as' => 'dashboard.tariffs-nds.update','uses' => 'Admin\TariffsController@updatends']);
    Route::post('/tariffs-nds/massDelete', ['as' => 'dashboard.tariffs-nds.massDelete','uses' => 'Admin\TariffsController@massDeletends']);
    //на зас
    Route::get('/CheckIn/index', ['as' => 'dashboard.CheckIn.index','uses' => 'Admin\CheckInControllerController@indexcheckin']);
    Route::post('/CheckIn/edit/{status}', ['as' => 'dashboard.CheckIn.edit','uses' => 'Admin\CheckInControllerController@editvheckin']);
    Route::get('/CheckIn/update/{id}', ['as' => 'dashboard.CheckIn.update','uses' => 'Admin\CheckInControllerController@updatevheckin']);
    Route::post('/CheckIn/massDelete', ['as' => 'dashboard.CheckIn.massDelete','uses' => 'Admin\CheckInControllerController@massDeletecheckin']);
    Route::post('/checkin/store', ['as' => 'dashboard.checkin.store','uses' => 'Admin\CheckInControllerController@storecheckin']);
});



Route::get('/elqueue/activequeue/', ['as' => 'dashboard.elqueue.activequeue', 'uses' => 'Admin\ElqueueController@activequeue']);
Route::post('/elqueue/registerpin/', ['as' => 'dashboard.elqueue.registerpin', 'uses' => 'Admin\ElqueueController@registerPin']);
Route::get('/elqueue/registerpin/', ['as' => 'dashboard.elqueue.registerpin', 'uses' => 'Admin\ElqueueController@registerPin']);

