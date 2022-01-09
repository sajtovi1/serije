<?php

namespace App\Http\Controllers\API;

use App\Models\Sezona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Sezona as SezonaResurs;

class SezonaController extends ResponseController
{
    public function index()
    {
        $sezone = Sezona::all();
        return $this->sendResponse(SezonaResurs::collection($sezone), 'Vracene sve sezone.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'naziv_sezone' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $sezona = Sezona::create($input);

        return $this->sendResponse(new SezonaResurs($sezona), 'Sezona je kreirana.');
    }


    public function show($id)
    {
        $sezona = Sezona::find($id);
        if (is_null($sezona)) {
            return $this->sendError('Sezona sa zadatim id-em ne postoji.');
        }
        return $this->sendResponse(new SezonaResurs($sezona), 'Sezona sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $sezona = Sezona::find($id);
        if (is_null($sezona)) {
            return $this->sendError('Sezona sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'naziv_sezone' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $sezona->naziv_sezone = $input['naziv_sezone'];
        $sezona->save();

        return $this->sendResponse(new SezonaResurs($sezona), 'Sezona je azurirana.');
    }

    public function destroy($id)
    {
        $sezona = Sezona::find($id);
        if (is_null($sezona)) {
            return $this->sendError('Sezona sa zadatim id-em ne postoji.');
        }
        $sezona->delete();
        return $this->sendResponse([], 'Sezona je obrisana.');
    }
}
