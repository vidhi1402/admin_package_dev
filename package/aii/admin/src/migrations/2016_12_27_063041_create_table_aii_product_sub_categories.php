<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAiiProductSubCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_product_sub_categories')) {
            Schema::create('aii_product_sub_categories', function (Blueprint $table) {
                $table->increments('id_product_sub_category');
                $table->unsignedInteger('fk_id_product_category');
                $table->string('slug',50);
                $table->string('name',50);
                $table->boolean('status')->default(1);
                $table->timestamps();

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
        Schema::dropIfExists('aii_product_sub_categories');
    }
}
