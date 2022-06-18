<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $guarded = [];
}
