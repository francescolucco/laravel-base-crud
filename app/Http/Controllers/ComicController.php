<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // recupero i comic TUTTI dal db e li do indietro come model alla view

        $comics = Comic::orderBy('id', 'desc')->paginate(4);

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // Con il nostro form atterriamo qui, con i dati, inviati una volta premuto il bottone SUBMIT
        // la classe Request prende tutto quello che arriva e le inizializza nell'istanza $request
        // andiamo a vederla con la funzione d and d
        // dd($request);
        $request->validate(
            $this->validationCamp(),
            $this->validationErrors()
        );
        // una volta accertato che tutto funziona inizializzo una variabile $data al cui interno salvo i dati della $request
        // dump($request);
        $data = $request->all();
        // data è un array associativo
        // dump($data);
        // così non mi passa solo i dati "name" del form e non tutti gli altri mille attributi che ora non mi servono
        $new_comic = new Comic();
        $new_comic->title = $data['title'];
        $new_comic->thumb = $data['thumb'];
        $new_comic->price = $data['price'];
        $new_comic->series = $data['series'];
        $new_comic->sale_date = $data['sale_date'];
        $new_comic->type = $data['type'];
        $new_comic->description = $data['description'];
        // Attenzione: dentro la parentesi non vado a prendere il titolo del $data, ma dal $new_comic stesso, perché ho bisogno di indicizzare una pagina nuova con i dati appena inseriti
        $new_comic->slug = Str::slug($new_comic->title, '-');
        // $data['slug'] = $this->createSlug($data['title']);
        // dd( $new_comic);
        $new_comic->save();

        // Una volta salvato l'elenco nel db torniamo alla pagina di descrizione del fumetto, per cui devo passargli anche l'istanza del fumetto
        return redirect()->route('comics.show', $new_comic);

        // Se invece voglio tornare all'elenco, allora posso mettere solo la rotta index, senza entità
        // return redirect()->route('comics.index');

        // se nel Model ho utilizzato la proprietà protetta $fillable, qui, invece di inserire tutte le proprietà dei dati, posso inserire direttamente questa riga di codice, si arrangia lui dividere i dati in base alle voci presenti nell'array $fillable nel MODEL
        // Diventa:
        // $data = $request->all();

        // $new_comic = new Comic();
        // $data['slug'] = Str::slug($data['slug'], '-');
        // $new_comic->fill($data);
        // $new_comic->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Ti passo lo slug dell'oggetto, prendi gli oggetti con model comic se ne trovi uno il cui slug è uguale allo slug che passo alla funzione, restituiscimi il primo che trovi come oggetto. Per questo metto funzione first(). Se avessi messo get() mi avrebbe restituito una collection, e mi avrebbe dato la pagina errore
    // public function show($slug)
    // {
    //     $comic = Comic::where('slug', $slug)->first();
    //     // dump($comic);
    //     return view('comics.show', compact('comic'));
    // }

    // Ti passo l'id, fai un find(), restituiscimi l'intero oggetto che corrisponde a quella id
    public function show($id)
    {
        $comic = Comic::find($id);
        // dump($comic);
        if($comic){
            return view('comics.show', compact('comic'));
        }
        abort(404, 'Pagina in manutenzione');
    }


    // Ti passo il Model e i dati, fai un find() e se lo trovi restituiscimi l'oggetto e il suo id che andrà nell'url
    // public function show(Comic $comic)
    // {
    //     return view('comics.show', compact('comic'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.edit', compact('comic'));
        }
        abort(404, 'Impossibile modificare la pagina');
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {   
        $request->validate(
            $this->validationCamp(),
            $this->validationErrors()
        );
        // prendo tutte le info che arrivano
        $data = $request->all();
        // passiamo lo slug perchè dobbiamo ricrearlo dopo aver modificato i dati
        // $data['slug'] = Str::slug($data['title'], '-');
        $data['slug'] = $this->createSlug($data['title']);

        // faccio  un comic apdate di data
        $comic->update($data);
        // quindi faccio un reindirizzamento
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with('deleted', "Il fumetto {$comic->title} è stato eliminato correttamente");
    }

    private function createSlug($string){
        return Str::slug($string, '-');
    }

    private function validationCamp(){
        return [
            'title'=>'required|min:4|max:50',
            'thumb'=>'required|url',
            'price'=>'required|numeric',
            'series'=>'required|min:2|max:50',
            'sale_date'=>'required|date',
            'type'=>'required|min:2|max:20',
            'description'=>'required|min:2',
        ];
    }
    
    private function validationErrors(){
        
        return [
            'title.required'=>'Il titolo è un campo obbligatorio',
            'title.min'=>'Il titolo deve essere lungo almento :min caratteri',
            'title.max'=>'Il titolo deve essere lungo almento :max caratteri',

            'thumb.required'=>"L'URL è un campo obbligatorio",
            'thumb.url'=>"Il campo deve contenere una URL valida",

            'price.required'=>'Il prezzo è un campo obbligatorio',
            'price.numeric'=>'Il prezzo deve essere un numero',

            'series.required'=>'La serie è un campo obbligatorio',
            'series.min'=>'La serie deve essere lungo almento :min caratteri',
            'series.max'=>'La serie deve essere lungo almento :max caratteri',

            'sale_date.required'=>'la data è un campo obbligatorio',
            'sale_date.date'=>'Inserire una data valida',

            'type.required'=>'Il tipo è un campo obbligatorio',
            'type.min'=>'Il tipo deve essere lungo almento :min caratteri',
            'type.max'=>'La tipologia di fumetto deve essere lunga almento :max caratteri',

            'description.required'=>'La sescrizione è un campo obbligatorio',
            'description.min'=>'La sescrizione deve essere lungo almento :min caratteri',
            'description.max'=>'La descrizione deve essere lungo almento :max caratteri',
        ];
    }
}
