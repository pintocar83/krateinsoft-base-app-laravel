<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'identification_number',
        'name',
        'address_country',
        'address_state',
        'address_city',
        'address_line1',
        'address_line2',
        'email',
        'phone',
        'timezone',
        'language',
        'image',
        'image_secondary',
        'image_inline',
        'image_report_vertical',
        'image_report_horizontal',
        'db_driver',
        'db_url',
        'db_host',
        'db_port',
        'db_socket',
        'db_name',
        'db_user',
        'db_password',
        'status',
        'delete_at',
    ];

    public function migrate()
    {
        $connection = [
            "driver" => $this->db_driver
        ];

        if($this->db_url)      $connection["url"] = $this->db_url;
        if($this->db_host)     $connection["host"] = $this->db_host;
        if($this->db_port)     $connection["port"] = $this->db_port;
        if($this->db_name)     $connection["database"] = $this->db_name;
        if($this->db_user)     $connection["username"] = $this->db_user;
        if($this->db_password) $connection["password"] = $this->db_password;
        if($this->db_socket)   $connection["unix_socket"] = $this->db_socket;

        config(["database.connections.tmp" => $connection]);

        if($this->db_driver==="sqlite"){
            if(!file_exists($this->db_name)){
                $file = fopen($this->db_name, 'w');
                fclose($file);
            }
        }

        Artisan::call('migrate', [
            '--database' => 'tmp',
            '--path' => 'database/migrations/organizations',
        ]);
        //Artisan::command('migrate --force --no-interaction --database tmp --path database/migrations/organizations', function(){});

    }
}
