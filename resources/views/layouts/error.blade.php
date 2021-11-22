@extends('layouts.master')

@section('title')
    Ошибка
@endsection

@section('content')
    <div>
        Ошибка: {{ $messageBug }}
    </div>
    <div>
        <form method="GET" action="{{ route('main') }}">
            <button type="submit">Вернуться на главную страницу заявок</button>
        </form>
    </div>
@endsection
