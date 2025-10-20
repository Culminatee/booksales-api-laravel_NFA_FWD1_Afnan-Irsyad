<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function show(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource by id',
            'data' => $author
        ]);
    }

    public function destroy(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found",
            ], 404);
        }

        if ($author->cover_photo) {
            //delete from storage
            Storage::disk('public')->delete('authors/' . $author->cover_photo);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete resource successfully'
        ]);
    }

    public function update(string $id, Request $request) {
        // mencari data
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Resource not found",
            ], 404);
        }

        //validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'biodata' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }


        //siapkan data yang ingin diupdate
        $data = [
            'name' => $request->name,
            'biodata' => $request->biodata,
        ];

        //handle image (upload & delete image)
        if ($request->hasFile('cover_photo')) {
            $image = $request->file('cover_photo');
            $image->store('authors', 'public');

            if ($author->cover_photo) {
                Storage::disk('public')->delete('authors/' . $author->cover_photo);
            }

            $data['cover_photo'] = $image->hashName();
        }

        //update data baru ke database
        $author->update($data);

        return response()->json([
            'success' => true,
            'message' => "resource updated successfully!",
            'data' => $author
        ], 200);

    }
}
