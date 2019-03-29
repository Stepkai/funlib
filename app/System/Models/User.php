<?php

namespace App\System\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	public const TABLE = 'users';

	protected $table = self::TABLE;

	protected $fillable = [
		'name',
		'email',
		'password',
	];

	protected $dates = [
		'created_at',
		'updated_at',
	];

	protected $hidden = [
		'password',
		'role',
		'token'
	];
}