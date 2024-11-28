@extends('logement.logement')

@section('title', 'Les logements')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('logement.logement.create') }}" class="btn btn-primary">Ajouter un logement</a>
    </div>

    <table class="table table-striped">


        <thead>
            <tr>
                <th>Titre</th>
                <th>surface</th>
                <th>Prix </th>
                <th>Ville </th>
                <th>Adresse</th>
                <th>Images</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($logements as $logement)
                <tr>
                    <td>{{ $logement->title }} </td>
                    <td>{{ $logement->surface }}m2</td>
                    <td>{{ number_format($logement->price, thousands_separator: '') }}</td>
                    <td> {{ $logement->city }}</td>
                    <td>{{ $logement->address }}</td>
                    <td>
                        <div>
                            @if ($logement->image)
                                <img src="{{ url('storage/logement/' . $logement->image) }} "
                                    alt="Image de {{ $logement->image }}" class="article-image" style="width: 180px">
                            @else
                                <p>Aucune image disponible</p>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('logement.logement.edit', $logement) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('logement.logement.destroy', $logement) }}" method="post">
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
            {{-- <livewire:comments :model="$logement" /> --}}

        </tbody>
    </table>

    {{ $logements->links() }}

@endsection
