<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class OptionCategoryController extends Controller
{
    public function create()
    {
        return view('options.create');
    }
    public function voir()
    {
        $articles = Article::all();
        return view('options.voir', compact('articles'));
    }



    public function show()
    {
        $articles = Article::all();
        Category::create([
            "name" => "Categorie 1"
        ]);
        Category::create([
            "name" => "Categorie 2"
        ]);
        Category::create([
            "name" => "Categorie "
        ]);

        //dd($articles); // This will dump the data and stop execution
        return view('options.index', compact('articles'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            // 'categorie' => 'required|string|max:255',
            'contenu' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $article = new Article();
        $article->titre = $request->input('titre');
        $article->auteur = $request->input('auteur');
        // $article->categorie = $request->input('categorie');
        $article->contenu = $request->input('contenu');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/images');
            $filename = explode('/images', $path);
            $article->photo = $filename[1];
        }
        $article->save();

        return redirect()->route('options.index')->with('success', 'Article créé avec succès.');
    }
    public function index()
    {
        // $articles = Article::all();
        //dd($articles); // This will dump the data and stop execution
        return view('options.index', [
            'articles' => Article::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // Si l'article a une photo, la supprimer du stockage
        if ($article->photo) {
            Storage::disk('public')->delete($article->photo);
        }

        // Supprimer l'article de la base de données
        $article->delete();

        return redirect()->route('options.index')->with('success', 'Article supprimé avec succès.');
    }
}
