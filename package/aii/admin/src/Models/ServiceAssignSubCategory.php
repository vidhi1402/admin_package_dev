<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAssignSubCategory extends Model
{
    protected $fillable= [ 'fk_id_service' ,'fk_id_service_category','fk_id_sub_category'];
    protected $hidden = ['created_at','updated_at'];
    protected $primaryKey = 'id_service_assign_sub_category';
    protected $table = 'aii_service_assign_sub_category';

    public function serviceSubCategory()
    {
        return $this->hasMany('Aii\Admin\Models\ServiceSubCategory','id_service_sub_category','fk_id_sub_category');
    }
}
