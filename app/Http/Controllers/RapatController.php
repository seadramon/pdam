<?php

namespace pdam\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Html;
use Validator;
use Redirect;
use Session;

use GuzzleHttp\Client;
// use GuzzleHttp\Message\Request;
use GuzzleHttp\Message\Response;

class RapatController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$data = [];
    	$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', 'https://rapat.pdam-sby.go.id/test/daftar-rapat');
		
		if ($res->getStatusCode()==200) {
			$response = json_decode($res->getBody(), true);
			$data = $response['hasil'];
		}

    	return view('pages.rapat.index')
            ->with('data', $data);  
    }

    public function show($id)
    {
    	if($id) {
    		$data = [];
	    	$client = new \GuzzleHttp\Client();
			$res = $client->request('GET', 'https://rapat.pdam-sby.go.id/test/undangan/'.$id);
		
			if ($res->getStatusCode()==200) {
				echo $res->getBody();
			}
    	}
    }
}
