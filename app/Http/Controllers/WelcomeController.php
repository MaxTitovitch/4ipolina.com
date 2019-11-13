<?php

namespace App\Http\Controllers;

use App\Struct;

class WelcomeController extends Controller
{
	public function index()
	{
      $structs = Struct::select(['id', 'name'])->get();
      if(!empty($_GET['scriptMessage'] )) {
               if($_GET['scriptMessage'] == 1) {
                  return view ('welcome')->with(['structs' => $structs, 'mes' =>1 ]);
                } elseif($_GET['scriptMessage'] == 2){
                  return view ('welcome')->with(['structs' => $structs, 'mes' => 2 ]);
               }
			   elseif($_GET['scriptMessage'] == 3){
                  return view ('welcome')->with(['structs' => $structs, 'mes' => 3 ]);
               }
      }
      return view ('welcome')->with(['structs' => $structs]);
	}
}
