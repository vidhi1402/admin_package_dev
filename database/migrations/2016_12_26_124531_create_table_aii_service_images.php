<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAiiServiceImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_service_images')) {
            Schema::create('aii_service_images', function (Blueprint $table) {
                $table->increments('id_service_image');
                $table->integer('fk_id_service')->unsigned();
                $table->string('service_slug',50);
                $table->string('name');
                $table->boolean('status')->default(1);
                $table->timestamps();

                $table->foreign('fk_id_service')
                    ->references('id_service')
                    ->on('aii_services_master')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('aii_service_images');
    }
}
