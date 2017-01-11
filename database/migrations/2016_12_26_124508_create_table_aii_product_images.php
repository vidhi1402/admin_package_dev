<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAiiProductImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_product_images')) {
            Schema::create('aii_product_images', function (Blueprint $table) {
                $table->increments('id_product_image');
                $table->integer('fk_id_product')->unsigned();
                $table->string('product_slug',50);
                $table->string('name');
                $table->boolean('status')->default(1);
                $table->timestamps();

                $table->foreign('fk_id_product')
                    ->references('id_product')
                    ->on('aii_products_master')
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
        Schema::dropIfExists('aii_product_images');
    }
}
