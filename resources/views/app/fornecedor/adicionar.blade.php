
@extends('app.layouts.basico');

@section('titulo', 'Fornecedor - Adicionar')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right:auto">
                <form method="POST" action="{{ route('app.fornecedor.adicionar')}}">
                    @csrf
                    <input name="nome" placeholder="Nome" type="text" class="borda-preta">
                    <input name="site" placeholder="Site" type="text" class="borda-preta">
                    <input name="uf" placeholder="UF" type="text" class="borda-preta">
                    <input name="email" placeholder="E-mail" type="text" class="borda-preta">
                    <button type="submit" class="borda-preta">Adicionar</button>
                </form>
            </div>
        
        </div>
    </div>

@endsection