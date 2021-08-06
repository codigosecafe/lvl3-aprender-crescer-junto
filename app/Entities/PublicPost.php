<?php

/**
 * Created by Reliese Model.
 */

namespace App\Entities;

use Carbon\Carbon;

/**
 * Class PublicPost
 * 
 * @property int|null $id
 * @property string|null $title
 * @property string|null $content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Entities
 */
class PublicPost extends Entity
{
	const ID = 'id';
	const TITLE = 'title';
	const CONTENT = 'content';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	protected $connection = 'sqlite';
	protected $table = 'public_posts';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	protected $fillable = [
		self::TITLE,
		self::CONTENT
	];
}
