<?php

namespace  Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryMaster extends Model
{
    protected $fillable= [ 'name' ,'slug','sort_description','brief_description',
                            'download_link','brochure_link'];

    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_gallery';
    protected $table = 'aii_gallery_masters';

    public function GalleryCategory()
    {
        return $this->hasMany('Aii\Admin\Models\GalleryAssignCategory','fk_id_gallery','id_gallery');
    }
    public function GalleryImage()
    {
        return $this->hasone('Aii\Admin\Models\GalleryImg','fk_id_gallery','id_gallery');
    }
}
