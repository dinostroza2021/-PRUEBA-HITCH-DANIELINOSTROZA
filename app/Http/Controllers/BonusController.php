<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class BonusController extends Controller
{
    public function index()
    {
        // $response = Http::get('https://jsonplaceholder.typicode.com/users');
        // $bonus = $response->json();   

        // dd($bonus);

        $client = new Client();

        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users');

        $bonus = json_decode($response->getBody(), true);

       //dd($bonus);

        return view('payments.bonus', compact('bonus'));
    }
}
