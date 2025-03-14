@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Posts</h2>
        @livewire('posts-table')
    </div>
@endsection
