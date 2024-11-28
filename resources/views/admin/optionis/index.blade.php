@extends('admin.immobilier')
@section('title', 'Toutes les options logement')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.optioni.create') }}" class="btn btn-primary">Ajouter une option</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($optionis as $optioni)
                <tr>
                    <td>{{ $optioni->name }}</td>

                    <td>
                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.optioni.edit', $optioni) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('admin.optioni.destroy', $optioni) }}" method="post">
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

    {{ $optionis->links() }}

@endsection
