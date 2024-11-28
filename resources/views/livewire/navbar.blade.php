<nav id="header-categories-dropdown-menu">
    <div class="header-categories-dropdown-menu-items">
        @if ($parentcategories)
            @foreach ($parentcategories as $parentcategory)
                <a href="{{ request()->is('offer.*') ? route('offer.index', ['category' => $parentcategory->id]) : route('alloffers.index', ['category' => $parentcategory->id]) }}"
                    class="header-categories-dropdown-menu-item">
                    <i class="fa {{ $parentcategory['icon'] }}"></i>
                    <h3>{{ $parentcategory['name'] }}</h3>
                </a>
            @endforeach
        @endif
    </div>
</nav>
