<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     *///nome comando da lanciare nel terminale per farlo partire 
    protected $signature = 'app:make-user-revisor {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rende un utente revisore';

    /** //funzione che partirà quando verrà lanciato il comando da terminale
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();
        if (!$user){
            return $this->error ('utente non trovato');
        }
        $user->is_revisor = true;
        $user->save();
        $this->info("l'utente {$user->name} è ora revisore");
    }
}
