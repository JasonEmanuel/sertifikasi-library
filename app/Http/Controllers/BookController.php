<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $books = Book::with(['categories', 'member'])
            ->when($request->category_id, function ($query) use ($request) {
                $query->whereHas('categories', function ($query) use ($request) {
                    $query->where('categories.id', $request->category_id);
                });
            })
            ->get();
    
        return view('book.index', compact('books', 'categories'));
    }
       

    public function create()
    {
        $members = Member::all(); 
        $categories = Category::all(); 
        return view('book.book-create', compact('members', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|numeric',
            'categories' => 'required|array', 
            'member_id' => 'nullable|exists:members,id',
        ]);
    
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'member_id' => $request->member_id,
        ]);
    
        $book->categories()->attach($request->categories); 
    
        return redirect()->route('books.index')->with('success', 'Book created successfully');
    }     

    public function show($id)
    {
        $book = Book::with('categories')->findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::with('categories')->findOrFail($id);
        $members = Member::all(); 
        $categories = Category::all(); 

        return view('book.book-edit', compact('book', 'categories', 'members'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|numeric',
            'categories' => 'required|array',
            'member_id' => 'nullable|exists:members,id',
        ]);
    
        $book = Book::findOrFail($id);
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
            'member_id' => $request->member_id,
        ]);
    
        $book->categories()->sync($request->categories); 
    
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }
    
    
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->categories()->detach();
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
