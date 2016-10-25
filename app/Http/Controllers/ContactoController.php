<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contacto;
use Mail;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        //dd("prueba_create");

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
         //dd("prueba_create_guardar");

        $con             = new Contacto;
        $con->nombre     = $request->get('nombre');
        $con->comentario = $request->get('comentario');
        $con->correo     = $request->get('correo');
        $con->save();

        // envio email Adminitrador
        $data = array(
                    'nombre'      => $request->get('nombre'),
                    'comentario'  => $request->get('comentario'),
                    'correo'      => $request->get('correo')
                     );

         Mail::send(['html'=>'admin'], $data, function($message) {
         $message->to('robotmanus@gmail.com','administrador')->subject
            ('Informacion de Nuevo Contacto');
         $message->from('robotmanus@gmail.com','Administrador');
      });


        return "true";
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
