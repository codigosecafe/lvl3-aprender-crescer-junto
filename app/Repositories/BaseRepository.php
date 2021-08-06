<?php
namespace App\Repositories;

use Illuminate\Support\Collection;

class BaseRepository
{
    protected $obj;

    protected function __construct(object $obj)
    {
        $this->obj = $obj;
    }

    public function list()
    {
        return  $this->obj->orderBy('created_at', 'desc')->get();
    }

    public function findById($id)
    {
        return  $this->obj->find($id);
    }

    public function delete($id)
    {
        return  $this->obj->where('id', '=', $id)->delete();
    }

    public function insert(Collection $attributes)
    {
        $data['title']   = $attributes->get('titulo-post');
        $data['content'] = $attributes->get('content-post');

        return  $this->obj->create($data);
    }

    public function update($id, Collection $attributes)
    {

        $data['title']   = $attributes->get('titulo-post');
        $data['content'] = $attributes->get('content-post');

        return  $this->obj->where('id', '=', $id)->update($data);

    }
}
