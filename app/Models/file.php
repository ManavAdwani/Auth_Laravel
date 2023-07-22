<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','file_name','file_type', 'file_desc','file_path','file_tag',
    ];
}
