
@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Visualizar</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('produto.index')}}">Voltar</a></li>
                @if ($produto->produtoDetalhe)
                    <li><a class="bold" href="{{route('produto-detalhe.edit', $produto->produtoDetalhe->id)}}">Editar Detalhes</a></li>
                @else
                    <li><a class="bold" href="{{route('produto-detalhe.create', $produto->id)}}">Criar Detalhes</a></li>
                @endif
            </ul>
        </div>

        <div class="informacao-pagina">
            <br>
            <div style="width: 20%; margin-left: auto; margin-right:auto">
                <div class="row">
                    <table border="1" class="table table-hover">
                        <tbody>
                            <tr>
                                <th class="bold">Nome:</th>
                                <th>{{ $produto->nome }}</th>
                            </tr>
                            <tr>
                                <th class="bold">Descrição:</th>
                                <th>{{ $produto->descricao }}</th>
                            </tr>
                            <tr>
                                <th class="bold">Peso:</th>
                                <th>{{ $produto->peso }}</th>
                            </tr>
                            <tr>
                                <th class="bold">Unidade:</th>
                                <th>{{ $produto->unidade->unidade }}</th>
                            </tr>
                            <tr>
                                <th class="bold">Comprimento (m):</th>
                                <th>{{ $produto->produtoDetalhe->comprimento ?? '' }}</th>
                            </tr>
                            <tr>
                                <th class="bold">Altura (m):</th>
                                <th>{{ $produto->produtoDetalhe->altura ?? '' }}</th>
                            </tr>
                            <tr>
                                <th class="bold">Largura (m):</th>
                                <th>{{ $produto->produtoDetalhe->largura ?? '' }}</th>
                            </tr>
                            <tr>
                                <th class="bold">Fornecedor:</th>
                                <th>{{ $produto->fornecedor->nome ?? '' }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>

@endsection