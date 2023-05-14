<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'reviewsForMovie']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review($request->all());
        $review->user_id = auth()->id();
        $review->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        
        // Ensure the authenticated user is the owner of the review
        if(auth()->user()->id !== $review->user_id){
            abort(403, 'Unauthorized action.');
        }

        return view('reviews.edit', compact('review'));
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        // Ensure the authenticated user is the owner of the review
        if(auth()->user()->id !== $review->user_id){
            abort(403, 'Unauthorized action.');
        }

        $review->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        // Ensure the authenticated user is the owner of the review
        if(auth()->user()->id !== $review->user_id){
            abort(403, 'Unauthorized action.');
        }

        $review->delete();

        return back();
    }

    public function reviewsForMovie($movieId)
    {
        $reviews = Review::where('movie_id', $movieId)
            ->with('user') // Fetch the user that made each review
            ->get();

        // Log the reviews
        Log::info('Reviews: ', $reviews->toArray());

        return response()->json($reviews);
    }
    
    public function myReviews()
    {
        $reviews = Review::where('user_id', Auth::user()->id)->get();


        return view('user_page.my-reviews', ['reviews' => $reviews]);
    }
}
