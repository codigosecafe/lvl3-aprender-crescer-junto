<?php
namespace App\Repositories;

use App\Entities\ProtectedPost;

class ProtectedPostRepository extends BaseRepository
{
    protected $post;

    public function __construct(ProtectedPost $post)
    {
        parent::__construct($post);
    }


}
