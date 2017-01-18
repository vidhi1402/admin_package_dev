<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable= [ 'fk_id_product' ,'product_slug','name'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_product_image';
    protected $table = 'aii_product_image';
}
