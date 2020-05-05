<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * @SWG\Get(
     *   path="/categories",
     *   tags={"Categories"},
     *   operationId="get_categories",
     *   summary="Categories List",
     *   @SWG\Response(
     *    response=200,
     *    description="success",
     *   ),
     *   @SWG\Response(
     *    response=400,
     *    description="error",
     *   ),
     *  )
     */
    public function index()
    {
        return CategoriesResource::collection(Category::active()->paginate(5));
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
        //
    }

    /**
     * @SWG\Get(
     *   path="/categories/{id}/",
     *   tags={"Categories"},
     *   operationId="category_posts",
     *   summary="Show Category Posts",
     *   @SWG\Parameter(
     *    name="id",
     *    in="path",
     *    description="Category ID",
     *    required=true,
     *    type="string",
     *  ),
     *   @SWG\Response(
     *    response=200,
     *    description="success",
     *   ),
     *   @SWG\Response(
     *    response=400,
     *    description="error",
     *   ),
     *  )
     * @param Category $category
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(Category $category)
    {
        return PostsResource::collection($category->posts()->paginate(5));
    }

    /**
     * @SWG\Get(
     *   path="/posts/{id}/",
     *   tags={"Post"},
     *   operationId="show_post",
     *   summary="Show Post Details",
     *   @SWG\Parameter(
     *    name="language",
     *    description="App Language",
     *    in= "header",
     *    required=true,
     *    type="string",
     *    enum={"ar", "en"}
     *  ),
     *   @SWG\Parameter(
     *    name="id",
     *    in="path",
     *    description="Post ID",
     *    required=true,
     *    type="string",
     *  ),
     *   @SWG\Response(
     *    response=200,
     *    description="success",
     *   ),
     *   @SWG\Response(
     *    response=400,
     *    description="error",
     *   ),
     *  )
     * @param Post $post
     * @return PostResource
     */
    public function showPost(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
