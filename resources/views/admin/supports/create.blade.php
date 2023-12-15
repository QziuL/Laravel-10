<h1>Nova dúvida</h1>
<a href="{{ route('supports.index') }}">Listar dúvidas</a>

<form action="" method="POST">
    @csrf
    <input type="text" name="subject" placeholder="Assunto">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
</form>