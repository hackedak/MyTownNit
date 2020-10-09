<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';      //table name
    public $PrimaryKey = 'id';       // primary key
    public $timestamps = true;       // timestamb


    public function user()
    {
        return $this->belongsTo('App\User');

    }

}
