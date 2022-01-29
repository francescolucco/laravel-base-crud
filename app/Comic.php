<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    //se voglio che il metodo store della CRUD sia più coinciso, posso creare qui una proprietà protetta (che sarà quindi condivisa solo con i discendenti della classe ma non al di fuore della relazinoe di ereditarietà).
    // Inseriamo quindi la proprietà $fillable = ad un array che contiente tutti i nomi delle colonne, sempearati da virgola.
    protected $fillable = [
        'title', 
        'thumb', 
        'price', 
        'series', 
        'sale_date', 
        'type', 
        'description', 
        'slug' 
    ];
}
