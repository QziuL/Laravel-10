@extends('admin.layouts.app')

@section('title', 'Listagem')

@section('header')
    @include('admin.supports.partials.header')
@endsection



@section('content')
    <a href="{{ route('supports.create') }}">Criar dúvidas</a>
    <table>
        <thead>
            <th>Assunto</th>
            <th>Status</th>
            <th>Descrição</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($supports->items() as $support)
                <tr>
                    <td>{{ $support['subject'] }}</td>
                    <td>{{ getStatusSupport($support['status']) }}</td>
                    <td>{{ $support['body'] }}</td>
                    <td><a href="{{ route('supports.show', $support['id']) }}">Ver+</a></td>
                    <td><a href="{{ route('supports.edit', $support['id']) }}">Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-pagination 
        :paginator="$supports" 
        :appends="$filters" />
@endsection