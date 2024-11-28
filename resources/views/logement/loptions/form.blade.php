@extends('logement.logement')

@section('title', $loption->exists ? 'Editer une option' : 'Créer une option')


@section('content')
    @yield('title')

    <form class="vstack gap-2"
        action="{{ route($loption->exists ? 'loption.loption.update' : 'loption.loption.store', $loption) }}" method="post">
        @csrf
        @method($loption->exists ? 'put' : 'post')
        <div class="row">
            @include('shareds.input', [
                'class' => 'col',
                'label' => 'Nom',
                'name' => 'name',
                'value' => $loption->name,
            ])
            <div>
                <button class="btn btn-primary">
                    @if ($loption->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>

    </form>
@endsection
