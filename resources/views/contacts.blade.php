@extends('layouts.app')

@section('title', 'Контакты')

@section('content')
    <h1>Контактная информация</h1>
    <p>Свяжитесь с нами по любым вопросам:</p>

    <div class="contacts-list">
        @foreach($contacts as $contact)
            <div class="contact-card">
                <h3>{{ $contact['title'] }}</h3>
                <p><strong>Значение:</strong> {{ $contact['value'] }}</p>
                <p><em>{{ $contact['description'] }}</em></p>
            </div>
        @endforeach
    </div>
@endsection