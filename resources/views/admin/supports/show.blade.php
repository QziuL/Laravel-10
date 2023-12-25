<h1>Detalhes da dúvida {{ $support->id }}</h1>

<ul>
    <li><b>Assunto</b>: {{ $support->subject }}</li>
    <li>
        <b>Status</b>: 
        @if ($support->status=='a') aberto
        @elseif($support->status=='p') pendente
        @else concluído
        @endif
    </li>
    <li><b>Descrição</b>: {{ $support->body }}</li>
    <form action="{{ route('supports.destroy', $support->id) }}" method="POST">
        @include('admin.supports.partials.delete')
    </form>
</ul>