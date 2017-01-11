<?php

namespace Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable= [ 'name' ,'slug','sort_description','brief_description','download_link','brochure_link','product_desc_url'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_product';
    protected $table = 'aii_products_master';

    public function category()
    {
        return $this->hasMany('Aii\Admin\Models\ProductAssignCategory','fk_id_product','id_product');
    }

    public function subCategory()
    {
        return $this->hasMany('Aii\Admin\Models\ProductAssignSubCategory','fk_id_product','id_product');
    }
}
