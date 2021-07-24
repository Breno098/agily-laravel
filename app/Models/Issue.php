<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'code',
    ];

    public $hidden = [
        'created_at',
        'updated_at'
    ];

    public function components()
    {
        return $this->belongsToMany(Component::class);
    }

    public function timelog()
    {
        return $this->hasMany(Timelog::class);
    }

}
