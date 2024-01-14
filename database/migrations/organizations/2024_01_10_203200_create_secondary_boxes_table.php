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
        Schema::create('secondary_boxes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workgroup_main_box_id');
            $table->string('code',10);
            $table->string('name',100);
            $table->string('description',200)->nullable();
            $table->string('ip_address',20)->nullable();
            $table->json('command_status')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger("order")->default(999);
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();

            $table->foreign('workgroup_main_box_id')->references('id')->on('workgroup_main_boxes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secondary_boxes');
    }
};
