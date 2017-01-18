<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable= [ 'name' ,'slug','icon','sort_description','brief_description',];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_service';
    protected $table = 'aii_service_master';

    public function category()
    {
        return $this->hasMany('Aii\Admin\Models\ServiceAssignCategory','fk_id_service','id_service');
    }

    public function subCategory()
    {
        return $this->hasMany('Aii\Admin\Models\ServiceAssignSubCategory','fk_id_service','id_service');
    }
}
