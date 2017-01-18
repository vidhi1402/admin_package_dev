<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CerateTableAiiTeamMemberMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_team_member_master')) {
            Schema::create('aii_team_member_master', function (Blueprint $table) {
                $table->increments('id_member');
                $table->string('name',50);
                $table->string('position',50);
                $table->text('facebook_url');
                $table->text('twitter_url');
                $table->text('google_plus_url');
                $table->text('linked_in_url');
                $table->text('website');
                $table->text('description');
                $table->text('picture');
                $table->integer('display_index');
                $table->boolean('status')->default(1);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aii_team_member_master', function (Blueprint $table) {
            //
        });
    }
}
