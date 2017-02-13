<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryAssignCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_gallery_assign_categories')) {
            Schema::create('aii_gallery_assign_categories', function (Blueprint $table) {
                $table->increments('id_gallery_assign_category');
                $table->integer('fk_id_gallery')->unsigned();
                $table->integer('fk_id_gallery_category')->unsigned();
                $table->timestamps();

                $table->foreign('fk_id_gallery')
                    ->references('id_gallery')
                    ->on('aii_gallery_masters')
                    ->onDelete('cascade');

                $table->foreign('fk_id_gallery_category')
                    ->references('id_gallery_category')
                    ->on('aii_gallery_categories')
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
        Schema::dropIfExists('gallery_assign_categories');
    }
}
