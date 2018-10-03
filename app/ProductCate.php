<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCate extends Model {

	protected $table='product_categories';

	protected $fillable = ['id','name','alias','photo','parent_id','stt','level','status','title','keyword','description'];

	public $timestamps = true;
	public function getProductsAttribute()
    {
    	$categoryIdArray = $this->getChildCategories([$this->id]);
        return \App\Products::whereIn('cate_id', $categoryIdArray)->paginate(8);
    }


    protected function getChildCategories($categoryArray = [])
    {
    	$childIdArray = ProductCate::select('id')->whereIn('parent_id', $categoryArray)->whereNotIn('id', $categoryArray)->get()->pluck('id')->toArray();
    	if (!count($childIdArray)) {
    		return $categoryArray;
    	}
    	$categoryArray = array_merge($categoryArray, $childIdArray);
    	return $this->getChildCategories($categoryArray);
    }

}
