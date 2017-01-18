<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceAssignCategory extends Model
{
    protected $fillable= [ 'fk_id_service' ,'fk_id_service_category'];
    protected $hidden = ['created_at','updated_at'];
    protected $primaryKey = 'id_service_assign_category';
    protected $table = 'aii_service_assign_category';

    public function serviceCategory()
    {
        return $this->hasMany('Aii\Admin\Models\ServiceCategory','id_service_category','fk_id_service_category');
    }
}
