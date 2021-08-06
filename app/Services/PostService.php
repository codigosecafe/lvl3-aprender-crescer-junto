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
        $publicPosts = $this->publicPostRepository->list();
        $protectedPosts = $this->protectedPostRepository->list();

        return [
            'publicPosts' => $this->publicPostRepository->list(),
            'protectedPosts' => $this->protectedPostRepository->list()
        ];
    }

    public function createPost(Collection $request)
    {
        if($request->get('type') == 'public'){

            $this->publicPostRepository->insert($request);
        }else{
            $this->protectedPostRepository->insert($request);
        }
    }

    public function editPost($type, $id)
    {
        if($type == 'public'){
            $post =  $this->publicPostRepository->findById($id);
        }else{
            $post = $this->protectedPostRepository->findById($id);
        }
        return $post;
    }
    public function updatePost($type, $id, Collection $request)
    {
        if($request->get('type') == 'public'){

            if($type == 'protected'){
                $this->protectedPostRepository->delete($id);
                $post = $this->publicPostRepository->insert($request);
            }else{
                $post = $this->publicPostRepository->update($id, $request);
            }

        }else{
            if($type == 'public'){
                $this->publicPostRepository->delete($id);
                $post = $this->protectedPostRepository->insert($request);
            }else{
                $post = $this->protectedPostRepository->update($id, $request);

            }
        }
        return $post;
    }

    public function deletePost($type, $id)
    {
        if($type == 'public'){
            $this->publicPostRepository->delete($id);
        }else{
            $this->protectedPostRepository->delete($id);
        }
    }
}
