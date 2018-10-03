<?php 
namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request as Requests;
use DB,Cache,Mail, Request;
class ContactController extends Controller {
	protected $setting = NULL;

	public function __construct()
	{
		
    	$setting = DB::table('setting')->select()->where('id',1)->get()->first();
        Cache::forever('setting', $setting);
	}

	public function getContact()
    {
        // Cấu hình SEO
		$title = "Liên hệ";
		$keyword = "Liên hệ";
		$description = "Liên hệ";
		$img_share = '';
		$com='lien-he';
		
		// $chinhanh = DB::table('lienket')->select()->where('status',1)->where('com','chi-nhanh')->orderBy('stt','asc')->get();
		// End cấu hình SEO
        return view('templates.contact_tpl', compact('banner_danhmuc','lien-he','keyword','description','title','com'));
    }

    /**
     * post contact action
     * @param  Request $request
     * @return redirect
     */
    public function postContact(Requests $request)
	{
		$data = new Contact();
		$data->name = $request->name;
		$data->phone = $request->phone;
		$data->address = $request->address;
		$data->email = $request->email;
		$data->content = $request->content;
		$value = [
                'hoten' => Request::input('name'),
                'dienthoai' => Request::input('phone'),
                'email' => Request::input('email'),                
                'noidung' => Request::input('content')
            ];
            Mail::send('templates.sendmail', $value, function ($msg) {
                $setting = Cache::get('setting');
                $msg->from(Request::input('email'),  $setting->name);
                $msg->to($setting->email, 'Admin')->subject('Ity.vn thông báo');
                // $msg->to(Request::input('email'), Request::input('full_name'))->subject('Đơn đặt hàng');
            });

		$data->save();		
		echo "<script type='text/javascript'>
			alert('Cảm ơn bạn đã gửi liên hệ. Chúng tôi sẽ liên hệ lại với bạn sớm nhất !');
			window.location = '".url('/')."' </script>";
	}

}
