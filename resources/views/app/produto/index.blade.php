
@extends('app.layouts.basico');

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('produto.create')}}">Novo</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <br>
            <div style="width: 90%; margin-left: auto; margin-right:auto">
                <div class="row">
                    <table border="1" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Peso</th>
                                <th>Unidade</th>
                                <th class="text-center" colspan="2">Ações</th>
                            </tr>    
                        </thead>
    
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <th>{{ $produto->nome }}</th>
                                    <th>{{ $produto->descricao }}</th>
                                    <th>{{ $produto->peso }}</th>
                                    <th>{{ $produto->unidade }}</th>
                                    <th><a href="{{route('produto.edit', $produto->id) }}"><button class="btn btn-primary btn-sm" >Editar</button></a></th>
                                    <th>
                                        <form method="POST" action="{{ route('produto.destroy', $produto->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" >Excluir</button>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $produtos->appends($request)->links() }}
                </div>
            </div>
        
        </div>
    </div>

@endsection