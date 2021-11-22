<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseApplicationController;
use App\Responses\ApiErrorData;
use App\Responses\ApiSuccess;
use App\Responses\GetApplicationsApiData;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class ApiApplicationController extends BaseApplicationController
{
    public function store(Request $request)
    {
        $message = parent::store($request);
        if ($message) {
            return (new ApiErrorData(403, $message))->getData();
        }

        return (new ApiSuccess())->getData();
    }

    public function list()
    {
        return (new GetApplicationsApiData(parent::list()))->getData();
    }

    public function show($id)
    {
        $data = parent::show($id);

        if (get_class($data) == MessageBag::class) {
            return (new ApiErrorData(403, $data))->getData();
        }

        return (new GetApplicationsApiData($data))->getData();
    }

    public function update(Request $request, $id)
    {
        $message = parent::update($request, $id);
        if ($message) {
            return (new ApiErrorData(403, $message))->getData();
        }

        return (new ApiSuccess())->getData();
    }
}
