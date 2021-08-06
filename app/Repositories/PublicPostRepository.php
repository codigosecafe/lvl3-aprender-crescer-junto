<?php
namespace App\Repositories;

use App\Entities\PublicPost;

class PublicPostRepository extends BaseRepository
{
    protected $post;

    public function __construct(PublicPost $post)
    {
        parent::__construct($post);
    }
}
