<?php

/**
 * Created by Reliese Model.
 */

namespace App\Entities;

use Carbon\Carbon;

/**
 * Class Post
 * 
 * @property int|null $id
 * @property string|null $titulo
 * @property string|null $conteudo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Entities
 */
class Post extends Entity
{
	const ID = 'id';
	const TITULO = 'titulo';
	const CONTEUDO = 'conteudo';
	const CREATED_AT = 'created_at';
	const UPDATED_AT = 'updated_at';
	protected $connection = 'sqlite';
	protected $table = 'posts';

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::CREATED_AT,
		self::UPDATED_AT
	];

	protected $fillable = [
		self::TITULO,
		self::CONTEUDO
	];
}
