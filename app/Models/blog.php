<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\J_Permission\Models\Role;
use App\Models\J_Permission\Traits\UserTrait;
class blog extends Model
{
    use HasFactory,UserTrait;

    public $table = "blog";

    protected $fillable = ['title','content','user_id'];
}
