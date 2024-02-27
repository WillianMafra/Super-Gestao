
@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Adicionar Detalhes Produto</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="#">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto">
                @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades, 'produto' => $produto])
                    
                @endcomponent
            </div>
        </div>
    </div>

@endsection