<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseApplicationController;
use App\Mappers\ApplicationMapper;
use App\Mappers\ApplicationsMapper;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;

class ApplicationController extends BaseApplicationController
{

    public function list()
    {
        return view('application.index', [
            'applications' => $this->paginate((new ApplicationsMapper(parent::list()))->getData())
        ]);
    }

    public function show($id)
    {
        $data = parent::show($id);

        if (!$data) return null;

        if (get_class($data) == MessageBag::class) {
            return view('layouts.error', [
                'messageBug' => $data->getMessageBag()
            ]);
        }
        return view('application.edit', [
            'application' => (new ApplicationMapper($data))->getData()
        ]);
    }

    public function store(Request $request)
    {
        $message = parent::store($request);
        if (!$message) {
            return Redirect::to('application/list');
        }
        return Redirect::back()->withErrors($message);
    }

    public function create()
    {
        return view('application.create', [
            'statuses' => Application::STATUSES
        ]);
    }

    public function update(Request $request, $id)
    {
        $message = parent::update($request, $id);
        if (!$message) {
            return Redirect::to('application/list');
        }
        return Redirect::back()->withErrors($message);
    }
}
