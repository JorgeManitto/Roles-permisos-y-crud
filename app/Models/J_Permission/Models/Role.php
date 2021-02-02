<?php

namespace App\Models\J_Permission\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\J_Permission\Models\Permission;
use App\Models\User;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'full-access',
    ];
public function users(){
        return $this->belongsToMany(User::class)->withTimesTamps();
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class)->withTimesTamps();
    }
}
