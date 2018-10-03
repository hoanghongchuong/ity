<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// test api zalo

Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);
Route::get('gioi-thieu',['as'=>'getAbout', 'uses'=>'IndexController@getAbout']);
Route::post('cartajax/add', ['as' => 'addProductToCartAjax', 'uses' => 'IndexController@addCartAjax']);

Route::get('lien-he',['as'=>'getContact', 'uses'=>'ContactController@getContact']);
Route::post('lien-he',['as'=>'postContact', 'uses'=>'ContactController@postContact']);

Route::get('tin-tuc',['as'=>'getNews', 'uses'=>'IndexController@getNews']);
Route::get('tin-tuc/{id}.html',['as'=>'getNewsDetail', 'uses'=>'IndexController@getNewsDetail']);
Route::get('tin-tuc/{id}',['as'=>'getListNews', 'uses'=>'IndexController@getListNews']);

Route::get('tuyen-dung',['as'=>'getNews', 'uses'=>'IndexController@getTuyenDung']);
Route::get('tuyen-dung/{id}.html',['as'=>'getNewsDetail', 'uses'=>'IndexController@getNewsTuyenDungDetail']);

Route::get('du-an', 'IndexController@duan')->name('duan');
Route::get('du-an/{alias}.html', 'IndexController@detailProject');
Route::get('du-an/{alias}', 'IndexController@listProject');


Route::get('tim-kiem',['as'=>'search', 'uses'=>'IndexController@search']);
Route::post('newsletter',['as'=>'postNewsletter', 'uses'=>'IndexController@postNewsletter']);


Route::get('ajax/province/{id}',['as'=>'loadDistrictByProvince', 'uses'=>'IndexController@loadDistrictByProvince']);
Route::get('sap-xep','IndexController@SapXep')->name('sapxep');

// dang ky, dang nhap
Route::get('signup','SignupController@signup');
Route::post('signup', 'SignupController@postSignup')->name('postSignup');
Route::get('login','LoginController@getLogin')->name('getLogin');
Route::post('login','LoginController@postLogin')->name('postLogin');
Route::get('logout','LoginController@logout');
// gio hang
Route::get('gio-hang',['as'=>'getCart', 'uses'=>'IndexController@getCart']);
Route::post('cart/add', ['as' => 'addProductToCart', 'uses' => 'IndexController@addCart']);


Route::post('cart/update',['as' => 'updateCart', 'uses' => 'IndexController@updateCart']);
// Route::get('updatecart/{id}/{qty}',['as'=>'updatecart','uses'=>'IndexController@updatecart']);
Route::get('xoa-gio-hang/{id}','IndexController@deleteCart');
Route::post('gui-don-hang', ['as' =>'postOrder', 'uses'=> 'IndexController@postOrder']);
Route::get('xoa-all','IndexController@deleteAllCart')->name('deleteCart');
Route::get('dich-vu',['as'=>'getDichvu', 'uses'=>'IndexController@getDichvu']);
Route::get('dich-vu/{id}.html',['as'=>'getDichVuDetail', 'uses'=>'IndexController@getDichVuDetail']);

Route::get('tuyen-dung','IndexController@getTuyenDung')->name('getTuyenDung');
Route::post('tuyen-dung',['as'=>'postTuyenDung', 'uses'=>'IndexController@postTuyenDung']);
// Route::get('thu-vien-anh',['as'=>'getThuvienanh', 'uses'=>'IndexController@getThuvienanh']);
// Route::get('hoi-vien',['as'=>'getHoivien', 'uses'=>'IndexController@getHoivien']);
Route::get('{id}.html',['as'=>'getProductDetail', 'uses'=>'IndexController@getProductDetail']);
Route::get('bai-viet/{id}.html',['as'=>'getBaiVietDetail', 'uses'=>'IndexController@getBaiVietDetail']);
Route::get('error/404.html',['as'=>'getErrorNotFount', 'uses'=>'IndexController@getErrorNotFount']);
// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

Route::get('backend/login',['as'=>'admin.auth.getLogin', 'uses'=>'AdminAuth\AuthController@getLogin']);
Route::post('backend/postlogin',['as'=>'admin.auth.postLogin', 'uses'=>'AdminAuth\AuthController@postLogin']);
Route::get('register',['as'=>'getRegister', 'uses'=>'AdminAuth\AuthController@getRegister']);
Route::post('postregister',['as'=>'postRegister', 'uses'=>'AdminAuth\AuthController@postRegister']);


Route::group(['middleware' =>'authen', 'prefix' => 'backend'], function(){
	Route::get('/',['as'=>'admin.index', 'uses'=>'Admin\IndexController@getIndex']);
	
	Route::get('logout', ['as' => 'admin.auth.logout', 'uses' => 'AdminAuth\AuthController@logout']);
	Route::get('setting',['as'=>'admin.setting.index','uses'=>'Admin\SettingController@index']);
	Route::post('setting/update',['as'=>'admin.setting.update','uses'=>'Admin\SettingController@update']);
	
	Route::post('contact/access',['as'=>'admin.contact.access','uses'=>'Admin\ContactController@xuly']);
	Route::post('recruitment/access',['as'=>'admin.recruitment.access','uses'=>'Admin\RecruitmentController@accessRe']);

	Route::group(['prefix' => 'users'], function(){
		Route::get('info',['as'=>'admin.users.getAdmin','uses'=>'Admin\UsersController@getAdmin']);
		Route::post('updateinfo',['as'=>'admin.users.updateinfo','uses'=>'Admin\UsersController@updateinfo']);
	});


	Route::group(['prefix' => 'orders'], function(){
		Route::get('/',['as'=>'admin.bill.index','uses'=>'Admin\BillController@getList']);
		// Route::get('add',['as'=>'admin.obill.getAdd','uses'=>'Admin\BillController@getAdd']);
		// Route::post('postAdd',['as'=>'admin.obill.postAdd','uses'=>'Admin\OBillController@postAdd']);
		
		Route::get('edit/{id}',['as'=>'admin.bill.getEdit','uses'=>'Admin\BillController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.bill.update','uses'=>'Admin\BillController@update']);

		Route::get('delete/{id}',['as'=>'admin.bill.getDelete','uses'=>'Admin\BillController@getDelete']);
		// Route::get('{id}/delete_list',['as'=>'admin.obill.getDeleteList','uses'=>'Admin\OBillController@getDeleteList']);
	});

	Route::group(['prefix' => 'newscate'], function(){
		Route::get('/',['as'=>'admin.newscate.index','uses'=>'Admin\NewsCateController@getDanhSach']);
		Route::get('add',['as'=>'admin.newscate.getAdd','uses'=>'Admin\NewsCateController@getAdd']);
		Route::post('postAdd',['as'=>'admin.newscate.postAdd','uses'=>'Admin\NewsCateController@postAdd']);

		Route::get('edit',['as'=>'admin.newscate.getEdit','uses'=>'Admin\NewsCateController@getEdit']);

		Route::post('edit',['as'=>'admin.newscate.update','uses'=>'Admin\NewsCateController@update']);

		Route::get('{id}/delete',['as'=>'admin.newscate.getDelete','uses'=>'Admin\NewsCateController@getDelete']);
		Route::get('{id}/delete_list',['as'=>'admin.newscate.getDeleteList','uses'=>'Admin\NewsCateController@getDeleteList']);
	});
	

	Route::group(['prefix'=>'position'], function(){
		Route::get('/',['as'=>'admin.position.index','uses'=>'Admin\PositionController@getList']);
		Route::get('add',['as'=>'admin.position.getAdd','uses'=>'Admin\PositionController@getAdd']);
		Route::post('add',['as'=>'admin.position.postAdd','uses'=>'Admin\PositionController@postAdd']);

		Route::get('edit/{id}',['as'=>'admin.position.getEdit','uses'=>'Admin\PositionController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.position.update','uses'=>'Admin\PositionController@update']);

		Route::get('delete/{id}',['as'=>'admin.position.getDelete','uses'=>'Admin\PositionController@getDelete']);
		
		Route::get('deleteList/{id}',['as'=>'admin.position.getDeleteList','uses'=>'Admin\PositionController@getDeleteList']);

	});

	Route::group(['prefix'=>'banner'], function(){
		Route::get('/',['as'=>'admin.banner.index','uses'=>'Admin\BannerController@getList']);
		Route::get('add',['as'=>'admin.banner.getAdd','uses'=>'Admin\BannerController@getAdd']);
		Route::post('add',['as'=>'admin.banner.postAdd','uses'=>'Admin\BannerController@postAdd']);

		Route::get('edit/{id}',['as'=>'admin.banner.getEdit','uses'=>'Admin\BannerController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.banner.update','uses'=>'Admin\BannerController@update']);

		Route::get('delete/{id}',['as'=>'admin.banner.getDelete','uses'=>'Admin\BannerController@getDelete']);
		
		Route::get('deleteList/{id}',['as'=>'admin.banner.getDeleteList','uses'=>'Admin\BannerController@getDeleteList']);

	});
	Route::group(['prefix' => 'news'], function(){
		Route::get('/',['as'=>'admin.news.index','uses'=>'Admin\NewsController@getList']);
		Route::get('add',['as'=>'admin.news.getAdd','uses'=>'Admin\NewsController@getAdd']);
		Route::post('postAdd',['as'=>'admin.news.postAdd','uses'=>'Admin\NewsController@postAdd']);


		Route::get('edit',['as'=>'admin.news.getEdit','uses'=>'Admin\NewsController@getEdit']);
		Route::post('edit',['as'=>'admin.news.update','uses'=>'Admin\NewsController@update']);

		Route::get('{id}/delete',['as'=>'admin.news.getDelete','uses'=>'Admin\NewsController@getDelete']);
		
		Route::get('{id}/deleteList',['as'=>'admin.news.getDeleteList','uses'=>'Admin\NewsController@getDeleteList']);
	});
	Route::group(['prefix'=>'feedback'], function(){
		Route::get('/',['as'=>'admin.feedback.index','uses'=>'Admin\FeedbackController@index']);
		Route::get('add',['as'=>'admin.feedback.create','uses'=>'Admin\FeedbackController@getCreate']);
		Route::post('add',['as'=>'admin.feedback.postCreate','uses'=>'Admin\FeedbackController@postCreate']);
		Route::get('edit/{id}',['as'=>'admin.feedback.edit', 'uses'=>'Admin\FeedbackController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.feedback.postEdit', 'uses'=>'Admin\FeedbackController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.feedback.delete', 'uses' => 'Admin\FeedbackController@delete']);
	});
	Route::group(['prefix' => 'about'], function(){
		Route::get('/','Admin\AboutController@getList')->name('admin.about.getList');
		Route::get('add','Admin\AboutController@getAdd')->name('admin.about.getAdd');
		Route::post('postAdd',['as'=>'admin.about.postAdd','uses'=>'Admin\AboutController@postAdd']);

		Route::get('edit',['as'=>'admin.about.getEdit','uses'=>'Admin\AboutController@getEdit']);
		Route::post('edit',['as'=>'admin.about.update','uses'=>'Admin\AboutController@update']);

		Route::get('{id}/delete',['as'=>'admin.about.getDelete','uses'=>'Admin\AboutController@getDelete']);
	});
	Route::group(['prefix' => 'gioithieu'], function(){
		Route::get('/','Admin\GioiThieuController@index')->name('admin.gioithieu.index');
		Route::get('add','Admin\GioiThieuController@getAdd')->name('admin.gioithieu.getAdd');
		Route::post('postAdd',['as'=>'admin.gioithieu.postAdd','uses'=>'Admin\GioiThieuController@postAdd']);

		Route::get('edit/{id}',['as'=>'admin.gioithieu.getEdit','uses'=>'Admin\GioiThieuController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.gioithieu.update','uses'=>'Admin\GioiThieuController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.gioithieu.getDelete','uses'=>'Admin\GioiThieuController@delete']);
	});
	Route::group(['prefix' => 'lienket'], function(){
		Route::get('/',['as'=>'admin.lienket.index','uses'=>'Admin\LienKetController@getList']);
		Route::get('add',['as'=>'admin.lienket.getAdd','uses'=>'Admin\LienKetController@getAdd']);
		Route::post('postAdd',['as'=>'admin.lienket.postAdd','uses'=>'Admin\LienKetController@postAdd']);


		Route::get('edit',['as'=>'admin.lienket.getEdit','uses'=>'Admin\LienKetController@getEdit']);
		Route::post('edit',['as'=>'admin.lienket.update','uses'=>'Admin\LienKetController@update']);

		Route::get('{id}/delete',['as'=>'admin.lienket.getDelete','uses'=>'Admin\LienKetController@getDelete']);
		
		Route::get('{id}/deleteList',['as'=>'admin.lienket.getDeleteList','uses'=>'Admin\LienKetController@getDeleteList']);
	});
	Route::group(['prefix' => 'contact'], function(){
		Route::get('/','Admin\ContactController@getContact')->name('admin.contact.index');
		Route::get('delete/{id}','Admin\ContactController@deleteContact')->name('delete.contact');
	});
	

	Route::group(['prefix' => 'newsletter'], function(){
		Route::get('/',['as'=>'admin.newsletter.index','uses'=>'Admin\NewsLetterController@getList']);
		Route::get('add',['as'=>'admin.newsletter.getAdd','uses'=>'Admin\NewsLetterController@getAdd']);
		Route::post('postAdd',['as'=>'admin.newsletter.postAdd','uses'=>'Admin\NewsLetterController@postAdd']);
		Route::post('sendmail',['as'=>'admin.newsletter.postNewsLetter','uses'=>'Admin\NewsLetterController@postNewsLetter']);


		Route::get('edit',['as'=>'admin.newsletter.getEdit','uses'=>'Admin\NewsLetterController@getEdit']);
		Route::post('edit',['as'=>'admin.newsletter.update','uses'=>'Admin\NewsLetterController@update']);

		Route::get('{id}/delete',['as'=>'admin.newsletter.getDelete','uses'=>'Admin\NewsLetterController@getDelete']);
		
		Route::get('{id}/deleteList',['as'=>'admin.newsletter.getDeleteList','uses'=>'Admin\NewsLetterController@getDeleteList']);
	});
	Route::group(['prefix' => 'slider'], function(){
		Route::get('/',['as'=>'admin.slider.index','uses'=>'Admin\SliderController@getList']);
		Route::get('add',['as'=>'admin.slider.getAdd','uses'=>'Admin\SliderController@getAdd']);
		Route::post('postAdd',['as'=>'admin.slider.postAdd','uses'=>'Admin\SliderController@postAdd']);


		Route::get('edit',['as'=>'admin.slider.getEdit','uses'=>'Admin\SliderController@getEdit']);
		Route::post('edit',['as'=>'admin.slider.update','uses'=>'Admin\SliderController@update']);

		Route::get('{id}/delete',['as'=>'admin.slider.getDelete','uses'=>'Admin\SliderController@getDelete']);
		
		Route::get('{id}/deleteList',['as'=>'admin.slider.getDeleteList','uses'=>'Admin\SliderController@getDeleteList']);
	});

	Route::group(['prefix' => 'province'], function(){
		Route::get('/',['as'=>'admin.province.index', 'uses' => 'Admin\ProvinceController@index']);
		Route::get('add',['as'=>'admin.province.getCreate', 'uses' => 'Admin\ProvinceController@getCreate']);
		Route::post('add',['as'=>'admin.province.postCreate', 'uses' => 'Admin\ProvinceController@postCreate']);

		Route::get('edit/{id}',['as'=>'admin.province.getEdit', 'uses' => 'Admin\ProvinceController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.province.postEdit', 'uses' => 'Admin\ProvinceController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.province.delete', 'uses' => 'Admin\ProvinceController@delete']);
	});

	Route::group(['prefix' => 'district'], function(){
		Route::get('/',['as'=>'admin.district.index', 'uses' => 'Admin\DistrictController@index']);
		Route::get('add',['as'=>'admin.district.getCreate', 'uses' => 'Admin\DistrictController@getCreate']);
		Route::post('add',['as'=>'admin.district.postCreate', 'uses' => 'Admin\DistrictController@postCreate']);

		Route::get('edit/{id}',['as'=>'admin.district.getEdit', 'uses' => 'Admin\DistrictController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.district.postEdit', 'uses' => 'Admin\DistrictController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.district.delete', 'uses' => 'Admin\DistrictController@delete']);
	});

	Route::group(['prefix'=>'chinhanh'], function(){
		Route::get('/',['as'=>'admin.chinhanh.index','uses'=>'Admin\ChiNhanhController@index']);
		Route::get('create',['as'=>'admin.chinhanh.create','uses'=>'Admin\ChiNhanhController@getCreate']);
		Route::post('create',['as'=>'admin.chinhanh.postCreate','uses'=>'Admin\ChiNhanhController@postCreate']);
		Route::get('edit/{id}',['as'=>'admin.chinhanh.edit', 'uses'=>'Admin\ChiNhanhController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.chinhanh.postEdit', 'uses'=>'Admin\ChiNhanhController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.chinhanh.delete', 'uses' => 'Admin\ChiNhanhController@delete']);
	});

	Route::group(['prefix'=>'bankaccount'], function(){
		Route::get('/',['as'=>'admin.bank.index', 'uses'=>'Admin\BankAccountController@index']);

		Route::get('create',['as'=>'admin.bank.getCreate', 'uses'=>'Admin\BankAccountController@getCreate']);
		Route::post('create',['as'=>'admin.bank.postCreate', 'uses'=>'Admin\BankAccountController@postCreate']);

		Route::get('edit/{id}',['as'=>'admin.bank.getEdit', 'uses'=>'Admin\BankAccountController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.bank.postEdit', 'uses'=>'Admin\BankAccountController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.bank.delete','uses'=>'Admin\BankAccountController@delete']);
	});
	
	Route::group(['prefix'=>'partner'], function(){
		Route::get('/',['as'=>'admin.partner.index','uses'=>'Admin\PartnerController@getList']);
		Route::get('add',['as'=>'admin.partner.getAdd','uses'=>'Admin\PartnerController@getAdd']);
		Route::post('add',['as'=>'admin.partner.postAdd','uses'=>'Admin\PartnerController@postAdd']);

		Route::get('edit/{id}',['as'=>'admin.partner.getEdit','uses'=>'Admin\PartnerController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.partner.update','uses'=>'Admin\PartnerController@update']);

		Route::get('delete/{id}',['as'=>'admin.partner.getDelete','uses'=>'Admin\PartnerController@getDelete']);
		
		// Route::get('deleteList/{id}',['as'=>'admin.partner.getDeleteList','uses'=>'Admin\PartnerController@getDeleteList']);

	});
	Route::group(['prefix'=>'slogan'], function(){
		Route::get('/',['as'=>'admin.slogan.index','uses'=>'Admin\SloganController@index']);
		Route::get('create',['as'=>'admin.slogan.create','uses'=>'Admin\SloganController@getCreate']);
		Route::post('create',['as'=>'admin.slogan.postCreate','uses'=>'Admin\SloganController@postCreate']);
		Route::get('edit/{id}',['as'=>'admin.slogan.edit', 'uses'=>'Admin\SloganController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.slogan.postEdit', 'uses'=>'Admin\SloganController@postEdit']);
		Route::get('delete/{id}',['as'=>'admin.slogan.delete', 'uses' => 'Admin\SloganController@delete']);
	});
	
});