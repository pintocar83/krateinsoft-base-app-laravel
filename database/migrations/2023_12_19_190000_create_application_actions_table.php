<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\ApplicationAction;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_actions', function (Blueprint $table) {
            $table->id();
            $table->string('action',50);
            $table->string('name',50);
        });

        ApplicationAction::create(['action' => "view",            'name' => "View"]);
        ApplicationAction::create(['action' => "print",           'name' => "Print"]);
        ApplicationAction::create(['action' => "add",             'name' => "Add"]);
        ApplicationAction::create(['action' => "remove",          'name' => "Remove"]);
        ApplicationAction::create(['action' => "delete",          'name' => "Delete"]);
        ApplicationAction::create(['action' => "save",            'name' => "Save"]);
        ApplicationAction::create(['action' => "list",            'name' => "List"]);
        ApplicationAction::create(['action' => "edit",            'name' => "Edit"]);
        ApplicationAction::create(['action' => "send_email",      'name' => "Send Email"]);
        ApplicationAction::create(['action' => "send_whatsapp",   'name' => "Send WhatsApp"]);
        ApplicationAction::create(['action' => "send_sms",        'name' => "Send SMS"]);
        ApplicationAction::create(['action' => "file_download",   'name' => "File - Download"]);
        ApplicationAction::create(['action' => "file_upload",     'name' => "File - Upload"]);
        ApplicationAction::create(['action' => "file_delete",     'name' => "File - Delete"]);
        ApplicationAction::create(['action' => "file_preview",    'name' => "File - Preview"]);
        ApplicationAction::create(['action' => "file_rename",     'name' => "File - Rename"]);
        ApplicationAction::create(['action' => "file_move",       'name' => "File - Move"]);
        ApplicationAction::create(['action' => "start",           'name' => "Start"]);
        ApplicationAction::create(['action' => "finish",          'name' => "Finish"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_actions');
    }
};
