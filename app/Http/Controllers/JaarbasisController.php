<?php

namespace App\Http\Controllers;

use App\Models\Jaarbasis;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class JaarbasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $naam_id = $request->get('naam_id');
        $namen = Jaarbasis::select('naam')->orderBy('naam')->distinct()->get()->toArray();

        $jaarbasissen =  Jaarbasis::where('naam', $naam_id)
                                    ->orderBy('naam' )
                                    ->orderBy('trap')
                                    //->distinct()
                                    ->get()
                                    ->toArray();


        return view("jaarbasissen")->with(["jaarbasissen" => $jaarbasissen, "namen" => $namen, "gekozen" => (!is_null($naam_id))? $naam_id:'geen']);


    }

    public function filter($id)
    {
        error_log($id);
        $jaarbasis = Jaarbasis::where('id',$id )->firstOrFail()->toArray();
        $index = Data::where('naam','index' )->firstOrFail()->toArray();
        $sz_bijdrage = Data::where('naam','sz_bijdrage' )->firstOrFail()->toArray();
        $voorheffing = Data::where('naam','voorheffing' )->firstOrFail()->toArray();
        error_log($index['waarde']);


        $jaarbasis_indexed['loon'] = round($jaarbasis['loon'] * $index['waarde'], 2, PHP_ROUND_HALF_DOWN);
        $jaarbasis_indexed['sz_bijdrage'] = round($jaarbasis_indexed['loon'] * $sz_bijdrage['waarde'], 2, PHP_ROUND_HALF_DOWN);
        $jaarbasis_indexed['loon_na_sz'] = $jaarbasis_indexed['loon'] - $jaarbasis_indexed['sz_bijdrage'];
        $jaarbasis_indexed['voorheffing'] = round($jaarbasis_indexed['loon_na_sz'] * $voorheffing['waarde'], 2, PHP_ROUND_HALF_DOWN) ;

        $view = view("popup")->with(["jaarbasis" => $jaarbasis,"jaarbasis_indexed" => $jaarbasis_indexed]);
        
        return $view;
    }

    public function data()
    {
        $data =  Data::get()
        ->toArray();
        $view = view("data")->with(["data" => $data]);
        
        return $view;
    }


}


