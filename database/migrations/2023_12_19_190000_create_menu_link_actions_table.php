<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\MenuLinkAction;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_link_actions', function (Blueprint $table) {
            $table->id();
            $table->string('action',50);
            $table->string('name',50);
        });

        MenuLinkAction::create(['action' => "view",            'name' => "View"]);
        MenuLinkAction::create(['action' => "print",           'name' => "Print"]);
        MenuLinkAction::create(['action' => "add",             'name' => "Add"]);
        MenuLinkAction::create(['action' => "remove",          'name' => "Remove"]);
        MenuLinkAction::create(['action' => "delete",          'name' => "Delete"]);
        MenuLinkAction::create(['action' => "save",            'name' => "Save"]);
        MenuLinkAction::create(['action' => "list",            'name' => "List"]);
        MenuLinkAction::create(['action' => "edit",            'name' => "Edit"]);
        MenuLinkAction::create(['action' => "send_email",      'name' => "Send Email"]);
        MenuLinkAction::create(['action' => "send_whatsapp",   'name' => "Send WhatsApp"]);
        MenuLinkAction::create(['action' => "send_sms",        'name' => "Send SMS"]);
        MenuLinkAction::create(['action' => "file_download",   'name' => "File - Download"]);
        MenuLinkAction::create(['action' => "file_upload",     'name' => "File - Upload"]);
        MenuLinkAction::create(['action' => "file_delete",     'name' => "File - Delete"]);
        MenuLinkAction::create(['action' => "file_preview",    'name' => "File - Preview"]);
        MenuLinkAction::create(['action' => "file_rename",     'name' => "File - Rename"]);
        MenuLinkAction::create(['action' => "file_move",       'name' => "File - Move"]);
        MenuLinkAction::create(['action' => "start",           'name' => "Start"]);
        MenuLinkAction::create(['action' => "finish",          'name' => "Finish"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_sections');
    }
};
