<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    function getBookById(Request $request){
        $bookID = Book::find($request->get('id'));

        return view('data.book',['book' => $bookID]);
    }

    function getBooks(){
        $books = Book::all();

        return view('pages.books', ['books' => $books]);
    }

    function insertBooks(Request $request){

        $this->validate($request,[
            'title' => 'required',
            'genre' => 'required',
            'num' => 'required|alphaNum|min:1',
            'edition' => 'required|alphaNum|min:1',
            'autorId' => 'required|alphaNum|min:1',
        ]);

        Book::create(['title' => $request->get('title'),
            'genre' => $request->get('genre'),
            'num_pages' => $request->get('num'),
            'publish_date' => $request->get('date'),
            'img_url' => $request->get('img_url'),
            'edition' => $request->get('edition'),
            'author_id' => $request->get('autorId')
        ]);

        return view('admin.admin_home');
    }

    function deleteBook(Request $request){

        $bookID = Book::find($request->get('idBook'));

        if($bookID == null){
            return view('admin.admin_home');
        }
        $bookID->delete();
        return view('admin.admin_home');
    }

    function updateBook(Request $request){

       $bookID = Book::find($request->get('idBook'));

        if($bookID == null){
            return view('admin.admin_home');
        }
        $bookID->update(['title' => $request->get('title'),
            'genre' => $request->get('genre'),
            'num_pages' => $request->get('num'),
            'publish_date' => $request->get('date'),
            'img_url' => $request->get('img_url'),
            'edition' => $request->get('edition')]);

        return view('admin.admin_home');
    }
}
