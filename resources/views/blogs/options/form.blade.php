@extends('blogs.blog')

@section('title', $option->exists ? 'Editer une option' : 'Créer une option')


@section('content')
    @yield('title')

    <form class="vstack gap-2" action="{{ route($option->exists ? 'blogs.option.update' : 'blogs.option.store', $option) }}"
        method="post" enctype="multipart/form-data">
        @csrf
        @method($option->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', [
                'class' => 'col',
                'name' => 'category',
                'label' => 'Nom',
                'value' => $option->category,
            ])



            <div>
                <button class="btn btn-primary">
                    @if ($option->exists)
                        Modifier
                    @else
                        Créer
                    @endif
                </button>
            </div>

    </form>
@endsection
