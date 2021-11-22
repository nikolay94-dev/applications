<?php

namespace App\Http\Controllers;

use App\Repositories\ApplicationRepository;
use App\Services\ImageService;
use App\Validators\ApplicationValidator;
use App\Validators\IdValidator;
use Illuminate\Http\Request;

abstract class BaseApplicationController extends Controller
{
    private $applicationRepository;
    private $applicationValidator;
    private $idValidator;
    private $imageService;

    public function __construct(
        ApplicationRepository $applicationRepository,
        ApplicationValidator $applicationValidator,
        IdValidator $idValidator,
        ImageService $imageService
    )
    {
        $this->applicationRepository = $applicationRepository;
        $this->applicationValidator = $applicationValidator;
        $this->idValidator = $idValidator;
        $this->imageService = $imageService;
    }

    public function store(Request $request)
    {
        try {
            $message = $this->applicationValidator->validate($request);

            if ($message) {
                return $message;
            }

            $imageName = $request->photo ? $this->imageService->uploadImage($request->photo) : null;
            $data = $request->all();
            $data['photo'] = $imageName;
            $this->applicationRepository->create($data);

            return null;
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }

    }

    public function list()
    {
        return $this->applicationRepository->getAll();
    }

    public function show($id)
    {
        $message = $this->idValidator->validate($id);

        if ($message) {
            return $message;
        }

        return $this->applicationRepository->getById($id);
    }

    public function update(Request $request, $id)
    {
        try {

            $message = $this->applicationValidator->validate($request);

            if ($message) {
                return $message;
            }

            // TODO: need don't save old photo
            $imageName = $request->photo ? $this->imageService->uploadImage($request->photo) : null;
            $data = $request->all();
            $data['photo'] = $imageName;
            $this->applicationRepository->update($data, $id);

            return null;
        } catch (\Throwable $exception) {
            return $exception->getMessage();
        }
    }
}
