<?php

namespace App\Http\Controllers;

use App\Factories\LibraryFactory;
use App\Iterator\CategoryBooksIterator;
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
        $categories = $connection->table('categories')->get();
        $books = $connection->table('books')
                            ->join('categories', 'books.category_id', '=', 'categories.id')
                            ->select('books.*', 'categories.name as category_name')
                            ->orderBy('books.id', 'desc')
                            ->get();

        return view('books.index', compact('books', 'categories'));
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

    // lọc sách theo danh mục
    public function filterByCategory($category_id){

        $connection = $this->dbConnection->getConnection();

        $categories = $connection->table('categories')->get();

        // lấy danh sách 
        $booksList = $connection->table('books')
                ->join('categories', 'books.category_id', '=', 'categories.id')
                ->select('books.*', 'categories.name as category_name')
                ->orderBy('books.id', 'desc')
                ->get();

        $category_id = intval($category_id);

        // lọc sách theo danh mục 
        $books = new CategoryBooksIterator($booksList->getIterator(), $category_id);

        // danh mục được chọn trong select-option
        $selectedCategory = $categories->where('id', $category_id)->first();

        return view('books.index', compact('books', 'categories', 'selectedCategory', 'category_id'));
    }

    // xóa
    public function delete($id){
        $book = Book::where('id', $id)->first();
        if($book) {
            $book->delete();
            return redirect()->route('books.index')->with('success', 'Department deleted successfully');
        } else {
            return redirect()->route('books.index')->with('error', 'Department deleted failed!');
        }
    }

}

