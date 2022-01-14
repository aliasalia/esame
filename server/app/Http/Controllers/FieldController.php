<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function list(Request $req) {
        $order = 'asc';
        if ($req->query('sort') != NULL) {
            $order = $req->query('sort');
        }

        return Field::orderBy('dimensione', $order)->get();

    }

    public function view($id) {
        return Field::where('id', $id)->first();
    }

    public function create(Request $req) {
        $data = json_decode($req->getContent());
        $new = new Field();

        $new->comune = $data->comune;
        $new->img = $data->img;
        $new->dimensione = $data->dimensione;
        $new->foglio_catastale = $data->foglio_catastale;
        $new->mappale_catastale = $data->mappale_catastale;
        $new->parcella_catastale = $data->parcella_catastale;
        $new->tipo_terreno = $data->tipo_terreno;
        $new->tipo_irrigazione = $data->tipo_irrigazione;
        $new->tipo_offerta = $data->tipo_offerta;
        $new->canone = $data->canone;
        $new->disponibilita = $data->disponibilita;

        $new->save();
    }

    public function modify(Request $req, $id) {
        $data = json_decode($req->getContent());
        $new = Field::where('id', $id)->first();

        $new->comune = $data->comune;
        $new->img = $data->img;
        $new->dimensione = $data->dimensione;
        $new->foglio_catastale = $data->foglio_catastale;
        $new->mappale_catastale = $data->mappale_catastale;
        $new->parcella_catastale = $data->parcella_catastale;
        $new->tipo_terreno = $data->tipo_terreno;
        $new->tipo_irrigazione = $data->tipo_irrigazione;
        $new->tipo_offerta = $data->tipo_offerta;
        $new->canone = $data->canone;
        $new->disponibilita = $data->disponibilita;

        $new->save();
    }

    public function bin($id) {
        $field = Field::where("id", $id)->first();
        $field->delete();
    }
}
