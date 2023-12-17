<h1>Nova dúvida</h1>

{{-- variável nativa do laravel --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif
<br>
<a href="{{ route('supports.index') }}">Listar dúvidas</a>
<form action="{{ route('supports.store') }}" method="POST">
    @csrf
    <input type="text" name="subject" placeholder="Assunto" value="{{ old('subject') }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>