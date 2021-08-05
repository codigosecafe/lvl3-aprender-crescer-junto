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
       <h1>Criar Publicações</h1>
    </div>
 </div>
 <div class="row mt-5">
    <div class="col-12">
       <form  id="formCadastrar" method="POST" action="" onsubmit="return false;" form-cadastro>
          @csrf
          <div class="row mb-3">
             <div class="col-12">
                <label for="titulo" class="form-label">
                   <h3>Titulo</h3>
                </label>
                <input type="text" class="form-control" name="titulo-post" id="titulo" placeholder="Informe o titulo do seu post" />
             </div>
          </div>
          <div class="row">
             <div class="col-12">
                <div id="editor">
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
                Cadastrar
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
        FormOS.submitDataForm('[form-cadastro]', '{{ route('post.store') }}', 'form-cadastro-temp')
        event.preventDefault();
    });
});
</script>
@endsection
