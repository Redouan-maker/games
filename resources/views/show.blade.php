@extends('base')

@section('title', '🎮 Game Details')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $game->game_name }}</h3>
            <p class="card-text"><strong>Platform:</strong> {{ $game->platform }}</p>
            <p class="card-text"><strong>Genre:</strong> {{ $game->genre }}</p>
            <p class="card-text"><strong>Rating:</strong> {{ $game->rating }}/10</p>
            
            <a href="/games" class="btn btn-secondary">Terug naar overzicht</a>
        </div>
    </div>
@endsection