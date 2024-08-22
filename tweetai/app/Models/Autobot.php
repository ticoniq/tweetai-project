<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autobot extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'username'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
