<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = ['exp_title', 'exp_place', 'exp_info', 'exp_date_start', 'exp_date_finish'];
}
