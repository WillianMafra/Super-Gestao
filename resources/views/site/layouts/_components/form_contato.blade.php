{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST" rout>
    @csrf

    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    @if ($errors->has('nome'))
        {{ $errors->first('nome'); }}
    @endif
    <br>

    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    @if ($errors->has('telefone'))
        {{ $errors->first('telefone'); }}
    @endif
    <br>

    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
    @if ($errors->has('email'))
        {{ $errors->first('email'); }}
    @endif
    <br>

    <select name="motivo_contatos_id" value="{{ old('motivo_contatos_id') }}" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivos_contato as $key => $m)
        <option value="{{ $key }}" {{ old('motivo_contatos_id') == $key ? 'selected' : '' }}> {{ $m }}</option>
        @endforeach
    </select>
    @if ($errors->has('motivo_contatos_id'))
        {{ $errors->first('motivo_contatos_id'); }}
    @endif
    <br>

    @if (old('mensagem') !== '')
        @php $mensagem=old('mensagem'); @endphp
  @endif
  <textarea name="mensagem" class="borda-preta" placeholder="Informe aqui o motivo do seu contato">{{ $mensagem }}</textarea>
  @if ($errors->has('mensagem'))
        {{ $errors->first('mensagem'); }}
    @endif
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
{{-- @if ($errors->any())
<div style="position: absolute; top:0px; left: 0px; background:red; width:100%;">
    <pre>
        {{ print_r($errors)}}
    </pre> 
</div>    
@endif --}}
