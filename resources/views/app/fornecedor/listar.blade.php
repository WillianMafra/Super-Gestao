
@extends('app.layouts.basico');

@section('titulo', 'Fornecedor - Listar')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu border">
            <ul>
                <li><a class="bold" href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a class="bold" href="{{route('app.fornecedor')}}">Consulta</a></li>
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
                                <th>Estado</th>
                                <th>Site</th>
                                <th>Email</th>
                                <th class="text-center" colspan="2">Ações</th>
                            </tr>    
                        </thead>
    
                        <tbody>
                            @foreach ($fornecedores as $fornecedor)
                                <tr>
                                    <th>{{ $fornecedor->nome }}</th>
                                    <th>{{ $fornecedor->estado_nome }}</th>
                                    <th>{{ $fornecedor->site }}</th>
                                    <th>{{ $fornecedor->email }}</th>
                                    <th><a href="{{ route('app.fornecedor.editar', $fornecedor->id)}}"><button class="btn btn-primary btn-sm" >Editar</button></a></th>
                                    <th><a href="{{ route('app.fornecedor.excluir', $fornecedor->id)}}"><button class="btn btn-danger btn-sm" >Excluir</button></a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        
        </div>
    </div>

@endsection