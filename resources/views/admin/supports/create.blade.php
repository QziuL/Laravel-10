@extends('admin.layouts.app')

@section('title', 'Novo Tópico')

@section('header')
    <h1 class="text-lg text-black-500">Nova dúvida</h1>
@endsection

@section('content')
    <a href="{{ route('supports.index') }}" >Listar dúvidas</a>
    <form action="{{ route('supports.store') }}" method="POST">
        @include('admin.supports.partials.form')
    </form>
@endsection