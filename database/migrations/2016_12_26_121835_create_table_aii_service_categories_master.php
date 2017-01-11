<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAiiServiceCategoriesMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_service_categories_master')) {
            Schema::create('aii_service_categories_master', function (Blueprint $table) {
                $table->increments('id_service_category');
                $table->string('slug',50);
                $table->string('name',50);
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
        Schema::dropIfExists('aii_service_categories_master');
    }
}
