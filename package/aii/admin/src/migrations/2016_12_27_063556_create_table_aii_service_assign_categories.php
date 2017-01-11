<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAiiServiceAssignCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_service_assign_categories')) {
            Schema::create('aii_service_assign_categories', function (Blueprint $table) {
                $table->increments('id_service_assign_category');
                $table->integer('fk_id_service')->unsigned();
                $table->integer('fk_id_service_category')->unsigned();
                $table->timestamps();

                $table->foreign('fk_id_service')
                    ->references('id_service')
                    ->on('aii_services_master')
                    ->onDelete('cascade');

                $table->foreign('fk_id_service_category')
                    ->references('id_service_category')
                    ->on('aii_service_categories_master')
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
        Schema::dropIfExists('aii_service_assign_categories');
    }
}
