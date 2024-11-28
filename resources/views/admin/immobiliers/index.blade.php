@extends('admin.immobilier')
@section('title', 'Toutes les maisons et appartement')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.immobilier.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>

    <table class="table table-striped">

        <thead>
            <tr>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Image</th>

                <th class="text-end">Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($immobiliers as $immobilier)
                <tr>
                    <td>{{ $immobilier->title }}</td>
                    <td>{{ $immobilier->surface }} m2</td>
                    <td>{{ number_format($immobilier->price, thousands_separator: '') }} €</td>
                    <td>{{ $immobilier->city }}</td>
                    <td>

                    <td>
                        <div>
                            <img src="{{ url('storage/immobilier/' . $immobilier->image) }}"
                                alt="Image de {{ $immobilier->titre }}" class="article-image" width="200px">

                        </div>
                    </td>

                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.immobilier.edit', $immobilier) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('admin.immobilier.destroy', $immobilier) }}" method="post">
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

        </tbody>
    </table>

    {{ $immobiliers->links() }}

@endsection
