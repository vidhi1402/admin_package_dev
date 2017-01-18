<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAiiServiceMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_service_master')) {
            Schema::create('aii_service_master', function (Blueprint $table) {
                $table->increments('id_service');
                $table->string('slug',50);
                $table->string('name',50);
                $table->string('sort_description');
                $table->text('brief_description');
                $table->string('icon',50);
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
        Schema::dropIfExists('aii_service_master');
    }
}
