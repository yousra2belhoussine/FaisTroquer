@extends('blogs.blog')

@section('title', $property->exists ? 'Editer un article' : 'Créer un article')


@section('content')
    @yield('title')

    <form class="vstack gap-2"
        action="{{ route($property->exists ? 'blogs.property.update' : 'blogs.property.store', $property) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'name' => 'titre',
                'label' => 'Titre',
                'value' => $property->titre,
            ])
            @include('shared.input', [
                'class' => 'col',
                'name' => 'auteur',
                'label' => 'Auteur',
                'value' => $property->auteur,
            ])
        </div>
        <div>
            <label for="image">Ajouter une photo :</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        @include('shared.input', [
            'type' => 'textarea',
            'name' => 'contenu',
            'value' => $property->contenu,
        ])
        @include('shared.select', [
            'name' => 'options',
            'label' => 'Catégories',
            'value' => $property->options()->pluck('id'),
            'multiple' => true,
        ])
        <div>
            <button class="btn btn-primary">
                @if ($property->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>
@endsection
