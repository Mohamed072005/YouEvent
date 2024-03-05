<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function index()
    {
        return view('createCategorie');
    }
    public function store(Request $request){
        $request->validate([
            'categorie_name' => ['required', 'unique:categories']
        ]);
//
        Categorie::create([
            'categorie_name' => $request->input('categorie_name')
        ]);

//        $response = Categorie::all();
//
//        return response()->json($response);
        return redirect()->route('to.add.categorie')->with('addSuccess', 'Your Category Created Successfully');
    }

    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        if ($categorie){
            return response()->json('delete success');
        }else{
            return response()->json('wrong');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categorie_name' => ['required', 'unique:categories']
        ]);

        $categorie = Categorie::find($id);
        $categorie->update([
            'categorie_name' => $request->categorie_name
        ]);

        $categorie2 = Categorie::find($id);
        return response()->json($categorie2);
    }
}
