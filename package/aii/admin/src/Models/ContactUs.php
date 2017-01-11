<?php

namespace Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable= ['name','email','contact_no','message'];
    protected $hidden = ['created_at','updated_at'];
    protected $primaryKey = 'id_contact';
    protected $table = 'aii_contact_us_master';
}
