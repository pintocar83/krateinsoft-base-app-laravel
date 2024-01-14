<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\ApplicationItem;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('application_item_id')->nullable();
            $table->unsignedBigInteger('application_section_id')->nullable();
            $table->string('name',50);
            $table->string('description',500)->nullable();
            $table->string('link',500)->nullable();
            $table->string("icon",50)->nullable();
            $table->json("inside")->nullable();
            $table->tinyInteger("order")->default(999);
            $table->json("actions")->default("")->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();

            $table->foreign('application_item_id')->references('id')->on('application_items');
            $table->foreign('application_section_id')->references('id')->on('application_sections');
        });

        ApplicationItem::create([
            'id' => 1,
            'application_section_id' => 1,
            'application_item_id' => NULL,
            'name' => "Users",
            'link' => "admin/users",
            'icon' => '<i class="ki-duotone ki-people fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>',
            'inside' => ['menu'],
            'order' => 1,
            'actions' => ['list','create','view','edit','delete','export'],
            'status' => 1,
        ]);

        ApplicationItem::create([
            'id' => 5,
            'application_section_id' => 1,
            'application_item_id' => NULL,
            'name' => "Organizations",
            'link' => "admin/organizations",
            'icon' => '<i class="ki-duotone ki-office-bag fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>',
            'inside' => ['menu'],
            'order' => 2,
            'actions' => ['list','create','view','edit','delete'],
            'status' => 1,
        ]);

        ApplicationItem::create([
            'id' => 2,
            'application_section_id' => 1,
            'application_item_id'=> NULL,
            'name' => "Application Menus",
            'icon' => '<i class="ki-duotone ki-abstract-14 fs-2"><span class="path1"></span><span class="path2"></span></i>',
            'inside' => ['menu'],
            'order' => 3,
            'status' => 1,
        ]);

        ApplicationItem::create([
            'id' => 3,
            'application_item_id'=> 2,
            'name' => "Sections",
            'link' => 'admin/application_sections',
            'inside' => ['menu'],
            'order' => 1,
            'actions' => ['list','create','view','edit','delete'],
            'status' => 1,
        ]);

        ApplicationItem::create([
            'id' => 4,
            'application_item_id'=> 2,
            'name' => "Items",
            'link' => 'admin/application_items',
            'inside' => ['menu'],
            'order' => 2,
            'actions' => ['list','create','view','edit','delete'],
            'status' => 1,
        ]);

        ApplicationItem::create([
            'id' => 6,
            'application_section_id' => 1,
            'application_item_id' => NULL,
            'name' => "Workgroups - Main Boxes",
            'link' => "admin/workgroups",
            'icon' => '<i class="ki-duotone ki-abstract-26 fs-2"><span class="path1"></span><span class="path2"></span></i>',
            'inside' => ['menu'],
            'order' => 4,
            'actions' => ['list','create','view','edit','delete'],
            'status' => 1,
        ]);

        ApplicationItem::create([
            'id' => 7,
            'application_section_id' => 1,
            'application_item_id' => NULL,
            'name' => "Seconday Boxes",
            'link' => "admin/boxes",
            'icon' => '<i class="ki-duotone ki-cube-2 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>',
            'inside' => ['menu'],
            'order' => 5,
            'actions' => ['list','create','view','edit','delete'],
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
        Schema::dropIfExists('application_items');
    }
};
