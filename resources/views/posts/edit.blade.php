@extends('layout')


@section('title', 'Post Index')




@section('js-header')
@parent

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor/samples/js/sample.js') }}"></script>
@endsection





@section('content')
<div class="row">
    <div class="col-12">
       <h1>Editar Publicações</h1>
    </div>
 </div>
 <div class="row mt-5">
    <div class="col-12">
       <form  id="formAtualizar" method="POST" action="" onsubmit="return false;" form-atualizar>
          @csrf
          @method('PUT')
          <div class="row mb-3">
             <div class="col-8">
                <label for="titulo" class="form-label">
                   <h3>Titulo</h3>
                </label>
                <input type="text" class="form-control form-control-lg" name="titulo-post" id="titulo" value="{{ $post->title }}" placeholder="Informe o titulo do seu post" />
             </div>
             <div class="col-4">
                <label for="titulo" class="form-label">
                   <h3>Tipo de publicação</h3>
                </label>
                <select class="form-select form-select-lg mb-3" name="type">
                    <option {{ ($typePost == 'public')? 'selected': '' }} value="public">PUBLICA</option>
                    <option {{ ($typePost == 'protected')? 'selected': '' }} value="protected">INTERNA</option>
                  </select>
             </div>
          </div>
          <div class="row">
             <div class="col-12">
                <div id="editor">
                   {!! $post->content !!}
                </div>
                <textarea id="content" name="content-post" hidden>

                </textarea>
             </div>
          </div>
          <div id="formBtns" class="row mt-5">
             <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit"
                   class="btn btn-primary btn-lg"
                   onclick="">
                Atualizar
                </button>
                <a onclick="fn.gotolink('{{ route('post.index') }}')" class="btn btn-secondary btn-lg" role="button"> Cancelar </a>
             </div>
          </div>
       </form>
    </div>
 </div>
@endsection


@section('js-footer')
@parent
<script>

document.addEventListener("DOMContentLoaded", function (event) {

    initSample();
    $( "form" ).submit(function( event ) {
        console.log(CKEDITOR.instances.editor.getData());
        $('#content').val(CKEDITOR.instances.editor.getData());
        FormOS.submitDataForm('[form-atualizar]', '{{ route('post.update', ['type'=> $typePost,'id' => $post->id ]) }}', 'form-atualizar-temp')
        event.preventDefault();
    });

});
</script>
@endsection
