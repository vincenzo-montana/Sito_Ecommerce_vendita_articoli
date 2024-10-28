<?php

namespace App\Http\Controllers;

use App\Mail\BecomeRevisor;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    // funzione che ci restituisce nella vista index dell revisor tutti gli articoli che hanno is_accepted=null 
    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }
    //funzione con dipendenza inniettata che passa il valore true ad set accepted
    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('message', "hai accettato l'articolo $article->title");
    }
    //funzione con dipendenza inniettata che passa il valore false ad set accepted
    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('message', "l'articolo $article->title è stato rifiutato");
    }
    //funzione che serve per mandare una richiesta per far diventare un utente revisore all'amministratore
    //con il send richiamiamo l'oggetto di classe becomerevisor presente nella cartella mail che specificherà il messaggio da mandare
    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('message', 'complimenti, hai richiesto di diventare revisore');
    }
    //rendiamo effetivamente un utente revisore 
    public function makeRevisor(User $user) 
    {
        Artisan::call('app:make-user-revisor', ['email'=> $user->email]);
        return redirect()->back();
    }
}
