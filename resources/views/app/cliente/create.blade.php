
@extends('app.layouts.basico')

@section('titulo', 'Cliente - Adicionar')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Cliente - Adicionar</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('cliente.index')}}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto">
                <form method="POST" action="{{route('cliente.store')}}">
                    @csrf
                    <input name="nome" placeholder="Nome" value="{{ old('nome') ?? ''}}" type="text" class="borda-preta">
                    @if ($errors->has('nome'))
                        {{ $errors->first('nome')}}
                    @endif
                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
            </div>
        </div>
    </div>

@endsection