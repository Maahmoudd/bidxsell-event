<?php

namespace App\Http\Controllers;


use App\Actions\IFlattenJsonAction;
use App\Http\Requests\JsonFlattenerRequest;
use Symfony\Component\HttpFoundation\Response;

class JsonFlattenerController extends ApiBaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(JsonFlattenerRequest $request, IFlattenJsonAction $flattenJsonAction)
    {
        $flattened = $flattenJsonAction->handle($request->validated());
        return $flattened ? $this->respondSuccess(data: ['Flattened Json' => $flattened]) : $this->respondError(errors: 'Invalid json', status: Response::HTTP_FORBIDDEN);
    }
}
