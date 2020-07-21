<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use File;
use DB;
use Hash;
use App\Tukangcukur;
use App\Users;
use App\Customer;
use App\Transaksi;
use App\Rambut;
use App\Harga;

class ApiController extends Controller
{
    // TUKANGCUKUR
    public function updatetukang(Request $request){
        $photo = $request->file('photo');
        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images'), $new_name);
        $form_data = array(
            "password"=>$request->email,
            "uid"=>$request->uid,
            "photo"=>$request->$new_name,
            "pushtoken"=>$request->pushtoken,
        );
        DB::table('tukangcukur')->where('email',$request->email)->update($form_data);
        return response()->json($request->all());
    }
    public function logintukang(Request $request){
        $logtukang = Tukangcukur::where('email', $request->email)->first();
        if($logtukang != null){
            return response()->json(['error' => false, "body" => $logtukang]);
        }else{
            return response()->json([
            'error' => true, "body" => "Akun Anda Belum Terdaftar di OmahDilit"
            ]);
        }
    }
    //CUSTOMER
    public function createuser(Request $request){
        $validator = Validator::make(
            $request->all(),
            array(
                "email" => "unique:customer,email"
            )
        );
        if($validator->passes())
        {
        $photo = $request->file('photo');
        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images'), $new_name);
        Customer::create([
            "name"=>$request->name,
            "addres"=>$request->addres,
            "number"=>$request->number,
            "email"=>$request->email,
            "password"=>$request->email,
            "uid"=>$request->uid,
            "photo"=>$request->$new_name,
            "pushtoken"=>$request->pushtoken,
            "status"=>"customer"
        ]);
        return response()->json($request->all());
        }else{
            return response()->json([
                'error' => true, "body" => "Email sudah terdaftar"
            ]);
        }       
    }
    public function googlecustomer(){
        $logcustomer = Customer::where('email',$request->email)->first();
        $transaksi = Transaksi::where('status','=','1')->get();
        if($logcustomer != null){
            return response()->json(['error' => false, "body" => $logcustomer,"data"=>$transaksi]);
        }else{
            return response()->json([
                'error' => true, "body" => "Email belum Terdaftar"
                ]);
        }
    }
    public function emailcustomer(Request $request){
        $emailcus = Customer::where('email', $request->email)->first();
        $transaksi = Transaksi::where('status','=','1')->get();
            if ($emailcus != null) {
                if (Hash::check($request->password, $emailcus->password)){
                    if ($emailcus->status == $request->status) {
                        return response()->json(['error' => false, "body" => $emailcus,"data"=>$transaksi]);
                    } else {
                        return response()->json([
                            'error' => true, "body" => "Anda tidak memiliki hak akses"
                        ]);
                    }
                } else {
                    return response()->json([$userr->password]);
                }
            } else {
                return response()->json([
                    'error' => true, "body" => "Email anda tidak terdaftar tidak terdaftar"
                ]);
            }
    }
    //EDITPROFILECUSTOMER
    public function editprofilecustomer(Request $request, $id){
        $editcustomer = Customer::find($id)->update($request->all());
        return response()->json(["body"=>$editprofile]);
    }
    //EDITPROFILETUKANG
    public function editprofiletukang(){
        $edittukang = Tukangcukur::find($id)->update($request->all());
        return response()->json(["body"=>$edittukang]);
    }
    //MODELRAMBUT
    public function modelrambut(){
        $modelall = Rambut::all();
        return response()->json(["body"=>$modelall]);
    }
    public function detailmodel(Request $request){
        $detailmodel = DB::table('modelrambut')->where('id',$request->id)->first();
        return response()->json(["body"=>$detailmodel]);
    }
    public function moremodel(){
        $moremodel = DB::table('modelrambut')->limit(5)->get();
        return response()->json(["body"=>$moremodel]);
    }
    //PROMO
    public function promo(){
        $count = \App\Promo::count();
        $skip = 3;
        $limit = $count - $skip; 
        $promo = \App\Berita::orderByDesc('tglawal')->skip($skip)->take($limit)->get();
        return response()->json(["body"=>$promo]);
    }
    //TRANSAKSI
    public function transaksi(Request $request){
        $tukang = Tukangcukur::where('uid',$request->uid)->select('uid')->get();
        $customer = Customer::where('uid',$request->uid)->select('uid')->get();
        $harga = Harga::where('hargapotong')->where('jarak',$request->jarak)->get();

        foreach($harga as $hrg){
            $checkout = new \App\Transaksi;
            $checkout->idtukang = $tukang;
            $checkout->idcustomer = $customer;
            $checkout->jarak = $hrg->jarak;
            $checkout->totalharga = $hrg->harga;
            $checkout->lat = $request->lat;
            $checkout->lng = $request->lng;
            $checkout->save();
        }
        return response()->json(["body"=>$checkout]);
    }
}
