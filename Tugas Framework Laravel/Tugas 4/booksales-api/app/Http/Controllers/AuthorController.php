<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index() {
    $authors = Author::all();

        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $authors
        ], 200);
    }

    public function store(Request $request) {
        // validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'biodata' => 'required|string'
        ]);

        // check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // upload image
        $image = $request->file('cover_photo');
        $image->store('authors', 'public');

        // insert data
        $author = Author::create([
            'name' => $request->name,
            'cover_photo' => $image->hashName(),
            'biodata' => $request->biodata,
        ]);

        // response
        return response()->json([
            'success' => true,
            'message' => "resource added successfully!",
            'data' => $author
        ], 201);
    }
}
