<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $provinces = DB::table('provinces')->get();//địa bàn tỉnh
        $districts = DB::table('districts')->get();//huyện
        $wards = DB::table('wards')->get();//phường
        $soilTypes = DB::table('soil_types')->get();//loại đất
        $waterTypes = DB::table('water_types')->get();//loại nước 
        $treeTypes = DB::table('tree_types')->get();//loại cây 

        $data = [
            'provinces' => $provinces,//lấy dữ liệu từ database
            'districts' => $districts,
            'wards' => $wards,
            'soilTypes' => $soilTypes,
            'waterTypes' => $waterTypes,
            'treeTypes' => $treeTypes
        ];

        return view('home', $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
//xử lý các hành động liên quan đến trang chủ của ứng dụng, bao gồm việc lấy dữ liệu cần thiết 
//từ CSDL và thực hiện các hành động như đăng xuất người dùng.