
@extends('app.layouts.basico');

@section('titulo', 'Produto - Editar')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Editar</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('produto.index')}}">Voltar</a></li>
                <li><a class="bold" href="{{route('produto.create')}}">Criar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto">
                <form method="POST" action="{{ route('produto.update', $produto->id) }}">
                    @csrf
                    @method('PUT')
                    <input name="nome" placeholder="Nome" value="{{ $produto->nome }}" type="text" class="borda-preta">
                    @if ($errors->has('nome'))
                        {{ $errors->first('nome')}}
                    @endif
                    <input name="descricao" placeholder="Descrição" value="{{ $produto->descricao }}" type="text" class="borda-preta">
                    @if ($errors->has('descricao'))
                        {{ $errors->first('descricao')}}
                    @endif
                    <input name="peso" placeholder="Peso" value="{{ $produto->peso }}" type="number" class="borda-preta">
                    @if ($errors->has('peso'))
                        {{ $errors->first('peso')}}
                    @endif
                    <select name="unidade_id"  class="borda-preta">
                        @foreach ($unidades as $id => $descricao)
                            <option value="{{ $id }}" {{ $produto->unidade_id == $id ? 'selected' : '' }}> {{ $descricao }}</option>
                        @endforeach
                        </select>
                    <button type="submit" class="borda-preta">Editar</button>
                </form>
            </div>
        </div>
    </div>

@endsection