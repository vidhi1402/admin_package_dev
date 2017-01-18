<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CerateTableAiiTestimonialMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_testimonial_master')) {
            Schema::create('aii_testimonial_master', function (Blueprint $table) {
                $table->increments('id_testimonial');
                $table->string('name',50);
                $table->string('designation',50);
                $table->string('organization',50);
                $table->text('review');
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
        Schema::table('aii_testimonial_master', function (Blueprint $table) {
            //
        });
    }
}
