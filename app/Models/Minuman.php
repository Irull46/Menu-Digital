<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Minuman extends Model
{
    use HasFactory;
    protected $table = 'minumans';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $guarded = [];
}
