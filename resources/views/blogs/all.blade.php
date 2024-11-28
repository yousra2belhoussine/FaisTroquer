@extends('blogs.blog')

@section('title', 'Tout mes articles')

@section('content')

    @foreach ($properties as $property)
        <div class="row no-gutters">
            <div class="col-md-4">

                <img src="{{ url('storage/images/' . $property->photo) }} " alt="Image de {{ $property->titre }}"
                    class="article-image" style="width: 280px ; border-radius: 70% ; gap:20px;">

            </div>



            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $property->titre }}</h5>
                    <p style="padding: 3px"></p>
                    <p class="card-text">
                        <a href="{{ route('blogs.property.show', $property) }}"
                            style=" text-decoration: none; color:black;">
                            {{ Str::limit($property->contenu, 200) }} <span class="btn btn-info">voir details</span>
                        </a>

                    </p>
                    <p style="padding: 10px"></p>
                </div>
            </div>
        </div>
    @endforeach



@endsection
