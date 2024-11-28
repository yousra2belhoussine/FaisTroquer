@extends('blogs.blog')

@section('content')
    <div class="d-flex justify-content-between align-items-center ">
        <h1></h1>
        <p style="color: gray;text-shadow: 2px 2px 5px;">
            {{ $property->auteur }}</p>
    </div>
    <div class="card">
        <img src="{{ url('storage/images/' . $property->photo) }}" alt="Image de {{ $property->titre }}" class="article-image"
            style="width: 100%; height:480px; display: block; margin-left: auto;margin-right: auto;">

    </div>

    <div>
        <h5 class="card-title">{{ $property->titre }}</h5>
        <h5 class="card-title">{{ $property->contenu }}</h5>
    </div>
@endsection
