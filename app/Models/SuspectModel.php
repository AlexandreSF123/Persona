<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuspectModel extends Model
{
    use HasFactory;
    protected $table = 'suspect';
    protected $fillable = ['name', 'age', 'height', 'weight', 'nacionality', 'work', 'skin_color'];
}
