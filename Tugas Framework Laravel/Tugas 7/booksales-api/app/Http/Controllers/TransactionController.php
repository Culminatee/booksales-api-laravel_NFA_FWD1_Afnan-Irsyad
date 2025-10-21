<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller {
    // hanya admin yang bisa lihat semua transaksi
    public function index() {
        $transactions = Transaction::with('user', 'book')->get();

        if ($transactions->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "GET all resources",
            "data" => $transactions
        ]);
    }

    // create transaksi
    public function store(Request $request) {
        $user = auth('api')->user();

        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'data' => $validator->errors()
            ], 422);
        }

        $book = Book::find($request->book_id);

        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok barang tidak cukup!'
            ], 400);
        }

        $totalAmount = $book->price * $request->quantity;

        $book->stock -= $request->quantity;
        $book->save();

        $uniqueCode = 'ORD-' . str_pad(Transaction::count() + 1, 4, '0', STR_PAD_LEFT);

        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully!',
            'data' => $transaction
        ], 201);
    }

    // lihat detail transaksi milik customer
    public function show(string $id) {
        $user = auth('api')->user();

        $transaction = Transaction::with('book')
            ->where('id', $id)
            ->where('customer_id', $user->id)
            ->first();

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource by id',
            'data' => $transaction
        ]);
    }

    // update transaksi milik customer
    public function update(Request $request, string $id) {
        $user = auth('api')->user();

        $transaction = Transaction::where('id', $id)
            ->where('customer_id', $user->id)
            ->first();

        if (!$transaction) {
            return response()->json([
                "success" => false,
                "message" => "Transaction not found or not owned by you.",
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $book = Book::find($request->book_id);
        if (!$book) {
            return response()->json([
                'success' => false,
                'message' => 'Book not found.'
            ], 404);
        }

        $totalAmount = $book->price * $request->quantity;

        $transaction->update([
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            'success' => true,
            'message' => "Transaction updated successfully!",
            'data' => $transaction
        ], 200);
    }

    // hapus transaksi
    public function destroy($id) {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found!'
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully!'
        ]);
    }
}
