<?php

namespace App\Http\Controllers;

use App\Actions\INumberToExcelAction;
use App\Http\Requests\NumberToExcelRequest;
use Symfony\Component\HttpFoundation\Response;

class ExcelColumnController extends ApiBaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NumberToExcelRequest $request, INumberToExcelAction $toExcelAction)
    {
        $excelColumn = $toExcelAction->handle($request->validated()['index']);
        return $excelColumn ? $this->respondSuccess(data: ['Excel Column' => $excelColumn]) : $this->respondError(errors: 'Invalid index', status: Response::HTTP_FORBIDDEN);
    }
}
