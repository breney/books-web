<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    function getAuthorById(Request $request){
        $authorID = Author::find($request->get('id'));

        return view('data.author',['author' => $authorID]);
    }

    function insertAuthors(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'age' => 'required',
            'nationality' => 'required|alphaNum|min:1',
            'country' => 'required|alphaNum|min:1'
        ]);

        Author::create([
            'name' => $request->get('name'),
            'age' => $request->get('age'),
            'nationality' => $request->get('nationality'),
            'country' => $request->get('country')
        ]);

        return view('admin.admin_home');
    }

    function deleteAuthor(Request $request){

        $authorID = Author::find($request->get('idAuthor'));
        if($authorID == null){
            return view('admin.admin_home');
        }
        $authorID->delete();
        return view('admin.admin_home');

    }

    function updateAuthor(Request $request){

        $authorID = Author::find($request->get('idAuthor'));

        if($authorID == null){
            return view('admin.admin_home');
        }
        $authorID->update(['name' => $request->get('name'),
            'age' => $request->get('age'),
            'nationality' => $request->get('nationality'),
            'country' => $request->get('country')]);

        return view('admin.admin_home');
    }

}
