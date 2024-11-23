<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Category;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::with('categories')->get();
        $members = Member::all();
        $categories = Category::all();

        return view('perpus.dashboard-library', compact('books', 'members', 'categories'));
    }
}
