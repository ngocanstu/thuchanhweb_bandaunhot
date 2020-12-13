<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;

class ThanhtoanController extends Controller
{
    public function dangnhapThanhToan(){
        $loainhot = DB::table('loainhot')->get();
        

        $sanpham= DB::table('sanpham')->get();
    
        return view('khachhang.dangnhap')->with('loainhot', $loainhot)->with('sanpham',$sanpham);
    }

    public function themKH(Request $request){
        $data=array();

        $data['TenKH']= $request ->ten_khach_hang;
        $data['EmailKH']= $request ->email_khach_hang;
        $data['MatKhauKH']= $request ->mat_khau_khach_hang;

        $mathemKH = DB::table('tb_khachhang')->insertGetId($data);

        Session::put('MaKH', $mathemKH);
        Session::put('TenKH', $request ->ten_khach_hang);
        return Redirect('/');
    }
    public function thanhtoan(){
        $loainhot = DB::table('loainhot')->get();
        return view('khachhang.thongtindathang')->with('loainhot', $loainhot);
    }
    public function luuThongTinDatHang(Request $request){
        $data=array();

        $data['SoDTDH']= $request ->ten_KH;
        $data['TenKH']= $request ->so_dt;
        $data['DiaChiDH']= $request ->dia_chi_DH;

        $MaDonDH = DB::table('tb_dondathang')->insertGetId($data);

        Session::put('MaDonDH', $MaDonDH);
      
        return Redirect('/giao-dien-xac-nhan-thong-tin-dat-hang');
    }
    
    public function dangxuat(){
        Session::put('MaKH',null);
        return Redirect('dang-nhap-thanh-toan');
    }
    public function dangnhap(Request $request){
        $email=$request ->email_dang_nhap;
        $pass= $request ->pass_dang_nhap;
        $result = DB::table('tb_khachhang')->where('EmailKH', $email)->where('MatKhauKH', $pass)->first();
        
        if($result){
            Session::put('MaKH', $result->MaKH);
            Session::put('thongbao','ĐĂNG NHẬP THÀNH CÔNG' );
            return Redirect('/trang-chu');
            
        }else{
            return Redirect('/dang-nhap-thanh-toan');
        }
        
       
    }
    public function giaodienxacnhanThanhToan(){
        $loainhot = DB::table('loainhot')->get();
        

        $sanpham= DB::table('sanpham')->get();
        $content= Cart::content();
        echo $content;  
        return view('khachhang.xacnhanthanhtoan')->with('loainhot', $loainhot)->with('sanpham',$sanpham);
    }
    public function xacnhanThanhToan(Request $request){
        $data=array();
        $data['HinhThucThanhToan']= $request->chonhttt;
        $data['TrangThaiDonDat']="Chờ xử lý";

        $MaHTTT = DB::table('tb_hinhthucthanhtoan')->insertGetId($data);
// order
        $oderdata=array();
        $oderdata['MaKhachDat']= Session::get('MaKH');
        $oderdata['MaDonDatHang']= Session::get('MaDonDH');
        $oderdata['MaHinhThucThanhToan']= $MaHTTT;
        $oderdata['TongTien']= Cart::subtotal();
        $oderdata['TrangThai']= "Chờ xử lý";

        $MaOrder = DB::table('tb_order')->insertGetId($oderdata);

// chi tiết
        $content = Cart::content();
        foreach($content as $value)
        $oder_ct_data=array();
        $oder_ct_data['MaspMua']= $MaOrder;
        $oder_ct_data['TenspMua']= $value->name;
        $oder_ct_data['GiaspMua']= $value->price;
        $oder_ct_data['SoLuongMua']= $value->qty;
        DB::table('tb_chitietdondathang')->insertGetId($oder_ct_data);



        $loainhot = DB::table('loainhot')->get();
        

        $sanpham= DB::table('sanpham')->get();
        Cart::destroy();
        return view('khachhang.xacnhanthanhtoan')->with('loainhot', $loainhot)->with('sanpham',$sanpham);

      
    }
}
