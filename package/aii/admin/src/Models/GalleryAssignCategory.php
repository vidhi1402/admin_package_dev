<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryAssignCategory extends Model
{
    protected $fillable= [ 'fk_id_gallery' ,'fk_id_gallery_category'];
    protected $hidden = ['created_at','updated_at'];
    protected $primaryKey = 'id_gallery_assign_category';
    protected $table = 'aii_gallery_assign_categories';


}
