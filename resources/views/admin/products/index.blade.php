@extends('admin.admin')
@section('title', 'Toutes les maisons et appartement')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('products.product.create') }}" class="btn btn-primary">Ajouter un bien</a>
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
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->surface }} m2</td>
                    <td>{{ number_format($product->price, thousands_separator: '') }}</td>
                    <td>{{ $product->city }}</td>
                    <td>

                    <td>
                        <div>
                            <img src="{{ url('storage/product_images/' . $product->image) }}"
                                alt="Image de {{ $product->titre }}" class="article-image">

                        </div>
                    </td>

                    </td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('products.product.edit', $product) }}" class="btn btn-primary">Editer</a>
                            <form action="{{ route('products.product.destroy', $product) }}" method="post">
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

    {{ $products->links() }}

@endsection
