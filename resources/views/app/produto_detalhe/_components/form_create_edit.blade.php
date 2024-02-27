<div class="informacao-pagina">
    <div style="width: 30%; margin-left: auto; margin-right:auto">
            @if (isset($produto_detalhe->id))
                <form method="POST" action="{{route('produto-detalhe.update', $produto_detalhe->id)}}">
                @method('PUT')
            @else
                <form method="POST" action="{{route('produto-detalhe.store')}}">
            @endif
            @csrf
            <div class="bold">Produto: {{ $produto_detalhe->produto->nome ?? $produto->nome }}</div>
            <div class="bold">Descrição: {{ $produto_detalhe->produto->descricao ?? $produto->descricao }}</div>
            <br>
            <input type="hidden" name="produto_id" placeholder="ID do Produto" value="{{ $produto->id ?? $produto_detalhe->produto->id}}" type="number" class="borda-preta">
            @if ($errors->has('produto_id'))
                {{ $errors->first('produto_id')}}
            @endif
            <label class="bold" for="comprimento">Comprimento (m)</label>
            <input name="comprimento" placeholder="Comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento')}}" type="number" class="borda-preta">
            @if ($errors->has('comprimento'))
                {{ $errors->first('comprimento')}}
            @endif
            <label class="bold" for="largura">Largura (m)</label>
            <input name="largura" placeholder="Largura" value="{{ $produto_detalhe->largura ?? old('largura')}}" type="number" class="borda-preta">
            @if ($errors->has('largura'))
                {{ $errors->first('largura')}}
            @endif
            <label class="bold" for="altura">Altura (m)</label>
            <input name="altura" placeholder="Altura" value="{{ $produto_detalhe->altura ?? old('altura')}}" type="number" class="borda-preta">
            @if ($errors->has('altura'))
                {{ $errors->first('altura')}}
            @endif
            <label class="bold" for="unidade_id">Unidade Medida</label>
            <select name="unidade_id" class="borda-preta">
                @foreach ($unidades as $id => $descricao)
                    <option value="{{ $id }}" {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $id ? 'selected' : '' }}> {{ $descricao }}</option>
                @endforeach
                </select>
                @if (isset($produto_detalhe->id))
                    <button type="submit" class="borda-preta">Editar</button>
                @else
                    <button type="submit" class="borda-preta">Adicionar</button>
                @endif
        </form>
    </div>
</div>

