@extends('layout')


@section('title', 'Posts Index')
@section('content')
<div class="row">
    <div class="col-12">
        <h1>Publicações</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
       <table class="table table-bordered table-hover">
          <thead>
             <tr>
                <th scope="col" style="width: 50px">#</th>
                <th scope="col">Tituto</th>
                <th scope="col" style="width: 250px">Criado em:</th>
                <th scope="col" style="width: 250px">Ações</th>
             </tr>
          </thead>
          <tbody>
             @for ($i=0; $i < count($posts);$i++)
             <tr>
                <th scope="row">{{  count($posts) - $i }}</th>
                <td>{{ $posts[$i]->titulo }}</td>
                <td>{{ $posts[$i]->created_at->format('Y-m-d') }}</td>
                <td>
                   <a href="{{ route('post.edit', ['id' => $posts[$i]->id ]) }}" class="btn btn-success">Editar</a>
                   <a href="javascript:void(0)" onclick="FormOS.submitDeleteForm(`{{ $posts[$i]->id }}`, '{{ route('post.delete', ['id' => $posts[$i]->id ]) }}', `form-delete`);" class="btn btn-danger">Deletar</a>
                </td>
             </tr>
             @endfor
          </tbody>
       </table>
    </div>
 </div>
@endsection
