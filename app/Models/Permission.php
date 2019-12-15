<?php
/**
 * 权限
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $table = 'permissions';

    public $timestamps = false;

    protected $fillable = ['title', 'url', 'pid', 'sort'];
}
