<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logsemail extends Model
{
    protected $table = 'logs_email';
    protected $fillable = [
        'cnpj', 'email', 
    ];
}
