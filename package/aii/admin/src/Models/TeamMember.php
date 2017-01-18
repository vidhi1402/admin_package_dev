<?php

namespace Aii\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable= ['name','position', 'facebook_url' ,'twitter_url','google_plus_url','linked_in_url','website',
        'description','picture','display_index'];
    protected $hidden = ['created_at','updated_at','status'];
    protected $primaryKey = 'id_member';
    protected $table = 'aii_team_member_master';
}
