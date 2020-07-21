<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use File;
use DB;
class CrudController extends Controller
{
    public function promo(Request $request){
        $validator = Validator::make(
            $request->all(),
            array(
                "nama" => "unique:promo,nama"
            )
        );
        if($validator->passes())
            {
            $photo = $request->file('photo');
            $new_name = rand() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $new_name);
            $promo= new \App\Promo;
            $promo->nama = $request->nama;
            $promo->photo = $new_name;
            $promo->detail = $request->detail;
            $promo->potongan = $request->potongan;
            $promo->tglawal = $request->tglawal;
            $promo->tglakhir = $request->tglakhir;
            $promo->save();
            return redirect('/promo');
            }
            else
            {
            return redirect('/promo')->with(['danger' => 'Daftar Promo Sudah Aktif']);
            }
    }
    public function delete($id)
    {
        $photo = \App\Promo::where('id',$id)->first();
        File::delete('images/'.$photo->photo);
        \App\Promo::where('id',$id)->delete();
        return redirect()->back();
    }
    //MODELRAMBUT
    public function model(Request $request){
        $validator = Validator::make(
            $request->all(),
            array(
                "nama_model" => "unique:modelrambut,nama_model"
            )
        );
        if($validator->passes())
            {
            $photo1 = $request->file('photo1');
            $name1 = rand() . '.' . $photo1->getClientOriginalExtension();
            $photo1->move(public_path('images'), $name1);
            $photo2 = $request->file('photo2');
            $name2 = rand() . '.' . $photo1->getClientOriginalExtension();
            $photo2->move(public_path('images'), $name2);
            $photo3 = $request->file('photo3');
            $name3 = rand() . '.' . $photo1->getClientOriginalExtension();
            $photo3->move(public_path('images'), $name3);
            $model= new \App\Rambut;
            $model->nama_model = $request->nama_model;
            $model->photo1 = $name1;
            $model->photo2 = $name2;
            $model->photo3 = $name3;
            $model->kategori = $request->kategori;
            $model->jenis_model = $request->jenis_model;
            $model->detail = $request->detail;
            $model->save();
            return redirect('/modelrambut');
            }
            else
            {
            return redirect('/modelrambut')->with(['danger' => 'Daftar Model Rambut Sudah ada']);
            }
    }
    public function updatemodel(Request $request){
        $photo1 = $request->file('photo1');
        $photo2 = $request->file('photo2');
        $photo3 = $request->file('photo3');
        if($photo1 !=null){
        $name1 = rand() . '.' . $photo1->getClientOriginalExtension();
        $photo1->move(public_path('images'), $name1);
        $name2 = rand() . '.' . $photo1->getClientOriginalExtension();
        $photo2->move(public_path('images'), $name2);
        $name3 = rand() . '.' . $photo1->getClientOriginalExtension();
        $photo3->move(public_path('images'), $name3);
        $gambar =  DB::table('gallery')->where('id',$request->id)->first();
        File::delete('images/'.$gambar->nama1);
        File::delete('images/'.$gambar->nama2);
        File::delete('images/'.$gambar->nama3);
        $form_data = array(
            'nama_model' => $request->nama_model,
            'photo1' => $name1,
            'photo2' => $name2,
            'photo3' => $name3,
            'kategori' => $request->kategori,
            'jenis_model' => $request->jenis_model,
            'detail' => $request->detail
          );
          DB::table('modelrambut')->where('id',$request->id)->update($form_data);
       
          return redirect()->route('modelrambut')->with(['success' => 'Data is successfully updated']);
        }
        else{
            $form_data = array(
                'nama_model' => $request->nama_model,
                'kategori' => $request->kategori,
                'jenis_model' => $request->jenis_model,
                'detail' => $request->detail
              );
              DB::table('modelrambut')->where('id',$request->id)->update($form_data);
              return redirect()->route('modelrambut')->with(['success' => 'Data is successfully updated']);
        }
    }
    public function harga(Request $request){
        $validator = Validator::make(
            $request->all(),
            array(
                "jarak" => "unique:hargapotong,jarak"
            )
        );
        if($validator->passes())
            {
            $hrgpotong = new \App\Harga;
            $hrgpotong->jarak = $request->jarak;
            $hrgpotong->harga = $request->harga;
            $hrgpotong->save();
            return redirect('/hargapotong');
            }
            else
            {
            return redirect('/hargapotong')->with(['danger' => 'harga Potong Rambut Sudah Aktif']);
            }
    }
    public function updateharga(Request $request, $id){
        $edit = \App\Harga::find($id)->update($request->all());
        return redirect()->route('hargapotong');
    }

    //TUKANGCUKUR
    public function daftartukang(Request $request){
        $validator = Validator::make(
            $request->all(),
            array(
                "email" => "unique:tukangcukur,email"
            )
        );
        if($validator->passes())
            {
            $tukangcu = new \App\Tukangcukur;
            $tukangcu->name = $request->name;
            $tukangcu->addres = $request->addres;
            $tukangcu->number = $request->number;
            $tukangcu->email = $request->email;
            $tukangcu->status = "tukangcukur";
            $tukangcu->save();
            return redirect('/tukangcukur');
            }
            else
            {
            return redirect('/tukangcukur')->with(['danger' => 'Tukang cukur sudah terdaftar']);
            }
    }

}
