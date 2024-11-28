<div class="articles">
    @foreach ($articles as $article)
        <div class="article-container">
            <div>
                @if ($article->photo)
                    <img src="{{ url('storage/images/' . $article->photo) }}" alt="Image de {{ $article->titre }}"
                        class="article-image">
                @else
                    <p>Aucune image disponible</p>
                @endif
            </div>
            <div class="article-content">
                <div class="article-title">{{ $article->titre }}</div>

                <div class="article-paragraph">{{ Str::limit($article->contenu, 100000) }}</div>
                <a href="{{ route('articles.show', $article->id) }}">Voir plus</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
