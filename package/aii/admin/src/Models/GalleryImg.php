<?php

namespace Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImg extends Model
{
    protected $fillable= [ 'fk_id_gallery' ,'gallery_slug','name'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_gallery_image';
    protected $table = 'aii_gallery_imgs';
}
