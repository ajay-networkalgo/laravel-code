<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'roles',
        'created_at',
        'updated_at',
    ];


    public function modules()
    {
        return $this->belongsToMany(ModuleList::class, 'module_permissions', 'role_id', 'module_id');
    }
}
