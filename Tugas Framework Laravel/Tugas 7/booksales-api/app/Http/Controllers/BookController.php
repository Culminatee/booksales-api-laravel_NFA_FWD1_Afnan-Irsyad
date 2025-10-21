<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // GET all books
    public function index()
    {
        $books = Book::all();

        if ($books->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $books
        ]);
    }

    // POST create new book
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 422);
        }

        // Upload image
        $image = $request->file('cover_photo');
        $image->store('books', 'public');

        // Simpan data ke tabel books
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(),
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Book added successfully!',
            'data' => $book,
        ], 201);
    }

    // GET detail book by id
    public function show(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource by id',
            'data' => $book
        ]);
    }

    // PUT/PATCH update book
    public function update(string $id, Request $request)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found",
            ], 404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'cover_photo' => 'sometimes|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'sometimes|required|exists:genres,id',
            'author_id' => 'sometimes|required|exists:authors,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // Jika ada gambar baru, hapus yang lama dan upload yang baru
        if ($request->hasFile('cover_photo')) {
            // hapus file lama
            if ($book->cover_photo && Storage::disk('public')->exists('books/' . $book->cover_photo)) {
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }

            $image = $request->file('cover_photo');
            $image->store('books', 'public');
            $book->cover_photo = $image->hashName();
        }

        // Update field lain
        $book->update($request->except('cover_photo'));

        return response()->json([
            'success' => true,
            'message' => "Resource updated successfully!",
            'data' => $book
        ], 200);
    }

    // DELETE book
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found",
            ], 404);
        }

        // Hapus cover photo dari storage
        if ($book->cover_photo && Storage::disk('public')->exists('books/' . $book->cover_photo)) {
            Storage::disk('public')->delete('books/' . $book->cover_photo);
        }

        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete resource successfully'
        ]);
    }
}
