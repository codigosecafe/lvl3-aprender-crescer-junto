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
                @for ($i=0; $i < count($publicPosts);$i++)
                <div class="row">
                    <div class="col-12">
                        <h2>{{ $publicPosts[$i]->title }}</h2>
                        <p>{!! $publicPosts[$i]->content !!}</p>
                    </div>
                </div>
                <hr/>
                @endfor

            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...

                @for ($i=0; $i < count($protectedPosts);$i++)
                    <div class="row">
                        <div class="col-12">
                            <h2>{{ $protectedPosts[$i]->title }}</h2>
                            <p>{!! $protectedPosts[$i]->content !!}</p>
                        </div>
                    </div>
                    <hr/>
                @endfor

            </div>

          </div>
    </div>
</div>







@endsection
