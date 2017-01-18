<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAssignCategory extends Model
{
    protected $fillable= [ 'fk_id_product' ,'fk_id_product_category'];
    protected $hidden = ['created_at','updated_at'];
    protected $primaryKey = 'id_product_assign_category';
    protected $table = 'aii_product_assign_category';

    public function productCategory()
    {
        return $this->hasMany('Aii\Admin\Models\ProductCategory','id_product_category','fk_id_product_category');
    }
}
