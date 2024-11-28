@extends('logement.logement')

@section('title', 'Les options')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('loption.loption.create') }}" class="btn btn-primary">Ajouter une option</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($loptions as $loption)
                <tr>
                    <td>{{ $loption->name }} </td>

                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('loption.loption.edit', $loption) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('loption.loption.destroy', $loption) }}" method="post">
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

    {{ $loptions->links() }}

@endsection
