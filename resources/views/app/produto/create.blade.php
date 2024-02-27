
@extends('app.layouts.basico')

@section('titulo', 'Produto - Adicionar')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Adicionar</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('produto.index')}}">Voltar</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto">
                <form method="POST" action="{{route('produto.store')}}">
                    @csrf
                    <input name="nome" placeholder="Nome" value="{{ old('nome') ?? ''}}" type="text" class="borda-preta">
                    @if ($errors->has('nome'))
                        {{ $errors->first('nome')}}
                    @endif
                    <input name="descricao" placeholder="Descrição" value="{{ old('descricao') ?? ''}}" type="text" class="borda-preta">
                    @if ($errors->has('descricao'))
                        {{ $errors->first('descricao')}}
                    @endif
                    <input name="peso" placeholder="Peso" value="{{ old('peso') ?? ''}}" type="number" class="borda-preta">
                    @if ($errors->has('peso'))
                        {{ $errors->first('peso')}}
                    @endif
                    <select name="unidade_id" value="{{ old('unidade_id') }}" class="borda-preta">
                        @foreach ($unidades as $id => $descricao)
                            <option value="{{ $id }}" {{ old('unidade_id') == $id ? 'selected' : '' }}> {{ $descricao }}</option>
                        @endforeach
                    </select>
                    <label class="bold" for="fornecedor_id">Fornecedor</label>
                    <select name="fornecedor_id" value="{{ old('fornecedor_id') }}" class="borda-preta">
                        @foreach ($fornecedores as $id => $nome)
                            <option value="{{ $id }}" {{ old('fornecedor_id') == $id ? 'selected' : '' }}> {{ $nome }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
            </div>
        </div>
    </div>

@endsection