@extends('admin.admin')

@section('title', $product->exists ? 'Editer un bien' : 'Créer un bien')


@section('content')
    @yield('title')

    <form class="vstack gap-2"
        action="{{ route($product->exists ? 'products.product.update' : 'products.product.store', $product) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method($product->exists ? 'put' : 'post')

        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'label' => 'Titre',
                'name' => 'title',
                'value' => $product->title,
            ])

            <div>
                <div>
                    <label for="photo">Ajouter une photo :</label>
                    <input type="file" id="photo" name="photo" accept="image/*" required>
                </div>
            </div>
            <div class="col row">
                @include('shareds.input', [
                    'class' => 'col',
                    'name' => 'surface',
                    'value' => $product->surface,
                ])
                @include('shareds.input', [
                    'class' => 'col',
                    'name' => 'price',
                    'label' => 'Prix',
                    'value' => $product->price,
                ])
            </div>
        </div>

        @include('shareds.input', [
            'type' => 'textarea',
            'name' => 'description',
            'value' => $product->description,
        ])
        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'rooms',
                'label' => 'Pièce',
                'value' => $product->rooms,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'bedrooms',
                'label' => 'Chambres',
                'value' => $product->bedrooms,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'floor',
                'label' => 'Etage',
                'value' => $product->floor,
            ])

        </div>

        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'address',
                'label' => 'Adresse',
                'value' => $product->address,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'city',
                'label' => 'Ville',
                'value' => $product->city,
            ])
            @include('shareds.input', [
                'class' => 'col',
                'name' => 'postal_code',
                'label' => 'Code postal',
                'value' => $product->postal_code,
            ])

        </div>
        {{-- @include('shared.select', [
            'name' => 'options',
            'label' => 'Options',
            'value' => $product->options()->pluck('id'),
            'multiple' => true,
        ]) --}}

        @include('shared.checkbox', [
            'name' => 'sold',
            'label' => 'Vendu',
            'value' => $product->sold,
        ])

        <div>
            <button class="btn btn-primary">
                @if ($product->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>
@endsection
