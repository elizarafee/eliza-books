<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the books.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $books = Book::get(['id', 'title', 'authors', 'format', 'original_price', 'selling_price', 'condition', 'sold', 'picture']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to get the books.']);
        }

        return response()->json(['status' => 'success', 'data' => $books]);
    }


    /**
     * Store a newly created book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:150',
            'authors' => 'required|max:250',
            'format' => 'required|max:30',
            'original_price' => 'nullable|numeric',
            'selling_price' => 'required|numeric',
            'condition' => 'required|max:30',
            'picture' => 'nullable|image|max:2048',
        ]);

        try {

            $book_data = [
                'title' => $request->get('title'),
                'authors' => $request->get('authors'),
                'format' => $request->get('format'),
                'original_price' => $request->get('original_price') ? $request->get('original_price') : 0,
                'selling_price' => $request->get('selling_price'),
                'condition' => $request->get('condition'),

                'created_at' => date('Y-m-d H:i:s')
            ];

            $picture_title = null;
            if ($request->hasFile('picture')) {
                $picture_title = 'book-' . time() . '.' . $request->file('picture')->getClientOriginalExtension();
                $request->file('picture')->move('images/', $picture_title);
                $book_data['picture'] = $picture_title;
            }


            $book = Book::create($book_data);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to store book.']);
        }

        return response()->json(['status' => 'success', 'data' => $book, 'message' => 'Book stored successfully.']);
    }

    /**
     * Display the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $books = Book::find($id);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to get the book details.']);
        }

        return response()->json(['status' => 'success', 'data' => Book::find($id)]);
    }

    /**
     * Update the specified book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // this method's operation not thoroughly tested 

        $this->validate($request, [
            'title' => 'required|max:150',
            'authors' => 'required|max:250',
            'format' => 'required|max:30',
            'original_price' => 'nullable|numeric',
            'selling_price' => 'required|numeric',
            'condition' => 'required|max:30',
            'picture' => 'nullable|image|max:2048',
        ]);

        try {
            $update_book_data = [
                'title' => $request->get('title'),
                'authors' => $request->get('authors'),
                'format' => $request->get('format'),
                'original_price' => $request->get('original_price') ? $request->get('original_price') : 0,
                'selling_price' => $request->get('selling_price'),
                'condition' => $request->get('condition'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($request->hasFile('picture')) {

                $book = Book::find($id);
                $old_picture = $book->picture;
                if ($old_picture) {
                    File::delete('images/' . $old_picture);
                }

                $picture_title = 'book-' . time() . '.' . $request->file('picture')->getClientOriginalExtension();
                $request->file('picture')->move('images/', $picture_title);
                $update_book_data['picture'] = $picture_title;
            }

            $updated = Book::where('id', $id)->update($update_book_data);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to update the book details.']);
        }

        return response()->json(['status' => 'success', 'data' => Book::find($id), 'message' => 'Book details updated successfully.']);
    }


    /**
     * Mark the specified book as sold
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sold($id)
    {
        try {
            Book::where('id', $id)->update(['sold' => 1, 'updated_at' => date('Y-m-d H:i:s')]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to mark the book as sold.']);
        }

        return response()->json(['status' => 'success', 'data' => Book::find($id), 'message' => 'Book marked as sold successfully.']);
    }



    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $book = Book::find($id);
            $picture = $book->picture;
            if ($picture) {
                File::delete('images/' . $picture);
            }
            $book->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Failed to remove the book.']);
        }

        return response()->json(['status' => 'success', 'message' => 'Book removed successfully.', 'data' => null]);
    }
}
