<?php

namespace App\Traits;

trait APIResponse
{
	protected $response;

	public function __construct()
	{
		$this->response = $this;
	}

    public function response($content, $code)
    {
        return response()->json($content)->setStatusCode($code);
    }

    public function responseWithPagination(\Illuminate\Contracts\Pagination\Paginator $paginator)
    {
        $code = 200;
        $content = [
            'code' => $code,
            'status' => 'OK',
            'data' => $paginator->getCollection(),
            'pagination' => [
                'total' => $paginator->total(),
                'perPage' => $paginator->perPage(),
                'currentPage' => $paginator->currentPage(), 
                'from' => $paginator->firstItem(),
                'to' => $paginator->lastItem(),
                'lastPage' => $paginator->lastPage(),
                'nextPageURL' => $paginator->nextPageUrl(),
                'prevPageURL' => $paginator->previousPageUrl(),
            ]
        ];
        return $this->response($content, $code);
    }

    public function responseEmptyResource()
    {
        $code = 204;
        $content = [
            'code' => $code,
            'status' => 'No Content',
        ];
        return $this->response($content, $code);
    }

    public function responseCreated($data)
    {
        $code = 201;
        $content = [
            'code' => $code,
            'status' => 'Created',
            'data' => [
                $data
            ]
        ];
        return $this->response($content, $code);
    }

    public function responseInternalError()
    {
        $code = 500;
        $content = [
            'code' => $code,
            'status' => 'Internal Server Error'
        ];
        return $this->response($content, $code);
    }

    public function responseSpecificResource($data)
    {
        $code = 200;
        $content = [
            'code' => $code,
            'status' => 'OK',
            'data' => $data
        ];
        return $this->response($content, $code);
    }

    public function responseBadRequest()
    {
        $code = 400;
        $content = [
            'code' => $code,
            'status' => 'Bad Request'
        ];
        return $this->response($content, $code);
    }

    public function responseUpdated($data)
    {
        $code = 200;
        $content = [
            'code' => $code,
            'status' => 'OK',
            "message" => "Update successful",
            'data' => $data
        ];
        return $this->response($content, $code);
    }

    public function responseDeleted()
    {
        $code = 200;
        $content = [
            'code' => $code,
            'status' => 'OK',
            "message" => "Delete successful",
        ];
        return $this->response($content, $code);
    }

    public function responseValidationFail($issues)
    {
        $code = 422;
        $content = [
            'code' => $code,
            'status' => 'Unprocessable Entity',
            "issues" => $issues,
        ];
        return $this->response($content, $code);
    }
}