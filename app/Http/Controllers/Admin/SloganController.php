<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slogan;
use File;
class SloganController extends Controller
{
     public function index(){
    	$data = Slogan::all();
    	// dd($province);
    	return view('admin.slogan.index',compact('data'));
    }
    public function getCreate(){

    	return view('admin.slogan.create');
    }
    public function postCreate(Request $request){
        $img = $request->file('fImages');
        $path_img='upload/hinhanh';
        $img_name='';
        if(!empty($img)){
            $img_name=time().'_'.$img->getClientOriginalName();
            $img->move($path_img,$img_name);
        }
    	$slogan = new Slogan;
        $slogan->name = $request->txtName;
    	$slogan->link = $request->link;
        $slogan->photo = $img_name; 
    	$slogan->content = $request->content;
    	$slogan->save();
    	return redirect(route('admin.slogan.index'))->with('mess','Thêm thành công');
    }

    public function getEdit($id){
    	$slogan = Slogan::where('id',$id)->first();    	
    	return view('admin.slogan.edit', compact('slogan'));
    }
    public function postEdit(Request $request, $id){
    	$slogan = Slogan::where('id',$id)->first();
        $img = $request->file('fImages');
        $img_current = 'upload/hinhanh/'.$request->img_current;
        if(!empty($img)){
            $path_img='upload/hinhanh';
            $img_name=time().'_'.$img->getClientOriginalName();
            $img->move($path_img,$img_name);
            $slogan->photo = $img_name;
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }
    	$slogan->name = $request->txtName;
        $slogan->link = $request->link;
    	$slogan->content = $request->content;
    	$slogan->save();
    	return redirect(route('admin.slogan.index'));
    }

    public function delete($id){
    	$data = Slogan::find($id);
    	$data->delete();
    	return redirect(route('admin.slogan.index'))->with('mess','Xóa thành công');
    }
}
