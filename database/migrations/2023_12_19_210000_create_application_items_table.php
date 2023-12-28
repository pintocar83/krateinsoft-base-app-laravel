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
            $table->string("actions",1000)->default("")->nullable();
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
            'actions' => "list,view,save,edit,delete",
            'status' => 1,
        ]);

        ApplicationItem::create([
            'id' => 2,
            'application_section_id' => 1,
            'application_item_id'=> NULL,
            'name' => "Applications",
            'icon' => '<i class="ki-duotone ki-abstract-14 fs-2"><span class="path1"></span><span class="path2"></span></i>',
            'inside' => ['menu'],
            'order' => 1,
            'status' => 1,
        ]);

        ApplicationItem::create([
            'id' => 3,
            'application_item_id'=> 2,
            'name' => "Sections",
            'link' => 'admin/application_sections',
            'inside' => ['menu'],
            'order' => 1,
            'actions' => "list,view,save,edit,delete",
            'status' => 1,
        ]);

        ApplicationItem::create([
            'id' => 4,
            'application_item_id'=> 2,
            'name' => "Items",
            'link' => 'admin/application_items',
            'inside' => ['menu'],
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
        Schema::dropIfExists('application_items');
    }
};
