<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class GallerySubCategory extends Model
{
    protected $fillable= ['fk_id_gallery_category', 'slug' ,'name'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_gallery_sub_category';
    protected $table = 'aii_gallery_sub_categories';

    public function GalleryCategory()
    {
        return $this->hasMany('Aii\Admin\Models\GalleryCategory','id_gallery_category','fk_id_gallery_category');
    }
}
