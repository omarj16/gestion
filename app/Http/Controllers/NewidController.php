<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\NewidFormRequest;

use App\Models\Newid;

use Illuminate\Support\Facades\DB;

class NewidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()

    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
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
    public function store(NewidFormRequest $request)
    {


        $slug = uniqid();
        $nuevo = new Newid(array(
            'documento' => $request->get('documento'), 
            'nombre' => $request->get('nombre'),
            'cola' => $request->get('cola'),
            'ticket' => $request->get('ticket'),
            'slug' => $slug
        ));


        $cola1 = DB::select('select id,documento, nombre, cola,ticket from newids where documento = "'.$nuevo['documento'].'" and atendido="N"');


            if($cola1 == null){
        
                    $nuevo->save();
                    return redirect('/home')->with('status', 'Documento: '.number_format($nuevo['documento'], 0, ",", ".").', Su turno ha sido creado en la Cola: '.$nuevo['cola']. ', Ticket N°: '.$nuevo['ticket']);
                    exit;

            }else{


                     foreach($cola1 as $col){
                            
                                $id =   $col->id;
                                $documento =   $col->documento;
                                $nombre =   $col->nombre;
                                $cola =   $col->cola;
                                $ticket =   $col->ticket;
                                
                     }

                    if($id == null){
                            $nuevo->save();
                            return redirect('/home')->with('status', 'Su turno ha sido creado en la Cola: '.$nuevo['cola']. ', Ticket N°: '.$nuevo['ticket']);

                    }else{
                          
                            return redirect('/home')->with('error', 'Turno en espera para ser atendido. COLA: '.$cola.', TICKET N°: '.$ticket.', DOCUMENTO: '.number_format($documento, 0, ",", ".").', NOMBRE: '.$nombre);    
                    }

            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
