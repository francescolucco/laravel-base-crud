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

        $comics = Comic::paginate(4);

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

        return redirect()->route('comics.index');
    }

    private function createSlug($string){
        return Str::slug($string, '-');
    }
}
