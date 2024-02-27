
@extends('app.layouts.basico')

@section('titulo', 'Clientes')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Clientes</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('cliente.create')}}">Novo</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <br>
            <div style="width: 90%; margin-left: auto; margin-right:auto">
                <div class="row">
                    <table border="1" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Data Criação</th>
                                <th style="width: 10%" class="text-center" colspan="2">Ações</th>
                            </tr>    
                        </thead>
    
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <th>{{ $cliente->nome }}</th>
                                    <th>{{ $cliente->created_at }}</th>
                                    <th><a href="{{route('cliente.edit', $cliente->id) }}"><button class="btn btn-primary btn-sm" >Editar</button></a></th>
                                    <th>
                                        <form method="POST" action="{{ route('cliente.destroy', $cliente->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" >Excluir</button>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clientes->appends($request)->links() }}
                </div>
            </div>
        
        </div>
    </div>

@endsection