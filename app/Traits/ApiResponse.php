<?php
    namespace App\Traits;

    use Illuminate\Http\Response;
    // General Erros 

  
    trait ApiResponse
    {

        /**
         * Build a valid response
         * @param  string|array $data
         * @param  int $code
         * @return Illuminate\Http\JsonResponse
         */
        public function validResponse($data, $code = Response::HTTP_OK)
        {
            return response()->json(['data' => $data], $code);
        }
        //   /**
        //      * Build a success response
        //      * @param string|array $data
        //      * @param int $code
        //      * @return  Illumen\Http\Response
        // */
        public function successReponse($data, $code = Response::HTTP_OK){
            return response($data, $code)-> header('Content-Type', 'application/json');
        }
        //    /**
        //      * Build a success response
        //      * @param string $message
        //      * @param int $code
        //      * @return  Illumen\Http\JsonResponse
        //      */
        public function errorResponse($message, $code){
            return response()-> json(['error' => $message, 'code' => $code], $code);
        }

        //    /**
        //      * Build a success response
        //      * @param string $message
        //      * @param int $code
        //      * @return  Illumen\Http\JsonResponse
        //      */
        public function errorMessage($message, $code){
            return response($message, $code) -> header('Content-Type', 'application/json');
        }
    }

