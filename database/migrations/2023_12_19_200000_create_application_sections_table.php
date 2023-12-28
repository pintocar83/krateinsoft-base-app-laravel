<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\ApplicationSection;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_sections', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->tinyInteger("order")->default(999);
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });

        ApplicationSection::create([
            'id' => 1,
            'name' => "MANAGEMENT",
            'order' => 1,
        ]);

        ApplicationSection::create([
            'id' => 2,
            'name' => "APPS",
            'order' => 2,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_sections');
    }
};
