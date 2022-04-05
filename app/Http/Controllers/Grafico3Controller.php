<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\Grafico;

use Illuminate\Support\Facades\DB;

class Grafico3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql1 = "SELECT month(rental_date) as mes, count(*) as alquilado
        FROM sakila.rental 
        group by mes;";

        $rentals1 = DB::select($sql1);

        $data = [];

        foreach($rentals1 as $rental1) {
            $data['label1'][] = $rental1->mes;
            $data['data1'][] = $rental1->alquilado;
        }
        
        $data['data'] = json_encode($data);

        return view('graficos.grafico3', $data);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grafico  $grafico
     * @return \Illuminate\Http\Response
     */
    public function show(Grafico $grafico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grafico  $grafico
     * @return \Illuminate\Http\Response
     */
    public function edit(Grafico $grafico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grafico  $grafico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grafico $grafico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grafico  $grafico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grafico $grafico)
    {
        //
    }
}
