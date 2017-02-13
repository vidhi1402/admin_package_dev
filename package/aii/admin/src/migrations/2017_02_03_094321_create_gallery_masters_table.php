<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_gallery_masters'))
        {
            Schema::create('aii_gallery_masters', function (Blueprint $table) {
                $table->increments('id_gallery');
                $table->string('slug', 50);
                $table->string('name', 50);
                $table->text('download_link');
                $table->text('brochure_link');
                $table->string('sort_description');
                $table->text('brief_description');
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
        Schema::dropIfExists('gallery_masters');
    }
}
