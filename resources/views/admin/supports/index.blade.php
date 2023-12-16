<h1>Listagem de suportes</h1>
<a href="{{ route('supports.create') }}">Criar dúvidas</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>
                    @if ($support->status=='a') aberto
                    @elseif($support->status=='p') pendente
                    @else concluído
                    @endif
                </td>
                <td>{{ $support->body }}</td>
                <td><a href="{{ route('supports.show', $support->id) }}">Ver+</a></td>
                <td><a href="{{ route('supports.edit', $support->id) }}">Editar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>