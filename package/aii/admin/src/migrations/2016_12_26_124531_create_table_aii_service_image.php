<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAiiServiceImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_service_image')) {
            Schema::create('aii_service_image', function (Blueprint $table) {
                $table->increments('id_service_image');
                $table->integer('fk_id_service')->unsigned();
                $table->string('service_slug',50);
                $table->string('name');
                $table->boolean('status')->default(1);
                $table->timestamps();

                $table->foreign('fk_id_service')
                    ->references('id_service')
                    ->on('aii_service_master')
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
        Schema::dropIfExists('aii_service_image');
    }
}
