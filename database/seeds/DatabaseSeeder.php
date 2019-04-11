<?php

use Illuminate\Database\Seeder;
use App\artista;
use App\recording;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $url = "http://musicbrainz.org/ws/2/artist?query=Queen";

        $c = curl_init( $url );

        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json','User-Agent:Laravel/5.7'));

        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        
        $res = curl_exec($c);

        $dades = json_decode($res,true);
        foreach ($dades['artists'] as $key => $value) {
            $nombre = '-';
            $pais = '-';
            $tipo = '-';
            $inicio = '-';
            $fin = '-';
            if(isset($value['name'])){
                $nombre = $value['name'];
            }
            if(isset($value['country'])){
                $pais = $value['country'];
            }
            if(isset($value['type'])){
                $tipo = $value['type'];
            }
            if(isset($value['life-span']['begin'])){
                $inicio = $value['life-span']['begin'];
            }
            if(isset($value['life-span']['end'])){
                $fin = $value['life-span']['end'];
            }
            $artista = new artista;
            $artista->Nombre = $nombre;
            $artista->Pais = $pais;
            $artista->Tipo = $tipo;
            $artista->Fecha_de_inicio = $inicio;
            $artista->Fecha_de_Jubilacion = $fin;
            $artista->save();
        }
        $url = "http://musicbrainz.org/ws/2/recording?query=Ruben";

        $c = curl_init( $url );

        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept:application/json','User-Agent:Laravel/5.7'));

        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        
        $res = curl_exec($c);

        $dades = json_decode($res,true);
        foreach ($dades['recordings'] as $key => $value) {
            $titulo = '-';
            $ambiguo = '-';
            $disco = '-';
            if(isset($value['name'])){
                $nombre = $value['name'];
            }
            if(isset($value['disambiguation'])){
                $ambiguo = $value['disambiguation'];
            }
            if(isset($value['releases'][0]['title'])){
                $disco = $value['releases'][0]['title'];
            }
            $cancion = new recording;
            $cancion->Title = $nombre;
            $cancion->Disambiguation = $ambiguo;
            $cancion->Disc = $disco;
            $cancion->save();
        }
    }
}
