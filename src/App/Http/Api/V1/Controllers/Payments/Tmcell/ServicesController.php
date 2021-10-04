<?php

namespace App\Http\Api\V1\Controllers\Payments\Tmcell;

use App\Http\Api\V1\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Services\ServiceFactory;
use Services\ServicesEnum as Service;

final class ServicesController extends Controller
{
    public function __invoke(Request $request)
    {
        $service = ServiceFactory::make(Service::TMCELL);

        // try {

        $service->setArgs([
                'ts' => now()->timestamp,
            ]);

        $response = $service->getServices();

        dd($response->getBody());

        return response([
                'success' => true,
                'data'    => ''
            ]);

        // } catch (\GuzzleHttp\Exception\BadResponseException $e) {
        //     error('UNEXPECTED_EXCEPTION');
        // } catch (\GuzzleHttp\Exception\TransferException $e) {
        //     error('SERVICE_UNAVAILABLE');
        // }
    }
}
