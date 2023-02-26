<?php

namespace App\Http\Controllers;

use session;
use App\Models\block;
use App\Models\resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\addresidentrequest;
use App\Http\Requests\editresidentrequest;
use Illuminate\Support\Facades\Session as FacadesSession;

class residentController extends Controller
{

    public function index(Request $request){

        $keyword = $request -> keyword;

        $data = resident::with(['block'])-> where('name', 'LIKE' , '%'.$keyword.'%')
                                         -> orWhere('house_number','LIKE' ,'%'.$keyword.'%')
                                         -> orWhere('phone_number' , 'LIKE' , '%'.$keyword.'%') -> paginate(20);



        return view('residents' , ['data_warga' => $data] );

    }


    public function addResident(addresidentrequest $request){
        // assignment
        //resident::create($request -> all());

        //internal validation
        $validated = $request->validate([
        'phone_number' =>'required|unique:residents',
        'house_number' =>'required|max:3',
        'name' =>'required|unique:residents',
        'block_id' =>'required']);


        $imgname = "";
        if($request -> file('photo')){
        $ext = $request-> file('photo') -> getClientOriginalExtension();
        $ext = $request -> file('photo') -> getClientOriginalExtension();
        $imgname = $request -> name.'-'.now()->timestamp.'.'.$ext;
        $request -> file('photo') -> storeAs('img', $imgname);
    }
        $resident = new resident;

        $resident['name'] = $request -> name;
        $resident['house_number'] = $request -> house_number;
        $resident['phone_number'] = $request -> phone_number;
        $resident['image'] = $imgname;
        $resident['block_id'] = $request -> block_id;
        $status = $resident -> save();

        if ($status) {
            FacadesSession::flash('status-add','oke');
            FacadesSession::flash('message-add','berhasil menambahkan data!');
        }

        return redirect('/edit-resident');

    }



    public function editResident(Request $request){
        $keyword = $request -> keyword;

        $data = resident::with(['block']) -> where('name', 'LIKE' , '%'.$keyword.'%')
                                          -> orWhereHas('block', function($query) use($keyword) {
                                            $query -> where('block_name', 'LIKE' , '%'.$keyword.'%' );
                                          })
                                          -> orWhere('house_number','LIKE' ,'%'.$keyword.'%')
                                          -> orWhere('phone_number' , 'LIKE' , '%'.$keyword.'%') -> paginate(20);
        return view('edit-resident' , ['data_warga' => $data] );

    }



    public function editForm($id){

       $data = resident::with(['block']) -> findOrFail($id);
       return view('edit-form', ['data' => $data]);
    }



    public function editResidentProcess(editresidentrequest $request, $id){
    // assignment
    //resident::create($request -> all());

    $resident = resident::findOrFail($id);
    $imgname = $resident['image'];
        if($request -> file('photo')){
            $ext = $request-> file('photo') -> getClientOriginalExtension();
            $ext = $request -> file('photo') -> getClientOriginalExtension();
            $imgname = $request -> name.'-'.now()->timestamp.'.'.$ext;
            $request -> file('photo') -> storeAs('img', $imgname);
        }
    $resident['name'] = $request -> name;
    $resident['house_number'] = $request -> house_number;
    $resident['phone_number'] = $request -> phone_number;
    $resident['image'] = $imgname;
    $resident['block_id'] = $request -> block_id;
    $status = $resident -> save();

    if ($status) {
        FacadesSession::flash('status-edit','oke');
        FacadesSession::flash('message-edit','berhasil teredit!');
    }

    return redirect('/edit-resident');

    }

    public function residentDelete($id){
        $resident = DB::table('residents') -> where('id', $id) -> delete();
        if ($resident) {
            FacadesSession::flash('status-delete','oke');
            FacadesSession::flash('message-delete','berhasil menghapus data!');
        }
        return redirect('/edit-resident');

    }

}


