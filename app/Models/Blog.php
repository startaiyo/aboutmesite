<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    // 書き込みしてもよい場合fillable, 禁止の場合guarded
    protected $fillable = ['id','text','title'];
}
