<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAssignSubCategory extends Model
{
    protected $fillable= [ 'fk_id_product' ,'fk_id_product_category','fk_id_sub_category'];
    protected $hidden = ['created_at','updated_at'];
    protected $primaryKey = 'id_product_assign_sub_category';
    protected $table = 'aii_product_assign_sub_category';

    public function productSubCategory()
    {
        return $this->hasMany('Aii\Admin\Models\ProductSubCategory','id_product_sub_category','fk_id_sub_category');
    }
}
