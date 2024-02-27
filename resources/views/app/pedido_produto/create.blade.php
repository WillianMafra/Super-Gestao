
@extends('app.layouts.basico')

@section('titulo', 'Itens Pedido - Adicionar')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Itens Pedido - Adicionar</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('pedidos.show', $pedido->id)}}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto">
                <form method="POST" action="{{route('pedido-produto.store', $pedido->id)}}">
                    @csrf
                    <label class="bold" for="produto_id">Produto</label>
                    <select name="produto_id" class="borda-preta">
                        @foreach ($produtos as $id => $nome)
                            <option value="{{ $id }}"> {{ $nome }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
            </div>
        </div>
    </div>

@endsection