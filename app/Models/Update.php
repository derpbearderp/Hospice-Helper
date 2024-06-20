<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;

    protected $fillable = [
        'update_id', 'group_id', 'update_author', 'update_name', 'update_description', 'for_medstaff_only'
    ];
}
