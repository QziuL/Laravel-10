<h1>Editar dúvida - {{$support->subject}}</h1>

<x-alert/>
<br>

<a href="{{ route('supports.index') }}">Listar dúvidas</a>
<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('admin.supports.partials.form', ['support' => $support])
</form>