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
        return redirect()->route('to.add.categorie')->with('addSuccess', 'Your Categorie Created Successfully');
    }

    public function getCategorie()
    {
        $categories = Categorie::all();
        return view('categorie', compact('categories'));
    }

    public function destroy($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        if ($categorie){
            return redirect()->route('get.categorie')->with('successResponse', 'Your Categorie Deleted Successfully');
        }else{
            return redirect()->route('get.categorie')->with('warningResponse', 'Warning');
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

        return redirect()->route('get.categorie')->with('successResponse', 'Your Categorie Updated Successfully');
    }
}
