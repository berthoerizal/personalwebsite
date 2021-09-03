<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configweb extends Model
{
    use HasFactory;

    protected $fillable = ['profile', 'title', 'type', 'desc', 'url', 'site_name', 'metadata', 'keywords', 'developer', 'picture'];
}
