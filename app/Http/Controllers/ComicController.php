<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Ti passo lo slug dell'oggetto, prendi gli oggetti con model comic. Se ne trovi uno il cui slug è uguale allo slug che passo alla funzione, restituiscimi il primo che trovi come oggetto. Per questo metto funzione first(). Se avessi messo get() mi avrebbe restituito una collection, e mi avrebbe dato la pagina errore
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
