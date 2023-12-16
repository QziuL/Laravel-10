<h1>Editar dúvida - {{$support->id}}</h1>
<a href="{{ route('supports.index') }}">Listar dúvidas</a>

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body }}</textarea>
    <button type="submit">Editar</button>
</form>