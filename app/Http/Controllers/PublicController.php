<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //funzione che ci ritorna in homepage gli ultimi 6 articoli creati e che sono stati accettati dal revisore
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
        return view('homepage' , compact('articles'));     
    }
    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
    
}
