<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
  public function index()
  {
    // $books = Book::all();
    $books = Book::paginate(10);

    return view('book.index', ['books' => $books]);
  }

  public function detail($id)
  {
    $book = Book::find($id);
    return view('book.detail', [
      'book' => $book,
    ]);
  }

  public function edit($id)
  {
    $book = Book::find($id);
    return view('book.edit', [
      'book' => $book,
    ]);
  }

  public function update(Request $request, $id)
  {
    try {
      DB::beginTransaction();

      $book = Book::find($request->input('id'));
      $book->name = $request->input('name');
      $book->status = $request->input('status');
      $book->author = $request->input('author');
      $book->publication = $request->input('publication');
      $book->read_at = $request->input('read_at');
      $book->note = $request->input('note');
      $book->save();

      DB::commit();

      return redirect('book')->with('status', '本を更新しました。');
    } catch (\Exception $ex) {
      DB::rollback();
      logger($ex->getMessage());
      return redirect('book')->withErrors($ex->getMessage());
    }
  }

  public function new()
  {
    return view('book.new');
  }

  public function create(Request $request)
  {
    try {
      Book::create($request->all());
      return redirect('book')->with('status', '本を作成しました。');
    } catch (\Exception $ex) {
      logger($ex->getMessage());
      return redirect('book')->withErrors($ex->getMessage());
    }
  }

  public function remove($id)
  {
    try {
      Book::find($id)->delete();
    return redirect('book')->with('status', '本を削除しました。');
    } catch (\Exception $ex) {
      logger($ex->getMessage());
      return redirect('book')->withErrors($ex->getMessage());
    }  
  }
}