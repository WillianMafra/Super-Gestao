
@extends('app.layouts.basico')

@section('titulo', 'Pedidos')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Pedidos</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('pedidos.create')}}">Novo</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <br>
            <div style="width: 90%; margin-left: auto; margin-right:auto">
                <div class="row">
                    <table border="1" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Data Criação</th>
                                <th style="width: 15%" class="text-center" colspan="3">Ações</th>
                            </tr>    
                        </thead>
                        <tbody>                                
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <th>{{ $pedido->cliente->nome }}</th>
                                    <th>{{ $pedido->created_at }}</th>
                                    <th><a href="{{route('pedidos.show', $pedido->id) }}"><button class="btn btn-info btn-sm" >Itens Pedido</button></a></th>
                                    <th><a href="{{route('pedidos.edit', $pedido->id) }}"><button class="btn btn-primary btn-sm" >Editar</button></a></th>
                                    <th>
                                        <form method="POST" action="{{ route('pedidos.destroy', $pedido->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" >Excluir</button>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{ $pedidos->appends($request)->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection