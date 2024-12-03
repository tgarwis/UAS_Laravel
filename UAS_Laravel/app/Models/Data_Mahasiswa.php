<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'data_mahasiswas';

    protected $fillable = ['npm', 'name', 'prodi'];
}
