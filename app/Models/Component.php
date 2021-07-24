<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public $hidden = [
        'created_at',
        'updated_at'
    ];

    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }
}
