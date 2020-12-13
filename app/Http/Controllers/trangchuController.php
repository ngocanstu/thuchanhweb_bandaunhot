<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\SanPham;
class trangchuController extends Controller
{
    public function index(){
        $loainhot = DB::table('loainhot')->get();
        

         $sanpham= DB::table('sanpham')->paginate(3);
        // // $sanpham =  SanPham::paginate(3);
        // $sanpham['sanpham']=SanPham::paginate(5);
        return view('hienthisanpham')->with('loainhot', $loainhot)->with('sanpham',$sanpham);
    }

   
}
