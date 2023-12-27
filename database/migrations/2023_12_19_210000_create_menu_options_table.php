<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\MenuItem;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_item_id')->nullable();
            $table->unsignedBigInteger('menu_section_id')->nullable();
            $table->string('name',50);
            $table->string('description',500)->nullable();
            $table->string('link',500)->nullable();
            $table->string("icon",50)->nullable();
            $table->tinyInteger("order")->default(999);
            $table->string("actions",1000)->default("")->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();

            $table->foreign('menu_item_id')->references('id')->on('menu_items');
            $table->foreign('menu_section_id')->references('id')->on('menu_sections');
        });

        MenuItem::create([
            'id' => 1,
            'menu_section_id' => 1,
            'menu_item_id' => NULL,
            'name' => "Users",
            'link' => "admin/users",
            'icon' => '<i class="ki-duotone ki-people fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>',
            'order' => 1,
            'actions' => "list,view,save,edit,delete",
            'status' => 1,
        ]);

        MenuItem::create([
            'id' => 2,
            'menu_section_id' => 1,
            'menu_item_id'=> NULL,
            'name' => "Menus",
            'icon' => '<i class="ki-duotone ki-abstract-14 fs-2"><span class="path1"></span><span class="path2"></span></i>',
            'order' => 1,
            'status' => 1,
        ]);

        MenuItem::create([
            'id' => 3,
            'menu_item_id'=> 2,
            'name' => "Sections",
            'link' => 'admin/menu_sections',
            'order' => 1,
            'actions' => "list,view,save,edit,delete",
            'status' => 1,
        ]);

        MenuItem::create([
            'id' => 4,
            'menu_item_id'=> 2,
            'name' => "Items",
            'link' => 'admin/menu_items',
            'order' => 1,
            'actions' => "list,view,save,edit,delete",
            'status' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
};
