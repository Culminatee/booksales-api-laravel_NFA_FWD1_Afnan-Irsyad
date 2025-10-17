<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    // GET all genres
    public function index()
    {
        $genres = Genre::all();

        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $genres
        ], 200);
    }

    // POST create new genre
    public function store(Request $request)
    {
        // validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string'
        ]);

        // check validator error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // insert data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // response
        return response()->json([
            'success' => true,
            'message' => "Resource added successfully!",
            'data' => $genre
        ], 201);
    }

    // GET detail genre by id
    public function show(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource by id',
            'data' => $genre
        ]);
    }

    // DELETE genre
    public function destroy(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found",
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete resource successfully'
        ]);
    }

    // PUT/PATCH update genre
    public function update(string $id, Request $request)
    {
        // mencari data
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found",
            ], 404);
        }

        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // update data baru ke database
        $genre->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => "Resource updated successfully!",
            'data' => $genre
        ], 200);
    }
}
