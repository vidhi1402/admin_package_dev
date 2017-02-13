<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable= [ 'slug','name','status'];
    protected $hidden = ['created_at','updated_at'];
    protected $primaryKey = 'id_gallery_category';
    protected $table = 'aii_gallery_categories';

    public function GallerySubCategory()
    {
        return $this->hasMany('Aii\Admin\Models\GallerySubCategory', 'fk_id_gallery_category', 'id_gallery_category');
    }


}
