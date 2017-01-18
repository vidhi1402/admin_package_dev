<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    protected $fillable= ['fk_id_product_category', 'slug' ,'name'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_product_sub_category';
    protected $table = 'aii_product_sub_category';

    public function productCategory()
    {
        return $this->hasMany('Aii\Admin\Models\ProductCategory','id_product_category','fk_id_product_category');
    }

     public function productCat()
     {
         return $this->hasMany('Aii\Admin\Models\ProductCategory', 'id_product_category', 'fk_id_product_category');
     }
}
