<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//General erros
use App\Traits\ApiResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;

class ClotheCategoryController extends Controller
{
    use ApiResponse;
    /*
    *The service to consume the category service
    *@var AuthorService
    */

    public $categoriesService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoriesService)
    {
       $this->CategoryService = $categoriesService;
    }
    /**
     * Return list of Categories
     */
    public function index()
    {
        return $this->successReponse($this->CategoryService->getCategories());
    }
    /**
     * Create an instance of Category 
     */
    public function store(Request $request){
        return $this->successReponCse($this->CategoryService->createCategory($request->all()), Response::HTTP_CREATED);
    }
    /**
     * Return an specific Category
     */
    public function show($category){
        return $this->successReponse($this->CategoryService->getCategory($category));
     
    }
    /**
     * Update the information of an existing category
     */
    public function update(Request $request, $category){
        return $this->successReponse($this->CategoryService->editCategory($request->all(), $category));
    }
    /**
     * removes and existing category
     * change the state 
     */
    public function destroy($category)
    {
        return $this->successReponse($this->CategoryService-> destroyCategory($category));
    }

}
