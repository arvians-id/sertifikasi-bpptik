<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'title', 'slug', 'body'];

    public $timestamps = true;

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
