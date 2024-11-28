@extends('admin.immobilier')

@section('title', $immobilier->exists ? 'Editer un bien' : 'Créer un bien')


@section('content')
    @yield('title')

    <form class="vstack gap-2"
        action="{{ route($immobilier->exists ? 'admin.immobilier.update' : 'admin.immobilier.store', $immobilier) }}"
        method="post" enctype="multipart/form-data">
        @csrf
        @method($immobilier->exists ? 'put' : 'post')

        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $immobilier->title,
            ])

            <div>

                @php
                    $class ??= null;
                    $name ??= '';
                    $value ??= '';
                    $label ??= ucfirst($name);
                @endphp
                <div>
                    <label for="image">Ajouter une photo :</label>
                    <input type="file" id="image" value="{{ old($name, $value) }}" name="image" accept="image/*"
                        required>
                </div>
            </div>
            <div class="col row">
                @include('shareds.input', [
                    'class' => 'col',
                    'name' => 'surface',
                    'value' => $immobilier->surface,
                ])
                @include('shareds.input', [
                    'class' => 'col',
                    'name' => 'price',
                    'label' => 'Prix',
                    'value' => $immobilier->price,
                ])
            </div>
        </div>

        @include('shareds.input', [
            'type' => 'textarea',
            'name' => 'description',
            'value' => $immobilier->description,
        ])
        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'rooms',
                'label' => 'Pièce',
                'value' => $immobilier->rooms,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'bedrooms',
                'label' => 'Chambres',
                'value' => $immobilier->bedrooms,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'floor',
                'label' => 'Etage',
                'value' => $immobilier->floor,
            ])

        </div>

        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'address',
                'label' => 'Adresse',
                'value' => $immobilier->address,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'city',
                'label' => 'Ville',
                'value' => $immobilier->city,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'postal_code',
                'label' => 'Code postal',
                'value' => $immobilier->postal_code,
            ])

        </div>

        {{-- @include('shareds.select', [
            'name' => 'optionis',
            'label' => 'Options',
            'value' => App\Models\Optioni::pluck('id'),
            'multiple' => true,
        ]) --}}

        {{-- @include('shareds.checkbox', [
            'name' => 'sold',
            'label' => 'Vendu',
            'value' => $immobilier->sold,
        ]) --}}

        <div>
            <button class="btn btn-primary">
                @if ($immobilier->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>
@endsection
