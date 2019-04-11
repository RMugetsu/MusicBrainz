<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\artista;
use App\recording;

class music extends Controller
{
    //
    public function getResultados(Request $request){
        // inicialitzem la crida cURL
        
        if ($request->consulta){
            $url = "http://musicbrainz.org/ws/2/artist?query=".$request->consulta;
        }else{
            $url = "http://musicbrainz.org/ws/2/artist?query=Queen";
        }
        $c = curl_init( $url );
        
        // Ajustem headers perquè ens retorni la info en format JSON
        // tb afegim User-Agent (identificador de client, si no Musicbrainz no funciona)
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json','User-Agent:Laravel/5.7'));
        // ajustos perquè ens retorni les dades sobre una variable
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        
        // cridem per obtenir les dades
        $res = curl_exec($c);
        
        // transformem les dades a un array associatiu de PHP
        $dades = json_decode($res,true);
        
        // mostrem nom ($dades ja és un array associatiu PHP)
        return view("nuevaVista", array('data'=>$dades['artists']));
    }
    public function getArtistas(){
        $artista = Artista::get();
        return view("Artistas", compact('artista'));
    }
    public function getCanciones(){
        $canciones = Recording::get();
        return view("Canciones", compact('canciones'));
    }
}