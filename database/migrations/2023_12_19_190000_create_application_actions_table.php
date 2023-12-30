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
            $table->tinyInteger("order")->default(999);
            $table->tinyInteger('status')->default(1);
        });

        ApplicationAction::create([ 'action' => "list",          'name' => "List",            'order'=> 1,  'status' => 1 ]);
        ApplicationAction::create([ 'action' => "create",        'name' => "Create",          'order'=> 2,  'status' => 1 ]);
        ApplicationAction::create([ 'action' => "view",          'name' => "View",            'order'=> 3,  'status' => 1 ]);
        ApplicationAction::create([ 'action' => "edit",          'name' => "Edit",            'order'=> 4,  'status' => 1 ]);
        ApplicationAction::create([ 'action' => "delete",        'name' => "Delete",          'order'=> 5,  'status' => 1 ]);
        ApplicationAction::create([ 'action' => "export",        'name' => "Export",          'order'=> 6,  'status' => 1 ]);
        ApplicationAction::create([ 'action' => "send_email",    'name' => "Send Email",      'order'=> 10, 'status' => 0 ]);
        ApplicationAction::create([ 'action' => "send_whatsapp", 'name' => "Send WhatsApp",   'order'=> 11, 'status' => 0 ]);
        ApplicationAction::create([ 'action' => "send_sms",      'name' => "Send SMS",        'order'=> 12, 'status' => 0 ]);
        ApplicationAction::create([ 'action' => "file_download", 'name' => "File - Download", 'order'=> 13, 'status' => 0 ]);
        ApplicationAction::create([ 'action' => "file_upload",   'name' => "File - Upload",   'order'=> 14, 'status' => 0 ]);
        ApplicationAction::create([ 'action' => "file_delete",   'name' => "File - Delete",   'order'=> 15, 'status' => 0 ]);
        ApplicationAction::create([ 'action' => "file_preview",  'name' => "File - Preview",  'order'=> 16, 'status' => 0 ]);
        ApplicationAction::create([ 'action' => "file_rename",   'name' => "File - Rename",   'order'=> 17, 'status' => 0 ]);
        ApplicationAction::create([ 'action' => "file_move",     'name' => "File - Move",     'order'=> 18, 'status' => 0 ]);
        ApplicationAction::create([ 'action' => "start",         'name' => "Start",           'order'=> 19, 'status' => 0 ]);
        ApplicationAction::create([ 'action' => "finish",        'name' => "Finish",          'order'=> 20, 'status' => 0 ]);
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
