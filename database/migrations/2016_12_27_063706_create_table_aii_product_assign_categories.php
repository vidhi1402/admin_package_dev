<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAiiProductAssignCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_product_assign_categories')) {
            Schema::create('aii_product_assign_categories', function (Blueprint $table) {
                $table->increments('id_product_assign_category');
                $table->integer('fk_id_product')->unsigned();
                $table->integer('fk_id_product_category')->unsigned();
                $table->timestamps();

                $table->foreign('fk_id_product')
                    ->references('id_product')
                    ->on('aii_products_master')
                    ->onDelete('cascade');

                $table->foreign('fk_id_product_category')
                    ->references('id_product_category')
                    ->on('aii_product_categories_master')
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
        Schema::dropIfExists('aii_product_assign_categories');
    }
}
