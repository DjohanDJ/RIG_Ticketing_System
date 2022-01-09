<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportHeader extends Model
{
    use HasFactory;

    protected $fillable = ['categoryId', 'nim', 'status', 'title', 'description'];
}
