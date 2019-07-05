<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Models\Sport;
use DB;


class LiveSearchController extends Controller
{
    //
    public function index()
    {
        return view('live_search');
    }
    /*
    public function index( Request $request ){
    	
        $results = (new Search())
        ->registerModel(Sport::class, ['sport_name'])
        ->search($request->input('query'));
        
        return response()->json($results);

    }*/

    public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('sports')
         ->where('name', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('sports')
         ->orderBy('name', 'asc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td><a href="/sport/'.$row->id.'/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

}
