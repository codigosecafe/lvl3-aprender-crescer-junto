@extends('layout')


@section('title', 'Posts Index')
@section('content')
<div class="row mb-5">
    <div class="col-12">
       <h1>Publicações</h1>
    </div>
 </div>
 <div class="row">
    <div class="col-12">
       <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
             <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Publicas</button>
          </li>
          <li class="nav-item" role="presentation">
             <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Internas</button>
          </li>
       </ul>
       <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active pt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
             <div class="row">
                @for ($i=0; $i < count($publicPosts);$i++)
                <div class="col-4">
                   <div class="card">
                      <div class="card-header">
                         <small style="color: #ccc;">Publicação criada em: {{ $publicPosts[$i]->created_at->format('d/m/Y H:i:s') }}</small>
                      </div>
                      <div class="card-body">
                         <h5 class="card-title">{{ $publicPosts[$i]->title }}</h5>
                         <p class="card-text">{!! (preg_match('/<img/', $publicPosts[$i]->content))? preg_replace('/style="[^"]*"/', 'class="img-fluid"', $publicPosts[$i]->content) : $publicPosts[$i]->content !!}</p>
                         <hr/>
                         <a href="{{ route('post.edit', ['type'=> 'public','id' => $publicPosts[$i]->id ]) }}" class="btn btn-success">Editar</a>
                         <a href="javascript:void(0)" onclick="FormOS.submitDeleteForm(`{{ $publicPosts[$i]->id }}`, '{{ route('post.delete', ['type'=> 'public', 'id' => $publicPosts[$i]->id ]) }}', `form-delete`);" class="btn btn-danger">Deletar</a>
                      </div>
                   </div>
                </div>
                @endfor
             </div>
          </div>
          <div class="tab-pane fade pt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
             <div class="row">
                @for ($i=0; $i < count($protectedPosts);$i++)
                <div class="col-4">
                   <div class="card">
                      <div class="card-header">
                         <small style="color: #ccc;">Publicação criada em: {{ $protectedPosts[$i]->created_at->format('d/m/Y H:i:s') }}</small>
                      </div>
                      <div class="card-body">
                         <h5 class="card-title">{{ $protectedPosts[$i]->title }}</h5>
                         <p class="card-text">{!! (preg_match('/<img/', $protectedPosts[$i]->content))? preg_replace('/style="[^"]*"/', 'class="img-fluid"', $protectedPosts[$i]->content) : $protectedPosts[$i]->content !!}</p>
                         <hr/>
                         <a href="{{ route('post.edit', ['type'=> 'protected','id' => $protectedPosts[$i]->id ]) }}" class="btn btn-success">Editar</a>
                         <a href="javascript:void(0)" onclick="FormOS.submitDeleteForm(`{{ $protectedPosts[$i]->id }}`, '{{ route('post.delete', ['type'=> 'protected', 'id' => $protectedPosts[$i]->id ]) }}', `form-delete`);" class="btn btn-danger">Deletar</a>
                      </div>
                   </div>
                </div>
                @endfor
             </div>
          </div>
       </div>
    </div>
 </div>







@endsection
