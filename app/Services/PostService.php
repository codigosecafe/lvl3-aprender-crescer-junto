<?php
namespace App\Services;

use Illuminate\Support\Collection;
use App\Repositories\PublicPostRepository;
use App\Repositories\ProtectedPostRepository;




class PostService
{
    protected $publicPostRepository;
    protected $protectedPostRepository;


    public function __construct(PublicPostRepository $publicPostRepository, ProtectedPostRepository $protectedPostRepository)
    {
        $this->publicPostRepository = $publicPostRepository;
        $this->protectedPostRepository = $protectedPostRepository;
    }

    public function listPosts()
    {
        return [
            'publicPosts' => $this->publicPostRepository->list(),
            'protectedPosts' => $this->protectedPostRepository->list()
        ];
    }

    public function createPost(Collection $request)
    {
        if($request->get('type') == 'public'){
            return $this->publicPostRepository->insert($request);
        }

        return $this->protectedPostRepository->insert($request);
    }

    public function editPost($type, $id)
    {
        if($type == 'public'){
            return  $this->publicPostRepository->findById($id);
        }
        return $this->protectedPostRepository->findById($id);
    }


    public function updatePost($type, $id, Collection $request)
    {
        if($request->get('type') == 'public'){
            return $this->updatePublicPost($type, $id, $request);
        }
        return $this->updateProtectedPost($type, $id, $request);
    }


    protected function updatePublicPost($type, $id, $request)
    {
        if($type == 'protected'){
            $this->protectedPostRepository->delete($id);
            return $this->publicPostRepository->insert($request);
        }
        return $this->publicPostRepository->update($id, $request);
    }

    protected function updateProtectedPost($type, $id, $request)
    {
        if($type == 'public'){
            $this->publicPostRepository->delete($id);
            return $this->protectedPostRepository->insert($request);
        }
        return $this->protectedPostRepository->update($id, $request);
    }

    public function deletePost($type, $id)
    {
        if($type == 'public'){
           return $this->publicPostRepository->delete($id);
        }

        return  $this->protectedPostRepository->delete($id);
    }
}
