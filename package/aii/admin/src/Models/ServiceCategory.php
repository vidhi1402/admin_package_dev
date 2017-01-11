<?php

namespace Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable= [ 'slug' ,'name'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_service_category';
    protected $table = 'aii_service_categories_master';

    public function serviceSubCategory()
    {
        return $this->hasMany('Aii\Admin\Models\ServiceSubCategory','fk_id_service_category','id_service_category');
    }
}
