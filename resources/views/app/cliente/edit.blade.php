
@extends('app.layouts.basico')

@section('titulo', 'Cliente - Editar')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Cliente - Editar</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('cliente.index')}}">Voltar</a></li>
                <li><a class="bold" href="{{route('cliente.create')}}">Criar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto">
                <form method="POST" action="{{ route('cliente.update', $cliente->id) }}">
                    @csrf
                    @method('PUT')
                    <label class="bold" for="nome">Nome</label>
                    <input name="nome" placeholder="Nome" value="{{ old('nome') ?? $cliente->nome }}" type="text" class="borda-preta">
                    @if ($errors->has('nome'))
                        {{ $errors->first('nome')}}
                    @endif
                    <button type="submit" class="borda-preta">Editar</button>
                </form>
            </div>
        </div>
    </div>

@endsection