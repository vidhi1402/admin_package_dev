<?php

namespace Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    protected $fillable= [ 'fk_id_service' ,'service_slug','name'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_service_image';
    protected $table = 'aii_service_images';
}
