{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST" rout>
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
    <br>
    <select name="motivo_contato" value="{{ old('motivo_contato') }}" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    @if (old('mensagem') !== '')
        @php $mensagem=old('mensagem'); @endphp
  @endif
  <textarea name="mensagem" class="borda-preta" placeholder="Informe aqui o motivo do seu contato">{{ $mensagem }}</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

<div style="position: absolute; top:0px; left: 0px; background:red; width:100%;">
    <pre>
        {{ print_r($errors)}}
    </pre> 
</div>

{{ print_r($motivos_contato) }}