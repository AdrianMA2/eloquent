<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Grafico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Grafico2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql1 = "SELECT count(payment_id) AS 'ventas', city.city
        from payment
        inner join staff on payment.staff_id = staff.staff_id
        inner join store on staff.store_id = store.store_id
        inner join address on store.address_id = address.address_id
        inner join city on address.city_id = city.city_id
        group by city.city;";
        $sql2 = "SELECT CONCAT (first_name, CONCAT (' ' , last_name)) AS 'Nombre', sum(payment.amount) AS'Dólares'
        FROM customer
        inner join rental on customer.customer_id = rental.customer_id
        inner join payment on rental.rental_id = payment.rental_id
        where customer.customer_id is not null 
        group by Nombre
        order by Dólares desc
        LIMIT 5;";
        $sql3 = "SELECT COUNT(payment.amount) as 'Dólares', city as 'Ciudad'
        FROM city
        inner join address on city.city_id = address.city_id
        inner join customer on address.address_id = customer.address_id
        inner JOIN rental ON customer.customer_id = rental.customer_id
        inner JOIN payment ON rental.rental_id = payment.rental_id
        WHERE city.city is not null
        group by city 
        order by Dólares desc
        LIMIT 20;";
        $sql4 = "SELECT count(customer.customer_id) as 'Clientes', country.country as 'Pais'
        from customer
        inner join address on customer.address_id = address.address_id
        inner join city on address.city_id = city.city_id
        inner join country on city.country_id = country.country_id
        group by country.country
        order by Clientes desc
       limit 20
        ;";

        $rentals1 = DB::select($sql1);
        $rentals2 = DB::select($sql2);
        $rentals3 = DB::select($sql3);
        $rentals4 = DB::select($sql4);


        $data = [];

        foreach($rentals1 as $rental1) {
            $data['label1'][] = $rental1->city;
            $data['data1'][] = $rental1->ventas;
        }
        foreach($rentals2 as $rental2) {
            $data['label2'][] = $rental2->Nombre;
            $data['data2'][] = $rental2->Dólares;
        }
        foreach($rentals3 as $rental3) {
            $data['label3'][] = $rental3->Ciudad;
            $data['data3'][] = $rental3->Dólares;
        }
        foreach($rentals4 as $rental4) {
            $data['label4'][] = $rental4->Pais;
            $data['data4'][] = $rental4->Clientes;
        }
        
        $data['data'] = json_encode($data);

        return view('graficos.grafico2', $data);

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
