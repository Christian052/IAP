<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'Name', 'Date', 'Time', 'Status', 'Category', 'Location', 'Image'
    ];

    protected $table = 'events';
}
