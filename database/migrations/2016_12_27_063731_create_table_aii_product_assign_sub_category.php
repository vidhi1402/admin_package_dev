<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAiiProductAssignSubCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_product_assign_sub_category')) {
            Schema::create('aii_product_assign_sub_category', function (Blueprint $table) {
                $table->increments('id_product_assign_sub_category');
                $table->integer('fk_id_product')->unsigned();
                $table->integer('fk_id_product_category')->unsigned();
                $table->integer('fk_id_sub_category')->unsigned();
                $table->timestamps();

                $table->foreign('fk_id_product')
                    ->references('id_product')
                    ->on('aii_product_master')
                    ->onDelete('cascade');

                 $table->foreign('fk_id_product_category')
                     ->references('id_product_category')
                     ->on('aii_product_category_master')
                     ->onDelete('cascade');

                $table->foreign('fk_id_sub_category')
                    ->references('id_product_sub_category')
                    ->on('aii_product_sub_category')
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
        Schema::dropIfExists('aii_product_assign_sub_category');
    }
}
