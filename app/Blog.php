<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "artikel";

    protected $fillable = [
        'judul','kategori_id','thumbnail','content','date',
    ];

    public $timestamps = false;
}