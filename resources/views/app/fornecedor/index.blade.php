
@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        
        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a class="bold" href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto">
                <form method="POST" action="{{ route('app.fornecedor.listar')}}">
                    @csrf
                    <input name="nome" placeholder="Nome" type="text" class="borda-preta">
                    <input name="site" placeholder="Site" type="text" class="borda-preta">
                    <select name="estado_id"  class="borda-preta">
                        @foreach ($estados as $id => $nome)
                            <option value="{{ $id }}"> {{ $nome }}</option>
                        @endforeach
                        </select>
                    <input name="email" placeholder="E-mail" type="text" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        
        </div>
    </div>

@endsection