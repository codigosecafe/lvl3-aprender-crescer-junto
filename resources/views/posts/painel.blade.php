@extends('layout')


@section('title', 'Posts Index')
@section('content')


<div class="row mb-5">
    <div class="col-12">
        <h1>Painel das publicações</h1>
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
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

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

                    @if (count($publicPosts))
                        @for ($i=0; $i < count($publicPosts);$i++)
                            <tr>
                                <th scope="row">{{  count($publicPosts) - $i }}</th>
                                <td>{{ $publicPosts[$i]->title }}</td>
                                <td>{{ $publicPosts[$i]->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('post.edit', ['type'=> 'public','id' => $publicPosts[$i]->id ]) }}" class="btn btn-success">Editar</a>
                                    <a href="javascript:void(0)" onclick="FormOS.submitDeleteForm(`{{ $publicPosts[$i]->id }}`, '{{ route('post.delete', ['type'=> 'public', 'id' => $publicPosts[$i]->id ]) }}', `form-delete`);" class="btn btn-danger">Deletar</a>
                                </td>
                            </tr>
                        @endfor
                    @else

                        <tr>

                            <td colspan="4" class="text-center"> Você não tem publicações publicas</td>

                        </tr>

                    @endif

                  </tbody>
               </table>
            </div>
         </div>



    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


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



                    @if (count($protectedPosts))
                        @for ($i=0; $i < count($protectedPosts);$i++)
                            <tr>
                                <th scope="row">{{  count($protectedPosts) - $i }}</th>
                                <td>{{ $protectedPosts[$i]->title }}</td>
                                <td>{{ $protectedPosts[$i]->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('post.edit', ['type'=> 'protected','id' => $protectedPosts[$i]->id ]) }}" class="btn btn-success">Editar</a>
                                    <a href="javascript:void(0)" onclick="FormOS.submitDeleteForm(`{{ $protectedPosts[$i]->id }}`, '{{ route('post.delete', ['type'=> 'protected', 'id' => $protectedPosts[$i]->id ]) }}', `form-delete`);" class="btn btn-danger">Deletar</a>
                                </td>
                            </tr>
                        @endfor
                    @else

                        <tr>

                            <td colspan="4" class="text-center"> Você não tem publicações internas</td>

                        </tr>

                    @endif




                  </tbody>
               </table>
            </div>
         </div>



    </div>
  </div>

    </div>
</div>











@endsection
