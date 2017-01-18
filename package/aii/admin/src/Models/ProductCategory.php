<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable= [ 'slug' ,'name'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_product_category';
    protected $table = 'aii_product_category_master';

    public function productSubCategory()
    {
        return $this->hasMany('Aii\Admin\Models\ProductSubCategory', 'fk_id_product_category', 'id_product_category');
    }
}
