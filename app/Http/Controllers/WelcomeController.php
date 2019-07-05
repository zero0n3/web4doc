<?php
// #fattoamano
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function welcome($name = '', $lastname = ''){

    	return "SEI FINITO NEL WELCOME CONTROLLER DOVE PRENDO NOME  E COGNOME IN BASE ALL'URL E LO STAMPO DI SEGUITO E BASTA   hello ".$name." ".$lastname;

    }
}
