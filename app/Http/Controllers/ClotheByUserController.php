<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//General erros
use App\Traits\ApiResponse;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\ClothesByUserService;
use App\Services\CategoryService;



class ClotheByUserController extends Controller
{
    use ApiResponse;

    public $clotheByUserService;
    public $categoryService;



   /**
     * Create a new controller instance.
     *
     * @return void
   */
    public function __construct(ClothesByUserService $clotheByUserService, CategoryService $categoryService)
    {
       $this->ClothesByUserService = $clotheByUserService;
       $this->CategoryService = $categoryService;
    }
    
   /**
     * Return list of Categories
   */
    public function index(){
       return $this->successReponse($this->ClothesByUserService->getClotheByUsers());
    }
    /**
     * Create an instance of CloteByUserIN 
  */
    public function store(Request $request){
       $result = $this->CategoryService->getCategory($request->category_id);
       $alo = json_decode($result);
       if(sizeof($alo->data) != '0'){
         return $this->successReponse($this->ClothesByUserService->createClotheByUsers($request->all()), Response::HTTP_CREATED);
       }
       return $this->errorResponse("Not found category", 400);
    }
    /**
     * Return an specific CloteByUserIN
     */
    public function show($CloteByUserIN){
      return $this->successReponse($this->ClothesByUserService->getClotheByUser($CloteByUserIN));
    }
    /**
     * Update the information of an existing CloteByUserIN
     */
    public function update(Request $request, $CloteByUserIN){
      return $this->successReponse($this->ClothesByUserService->editClotheByUser($request->all(), $CloteByUserIN));
    }
    /**
     * removes and existing CloteByUserIN
     * change the state 
     */
    public function destroy($CloteByUserIN)
    {
      return $this->successReponse($this->ClothesByUserService-> destroyClotheByUser($CloteByUserIN));
    }

}
