<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_gallery_imgs')) {
            Schema::create('aii_gallery_imgs', function (Blueprint $table) {
                $table->increments('id_gallery_image');
                $table->integer('fk_id_gallery')->unsigned();
                $table->string('gallery_slug', 50);
                $table->string('name');
                $table->boolean('status')->default(1);
                $table->timestamps();

                $table->foreign('fk_id_gallery')
                    ->references('id_gallery')
                    ->on('aii_gallery_masters')
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
        Schema::dropIfExists('gallery_imgs');
    }
}
