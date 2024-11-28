<?php

if(!function_exists('paginateSuccessResponse'))
{
    function paginateSuccessResponse($data,$message,$code = 200)
    {
        $meta = [
            'total' => $data->total(),
            'count' => $data->count(),
            'per_page' => $data->perPage(),
            'current_page' => $data->currentPage(),
            'total_pages' => $data->lastPage(),
        ];
        return response()->json(['status' => true,'data' => $data,'meta' => $meta,'message' => $message],$code);
    }
}

if(!function_exists('successResponse'))
{
    function successResponse($data,$message,$code = 200)
    {
        return response()->json(['status' => true,'data' => $data,'message' => $message],$code);
    }
}

if(!function_exists('messageSuccessResponse'))
{
    function messageSuccessResponse($message,$code = 200)
    {
        return response()->json(['status' => true, 'message' => $message],$code);
    }
}

if(!function_exists('messageErrorResponse'))
{
    function messageErrorResponse($message,$code = 400)
    {
        return response()->json(['status' => true, 'message' => $message],$code);
    }
}
