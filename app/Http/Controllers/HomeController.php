<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Newid;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $objeto = new Newid; /* se crea objeto para invocar al modelo Newid */

        $cola1 = $objeto->cola1();

        $cola2 = $objeto->cola2();

        $countcola1 = $objeto->obtenerNroPersonas1(); /* enumera las personas en lista de la cola 1 */

        $countcola2 = $objeto->obtenerNroPersonas2(); /* enumera las personas en lista de la cola 2 */

        $now =   \Carbon\Carbon::parse(NOW()); /* asignar fecha actual */


            if($cola1==null ){
             
                        $cola1 =   0;
                        $idCola1 =   0;
                        $ticket1 =   100;
                        $Contarcola1 =   0;
             }else{

                         foreach($cola1 as $cola){

                                    $cola1 =   \Carbon\Carbon::parse($cola->created_at);
                                    $idCola1 =   $cola->id;
                                    $ticket1 =   $cola->ticket1;
                         }               
                        $ticket1= number_format($ticket1+1);

                         foreach($countcola1 as $col1){

                                    $Contarcola1 =   $col1->count1;
                         }



             }



            if($cola2==null ){
             
                        $cola2 =   0;
                        $idCola2 =   0;
                        $ticket2 =   200;
                        $Contarcola2 =   0;
             }else{

                         foreach($cola2 as $col){
                                
                                    $cola2 =   \Carbon\Carbon::parse($col->created_at);
                                    $idCola2 =   $col->id;
                                    $ticket2 =   $col->ticket2;
                         }
                        
                        $ticket2= number_format($ticket2+1);

                         foreach($countcola2 as $col2){

                                    $Contarcola2 =   $col2->count2;
                         }



             }

                    
                      
                        /* se calcula el tiempo transcurrido */
                
                        $cola1= \Carbon\Carbon::parse($cola1);
                        $cola2= \Carbon\Carbon::parse($cola2);

                        $minutosCola1 = (strtotime($cola1)-strtotime($now))/60;
                        $minutosCola1 = abs($minutosCola1); 
                        
                        $minutosCola2 = (strtotime($cola2)-strtotime($now))/60;
                        $minutosCola2 = abs($minutosCola2); 
                        



            if($minutosCola1>=2 && $minutosCola2>=3){
                
                        $update1 = $objeto->updateCola1($now,$idCola1);
                        $update2 = $objeto->updateCola2($now,$idCola2);
                        /* se modifica la condición de ya atendido si ha transcurrido 2 minutos o 3 según el numero de la cola */

            }elseif($minutosCola2>=3){

                        $update2 = $objeto->updateCola2($now,$idCola2);
                        /* se modifica la condición de ya atendido si ha transcurrido 3 en la cola 2 */


            }elseif($minutosCola1>=2){
                        
                        $update1 = $objeto->updateCola1($now,$idCola1);
                        /* se modifica la condición de ya atendido si ha transcurrido 2 en la cola 1 */
            }


        $personas1 = $objeto->obtenerNroPersonas1(); /* número de personas asignadas a la cola 1 */
        
                          foreach($personas1 as $persona1){

                                    $countcola1 =   $persona1->count1;
                         }


        $personas2 = $objeto->obtenerNroPersonas2(); /* número de personas asignadas a la cola 2 */

                          foreach($personas2 as $persona2){

                                    $countcola2 =   $persona2->count2;
                         }
        

        return view('home',compact('Contarcola1','Contarcola2','countcola1','countcola2','ticket1','ticket2','now'));
    }

}
