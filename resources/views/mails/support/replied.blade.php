<x-mail::message>
# Dúvida respondida

Assunto da dúvida - {{ $reply->support_id }} <br> Resposta recebida: <b>{{ $reply->content }}</b>.

<x-mail::button :url="route('replies.index', $reply->support_id)">
Veja mais
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
