
@extends('app.layouts.basico')

@section('titulo', 'Itens Pedido')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Itens Pedido</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('pedido-produto.create', $pedido->id)}}">Adicionar Itens</a></li>
                <li><a class="bold" href="{{route('pedidos.index')}}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <br>
            <div style="width: 90%; margin-left: auto; margin-right:auto">
                <div class="row">
                    <table border="1" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Fornecedor</th>
                                <th style="width: 15%" class="text-center">Ação</th>
                            </tr>    
                        </thead>
                        <tbody>                                
                            @foreach ($itensPedido as $itemPedido)
                                <tr>
                                    <th>{{ $itemPedido->produto->nome }}</th>
                                    <th>{{ $itemPedido->produto->fornecedor->nome }}</th>
                                    <th>
                                        <form method="POST" action="{{ route('pedido-produto.destroy', $itemPedido->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" >Excluir</button>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if (!empty($itensPedido[0]))
                        {{ $itensPedido->appends($request)->links() }}                        
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection