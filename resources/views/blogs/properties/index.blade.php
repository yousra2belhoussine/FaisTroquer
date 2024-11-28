@extends('blogs.blog')

@section('title', 'Tout mes articles')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('blogs.property.create') }}" class="btn btn-primary">Ajouter un article</a>
    </div>

    <table class="table table-striped">


        <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Contenu </th>
                <th>Images</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ Str::limit($property->titre, 10) }} Voir plus</td>
                    <td>{{ Str::limit($property->auteur, 10) }} Voir plus</td>
                    <td> {{ Str::limit($property->contenu, 10) }} Voir plus</td>
                    <td>
                        <div>
                            @if ($property->photo)
                                <img src="{{ url('storage/images/' . $property->photo) }} "
                                    alt="Image de {{ $property->titre }}" class="article-image" style="width: 180px">
                            @else
                                <p>Aucune image disponible</p>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('blogs.property.edit', $property) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('blogs.property.destroy', $property) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    Supprimer
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
            {{-- <livewire:comments :model="$property" /> --}}

        </tbody>
    </table>

    {{ $properties->links() }}

@endsection
