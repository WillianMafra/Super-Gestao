
@extends('app.layouts.basico')

@section('titulo', 'Fornecedor - Adicionar')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Editar</p>
        </div>

        <div class="menu border">
            <ul>
                <li class="bold"><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto">
                <form method="POST" action="{{ route('app.fornecedor.editar', ['id' => $id])}}">
                    @csrf
                    <input name="nome" value="{{ $fornecedor->nome }}" placeholder="Nome" type="text" class="borda-preta">
                    @if ($errors->has('nome'))
                        {{ $errors->first('nome')}}
                    @endif
                    <input name="site" value=" {{ $fornecedor->site }}" placeholder="Site" type="text" class="borda-preta">
                    @if ($errors->has('site'))
                        {{ $errors->first('site')}}
                    @endif
                    <select name="estado_id" value="{{ $fornecedor->estado_id }}" class="borda-preta">
                    @foreach ($estados as $id => $nome)
                        <option value="{{ $id }}" {{ $fornecedor->estado_id == $id ? 'selected' : '' }}> {{ $nome }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('estado_id'))
                        {{ $errors->first('estado_id')}}
                    @endif
                    <input name="email" value="{{ $fornecedor->email }}" placeholder="E-mail" type="text" class="borda-preta">
                    @if ($errors->has('email'))
                        {{ $errors->first('email')}}
                    @endif
                    <button type="submit" class="borda-preta">Editar</button>
                </form>
            </div>
        </div>
    </div>

@endsection