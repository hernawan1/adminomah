<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $user = User::all();
        return view('menu.home',['user'=>$user]);
    }
    public function tukangcukur(){
        $tbtukang = \App\Tukangcukur::all();
        return view('menu.tukangcukur',['data_tukang'=>$tbtukang]);
    }
    public function promo(){
        $tbpromo = \App\Promo::all();
        return view('menu.promo',['data_promo'=>$tbpromo]);
    }
    public function modelrambut(){
        $tbmodel = \App\Rambut::all();
        return view('menu.modelrambut',['data_model'=>$tbmodel]);
    }
    public function hargapotong(){
        $tbharga = \App\Harga::all();
        return view('menu.hargapotong',['data_harga'=>$tbharga]);
    }
    public function customer(){
        return view('menu.customer');
    }
}
