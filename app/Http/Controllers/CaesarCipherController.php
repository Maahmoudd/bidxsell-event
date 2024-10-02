<?php

namespace App\Http\Controllers;

use App\Actions\ICaesarEncodeAction;
use App\Http\Requests\CaesarCipherRequest;
use Symfony\Component\HttpFoundation\Response;

class CaesarCipherController extends ApiBaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CaesarCipherRequest $request, ICaesarEncodeAction $encodeAction)
    {
        $result = $encodeAction->handle($request->validated());
        return $result ? $this->respondSuccess(data: ['Encoded' => $result]) : $this->respondError(errors: 'Invalid input', status: Response::HTTP_FORBIDDEN);
    }
}
