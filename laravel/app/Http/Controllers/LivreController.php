<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;
use App\Http\Resources\LivreApi;
use Illuminate\Support\Facades\Storage;

class LivreController extends Controller
{

    /**
     * return all books
     *
     */
    public function index()
    {
        // return view('livre', [
            //     'livres' => Livre::all()
            // ]);
            $livres = Livre::all();
            return view('livre.index', compact('livres'));

        }

    public function indexPublic()
    {
            $livres = Livre::all();
            return view('public.index', compact('livres'));
        }

        /**
         * return all book in json format
         *
         */
    public function indexApi()
    {
        $livres = Livre::all();
        // return LivreApi::collections($livres);
        return response()->json($livres);

    }

        /**
         * return a book
         *
         */
        public function show($id)
        {
            $livre = Livre::findOrFail($id);
            return view('livre.show', [
                'livre' => $livre
            ]);
        }

        /**
        * return le formulaire de création d'un livre
        */
        public function create()
        {
            return view('livre.create');
        }

        /**
         * register a new book
         * @param Request $request
         *
         */
        public function store (request $request) {

            $original_filename = $request->image->getClientOriginalName();
            $filename = time().$original_filename;

            $request -> validate([
                'title' => 'required',
                'author' => 'required',
                'desc' => 'required',
                'price' => 'required',
                'image' => 'required'
            ]);

         $livre = new Livre([
            'title' => $request->get('title'),
            'author' => $request->get('author'),
            'desc' => $request->get('desc'),
            'price' => $request->get('price'),
            'image' =>   $request->file('image')->storeAs(
                'image',
                $filename,
                'public'
            ),
        ]);

        $livre->save();
        return redirect('/livre')->with('success', 'Livre enregistré!');
    }



    /**
     * Return le formulaire de modification
     */

    public function edit($id)
    {
        $livre = livre::findOrFail($id);
        return view('livre.edit', compact('livre'));
    }

    /**
     * Update a book
     * @param Request $request
     * @param $id
     *
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $livre = Livre::findOrFail($id);
        if ($request->hasFile('image')) {
            $original_filename = $request->image->getClientOriginalName();
            $filename = time().$original_filename;
            Storage::disk('public')->delete($livre->image);
            $input['image'] = $request->file('image')->storeAs(
                'image',
                $filename,
                'public'
            );
        }
        $livre->update($input);
        return redirect('/livre')->with('success', 'Livre modifié!');

        }

    /**
     * Delete a book
     * @param $id
     *
     */
    public function destroy($id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return redirect('/livre')->with('success', 'Livre supprimé!');
    }


}
