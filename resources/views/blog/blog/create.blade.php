<div class="article-container">

    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">

        <h1>Soumettre un Article</h1>
        @csrf
        <label for="titre">Titre de l'article :</label>
        <input type="text" id="titre" name="titre" required>

        <label for="auteur">Nom de l'auteur :</label>
        <input type="text" id="auteur" name="auteur" required>



        <label for="contenu">Contenu de l'article :</label>
        <textarea id="contenu" name="contenu" rows="10" required></textarea>

        <label for="photo">Ajouter une photo :</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>

        <input type="submit" value="Soumettre l'article">
    </form>


</div>
