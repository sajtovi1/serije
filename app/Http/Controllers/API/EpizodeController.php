<?php

namespace App\Http\Controllers\API;

use App\Models\Epizoda;
use App\Models\Odeca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \App\Http\Resources\Epizoda as EpizodeResurs;

class EpizodeController extends ResponseController
{
    public function index()
    {
        $epizode = Epizoda::all();
        return $this->sendResponse(EpizodeResurs::collection($epizode), 'Vracene zve epizode.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'broj' => 'required',
            'opis' => 'required',
            'sezona_id' => 'required',
            'ocena' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $epizoda = Epizoda::create($input);

        return $this->sendResponse(new EpizodeResurs($epizoda), 'Nova epizoda je kreirana.');
    }


    public function show($id)
    {
        $epizoda = Epizoda::find($id);
        if (is_null($epizoda)) {
            return $this->sendError('Epizoda sa zadatim id-em ne postoji.');
        }
        return $this->sendResponse(new EpizodeResurs($epizoda), 'Epizoda sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $epizoda = Epizoda::find($id);
        if (is_null($epizoda)) {
            return $this->sendError('Epizoda sa zadatim id-em ne postoji.');
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            'broj' => 'required',
            'opis' => 'required',
            'sezona_id' => 'required',
            'ocena' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $epizoda->broj = $input['broj'];
        $epizoda->opis = $input['opis'];
        $epizoda->sezona_id = $input['sezona_id'];
        $epizoda->ocena = $input['ocena'];
        $epizoda->save();

        return $this->sendResponse(new EpizodeResurs($epizoda), 'Epizdoda je azurirana.');
    }

    public function destroy($id)
    {
        $epizoda = Epizoda::find($id);
        if (is_null($epizoda)) {
            return $this->sendError('Epizoda sa zadatim id-em ne postoji.');
        }
        $epizoda->delete();
        return $this->sendResponse([], 'Epizoda je obrisana.');
    }
}
