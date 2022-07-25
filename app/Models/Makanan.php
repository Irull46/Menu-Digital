<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Makanan extends Model
{
    use HasFactory;
    protected $table = 'makanans';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $guarded = [];
}
