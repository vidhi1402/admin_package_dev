<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAiiServiceSubCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_service_sub_category')) {
            Schema::create('aii_service_sub_category', function (Blueprint $table) {
                $table->increments('id_service_sub_category');
                $table->integer('fk_id_service_category')->unsigned();
                $table->string('slug',50);
                $table->string('name',50);
                $table->boolean('status')->default(1);
                $table->timestamps();

                $table->foreign('fk_id_service_category')
                    ->references('id_service_category')
                    ->on('aii_service_category_master')
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
        Schema::dropIfExists('aii_service_sub_category');
    }
}
