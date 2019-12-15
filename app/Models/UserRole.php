<?php
/**
 * 用户角色
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $table = 'user_roles';

    public $timestamps = false;

    protected $fillable = ['user_id', 'role_id'];

}
