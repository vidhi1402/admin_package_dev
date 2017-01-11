<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAiiContactUsMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('aii_contact_us_master')) {
            Schema::create('aii_contact_us_master', function (Blueprint $table) {
                $table->increments('id_contact');
                $table->string('name',50);
                $table->string('email',50);
                $table->bigInteger('contact_no');
                $table->text('message');
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
        Schema::dropIfExists('aii_contact_us_master');
    }
}
