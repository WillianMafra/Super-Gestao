
@extends('app.layouts.basico')

@section('titulo', 'Pedido - Criar')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Pedido - Criar</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('pedidos.index')}}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto">
                <form method="POST" action="{{route('pedidos.store')}}">
                    @csrf
                    <label class="bold" for="cliente_id">Cliente</label>
                    <select name="cliente_id" class="borda-preta">
                        @foreach ($clientes as $id => $nome)
                            <option value="{{ $id }}" {{ old('cliente_id') == $id ? 'selected' : '' }}> {{ $nome }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="borda-preta">Criar</button>
                </form>
            </div>
        </div>
    </div>

@endsection