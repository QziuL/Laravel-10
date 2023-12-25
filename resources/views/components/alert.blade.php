<div>
    {{-- 
       '$errors' => VARIAVEL NATIVA
    --}}

    @if ($errors->any()) 
    @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif

    {{-- 
       '{{ $slot }}' => RECEBER UMA VARIAVEL 
    --}}
</div>