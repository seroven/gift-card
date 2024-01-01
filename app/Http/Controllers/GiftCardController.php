<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResponseFormat;
use App\Interfaces\GiftCardRepositoryInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class GiftCardController extends Controller
{

    protected $repository;

    public function __construct(GiftCardRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    function generate(Request $request)
    {
        $data = $request->all();
        $pdf = Pdf::loadView('pdf.gift-card', compact('data'));
        return $pdf->stream();
        // return view('pdf.gift-card', compact('data'));
    }

    public function all()
    {
        return $this->repository->all(['*'], ['status']);
    }

    public function generateCode()
    {
        while (true) {
            $code = rand(100000000, 999999999);
            $existCode = $this->repository->getByCode($code);
            if (!$existCode) {
                return ResponseFormat::format(200, $code);
            }
        }
    }

    public function create(Request $request)
    {
        return ResponseFormat::format(200, $this->repository->create($request->all()));
    }

    public function update(Request $request, $id)
    {
        return ResponseFormat::format(200, $this->repository->update($id, $request->all()));
    }
    public function delete($id)
    {
        return ResponseFormat::format(200, $this->repository->update($id, array("enable" => 0)));
    }
}
