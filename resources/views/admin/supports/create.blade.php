<h1>Nova dúvida</h1>

{{-- CHAMANDO O COMPONENT 'ALERT' --}}
<x-alert/>

<br>
<a href="{{ route('supports.index') }}">Listar dúvidas</a>
<form action="{{ route('supports.store') }}" method="POST">
    @include('admin.supports.partials.form')
</form>