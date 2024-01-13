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
        Schema::create('workgroup_main_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('code',10);
            $table->string('name',100);
            $table->string('description',200)->nullable();
            $table->string("image",100)->default("")->nullable();
            $table->string('connection_type',20)->nullable();
            $table->string('ip_address',20)->nullable();
            $table->json('command_status')->nullable();
            $table->text('address_country')->nullable();
            $table->text('address_state')->nullable();
            $table->text('address_city')->nullable();
            $table->text('address_line1')->nullable();
            $table->text('address_line2')->nullable();
            $table->tinyInteger('main')->default('0');
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger("order")->default(999);
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workgroup_main_boxes');
    }
};
