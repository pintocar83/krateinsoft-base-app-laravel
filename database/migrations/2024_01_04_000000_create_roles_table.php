<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->string('id',15)->primary();
            $table->string('name',50);
            $table->tinyInteger('order')->default('0');
            $table->tinyInteger('status')->default('1');
        });

        Role::create([
            'id' => 'root',
            'name' => "Super User",
            'order' => 1,
        ]);

        Role::create([
            'id' => 'admin',
            'name' => "Administrator",
            'order' => 2,
        ]);

        Role::create([
            'id' => 'developer',
            'name' => "Developer",
            'order' => 3,
        ]);

        Role::create([
            'id' => 'standard',
            'name' => "Standard User",
            'order' => 4,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
