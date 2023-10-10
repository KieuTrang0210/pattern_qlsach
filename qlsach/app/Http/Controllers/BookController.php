<?php

namespace App\Http\Controllers;

use App\Factories\LibraryFactory;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Database\DatabaseConnectionManager;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    private $dbConnection;
    private $libraryFactory;

    public function __construct(DatabaseConnectionManager $dbConnection, LibraryFactory $libraryFactory)
    {
        $this->dbConnection = $dbConnection;
        $this->libraryFactory = $libraryFactory;
    }

    public function index()
    {
        // Lấy danh sách dữ liệu từ bảng
        $connection = $this->dbConnection->getConnection();
        $books = $connection->table('books')
                            ->join('categories', 'books.category_id', '=', 'categories.id')
                            ->select('books.*', 'categories.name as category_name')
                            ->orderBy('books.id', 'desc')
                            ->get();

        return view('books.index', compact('books'));
    }

    public function create(){
        $connection = $this->dbConnection->getConnection();
        $categories = $connection->table('categories')->get();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request){

        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => 'required',
            'author' => 'required',
            'published_date' => 'required',
            'quantity' => 'required',
            'category_id' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->route('books.create')->with('error', 'Invalid input data!');
        }
    
        $data['published_date'] = date('Y-m-d', strtotime($data['published_date']));

        $book = $this->libraryFactory->create("book", $data);
        $book->save();

        if($book instanceof Book) {
            return redirect()->route('books.index')->with('success', 'Create success!');
        } else {
            return redirect()->route('books.create')->with('error', 'Create failed!');
        }
    }

    public function edit($id){
        
    }



}

