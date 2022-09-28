<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("category_id");
            $table->string("title");
            $table->longText("description");
            $table->string("image");
            $table->string("tag")->nullable();
            $table->tinyInteger("status")->nullable();
            $table->integer("total_seat")->nullable();
            $table->integer("available_seat")->nullable();
            $table->integer("remain_seat")->nullable();
            $table->tinyInteger("sold")->nullable()->default(0);
            $table->string("slug")->nullable();
            $table->dateTime("start_date");
            $table->dateTime("end_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};