<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChiNhanh;
class ChiNhanhController extends Controller
{
    public function index(){
    	$chinhanh = ChiNhanh::all();
    	return view('admin.chinhanh.index', compact('chinhanh'));	
    }
    public function getCreate(){

    	return view('admin.chinhanh.create');
    }

    public function postCreate(Request $request){
    	$chinhanh = new ChiNhanh;
    	$chinhanh->name = $request->txtName;
    	$chinhanh->phone = $request->txtPhone;
        $chinhanh->website = $request->website;
    	$chinhanh->address = $request->txtAddress;
    	$chinhanh->save();
    	return redirect(route('admin.chinhanh.index'))->with('status','Thêm mới thành công !');
    }
    public function getEdit($id){
    	$chinhanh = ChiNhanh::where('id',$id)->first();
    	// dd($chinhanh);
    	return view('admin.chinhanh.edit',compact('chinhanh'));
    }

    public function postEdit(Request $request, $id){
    	$chinhanh = ChiNhanh::where('id',$id)->first();
    	$chinhanh->name = $request->txtName;
    	$chinhanh->phone = $request->txtPhone;
        $chinhanh->website = $request->website;
    	$chinhanh->address = $request->txtAddress;
    	$chinhanh->save();
    	return redirect(route('admin.chinhanh.index'))->with('status','Sửa thành công !');
    }
    public function delete($id){
    	$data = ChiNhanh::find($id);
    	$data->delete();
    	return redirect()->back()->with('status','Xóa thành công !');
    }
}
