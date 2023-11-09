<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOrder extends Model
{
    use HasFactory;
    protected $fillable = ['otimo_estado', 'bom_estado', 'regular', 'mau_estado', 'pessimo_estado'];
}
