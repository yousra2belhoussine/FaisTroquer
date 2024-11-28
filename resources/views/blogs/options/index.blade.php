@extends('blogs.blog')

@section('title', 'Toutes les Catégorie')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('blogs.option.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
    </div>

    <table class="table table-striped">


        <thead>
            <tr>
                <th>Catégorie</th>

                <th class="text-end">Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($options as $option)
                <tr>
                    <td>{{ $option->category }}</td>


                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('blogs.option.edit', $option) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('blogs.option.destroy', $option) }}" method="post">
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



@endsection
