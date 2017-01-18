<?php

namespace Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable= ['name','designation', 'review','organization' ,'picture','display_index'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_testimonial';
    protected $table = 'aii_testimonial_master';
}
