<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGallerySubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_gallery_sub_categories')) {
            Schema::create('aii_gallery_sub_categories', function (Blueprint $table) {

                $table->increments('id_gallery_sub_category');
                $table->unsignedInteger('fk_id_gallery_category');
                $table->string('slug', 50);
                $table->string('name', 50);
                $table->boolean('status')->default(1);
                $table->timestamps();

                $table->foreign('fk_id_gallery_category')
                    ->references('id_gallery')
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
        Schema::dropIfExists('aii_gallery_sub_categories');
    }
}
