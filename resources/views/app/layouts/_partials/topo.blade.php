
<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo.png')}}">
    </div>
    <div class="menu">
        <ul>
            <li><a class="link-primary" href="{{ route('pedidos.index') }}">Pedidos</a></li>
            <li><a class="link-primary" href="{{ route('cliente.index') }}">Cliente</a></li>
            <li><a class="link-primary" href="{{ route('app.fornecedor') }}">Fornecedor</a></li>
            <li><a class="link-primary" href="{{ route('produto.index') }}">Produto</a></li>
            <li><a class="link-danger"href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>