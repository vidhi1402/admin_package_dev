<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAiiProductMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_product_master')) {
            Schema::create('aii_product_master', function (Blueprint $table) {
                $table->increments('id_product');
                $table->string('slug',50);
                $table->string('name',50);
                $table->string('sort_description');
                $table->text('brief_description');
                $table->text('download_link');
                $table->text('brochure_link');
                $table->text('product_desc_url');
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
        Schema::dropIfExists('aii_product_master');
    }
}
