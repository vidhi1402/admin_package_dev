<?php

namespace Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{
    protected $fillable= ['fk_id_service_category', 'slug' ,'name'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_service_sub_category';
    protected $table = 'aii_service_sub_categories';

    public function serviceCategory()
    {
        return $this->hasMany('Aii\Admin\Models\ServiceCategory','id_service_category','fk_id_service_category');
    }

    public function serviceCat()
    {
        return $this->hasMany('Aii\Admin\Models\ServiceCategory','id_service_category','fk_id_service_category');
    }
}
