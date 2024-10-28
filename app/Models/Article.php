<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use \App\Models\Image;
use phpDocumentor\Reflection\Types\Null_;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'price', 'category_id', 'user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //funzione per accettare o rifiutare un articolo 
    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }
    // meotodo statico che ci ritorna il numero degli articoli da revisonare
    public static function toBeRevisedCount()
    {
    return Article::where('is_accepted', null)->count();
    }
    //metodo dove un articolo ha tante immagini
    public function images() : HasMany
    {
        return $this->hasMany(Image::class);
    }
}
