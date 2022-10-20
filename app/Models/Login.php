<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'login';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
