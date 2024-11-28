@extends('admin.immobilier')

@section('title', $optioni->exists ? 'Editer un bien' : 'Créer un bien')


@section('content')
    @yield('title')

    <form class="vstack gap-2"
        action="{{ route($optioni->exists ? 'admin.optioni.update' : 'admin.optioni.store', $optioni) }}" method="post"">
        @csrf
        @method($optioni->exists ? 'put' : 'post')

        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'label' => 'Option',
                'name' => 'name',
                'value' => $optioni->name,
            ])
            <div>
                <button class="btn btn-primary">
                    @if ($optioni->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>

    </form>
@endsection
