@extends('logement.logement')

@section('title', $logement->exists ? 'Editer un bien' : 'Créer un bien')


@section('content')
    @yield('title')

    <form class="vstack gap-2"
        action="{{ route($logement->exists ? 'logement.logement.update' : 'logement.logement.store', $logement) }}"
        method="post" enctype="multipart/form-data">
        @csrf
        @method($logement->exists ? 'put' : 'post')

        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $logement->title,
            ])

            <div>
                <div>
                    <label for="image">Ajouter une photo :</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
            </div>
            <div class="col row">
                @include('shareds.input', [
                    'class' => 'col',
                    'name' => 'surface',
                    'value' => $logement->surface,
                ])
                @include('shareds.input', [
                    'class' => 'col',
                    'name' => 'price',
                    'label' => 'Prix',
                    'value' => $logement->price,
                ])
            </div>
        </div>

        @include('shareds.input', [
            'type' => 'textarea',
            'name' => 'description',
            'value' => $logement->description,
        ])
        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'rooms',
                'label' => 'Pièce',
                'value' => $logement->rooms,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'bedrooms',
                'label' => 'Chambres',
                'value' => $logement->bedrooms,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'floor',
                'label' => 'Etage',
                'value' => $logement->floor,
            ])

        </div>

        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'address',
                'label' => 'Adresse',
                'value' => $logement->address,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'city',
                'label' => 'Ville',
                'value' => $logement->city,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'postal_code',
                'label' => 'Code postal',
                'value' => $logement->postal_code,
            ])

        </div>


        {{-- @include('shareds.checkbox', [
            'name' => 'sold',
            'label' => 'Vendu',
            'value' => $logement->sold,
            'loptions' => $loptions,
        ]) --}}

        {{-- @include('shareds.select', [
            'name' => 'loptions',
            'label' => 'Options',
            // 'value' => $logement->loptions()->pluck('id'),
            'multiple' => true,
        ]) --}}

        <div>
            <button class="btn btn-primary">
                @if ($logement->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>
@endsection
