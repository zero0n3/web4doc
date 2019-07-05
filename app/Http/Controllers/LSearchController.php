<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use DB;

 class LSearchController extends Controller
 { 
        function index()
        { 
            return view('lsearch'); 
            } 

        function action(Request $request) 
        { 
            if($request->ajax()) 
            { 
                $output = ''; 
                $query = $request->get('query'); 
                if($query != '') 
                    { 
                        $data = DB::table('companys')->where('company_name', 'like', '%'.$query.'%')
                                                            ->orderBy('company_name', 'asc') ->get(); 
                                                            } 
                                                            else 
                                                                { 
                                                                    $data = DB::table('companys')->orderBy('company_name', 'asc')
                                                                                                    ->get(); 
                                                                                                    } 
                          $total_row = $data->count(); 
                          dd($data);
                          if($total_row > 0) 
                            { 
                                foreach($data as $row) 
                                    { 
                                        $output .= ''.$row->company_name.''.$row->id.''.$row->status.''; 
                                        } 
                                    } 
                            else 
                                { 
                                    $output = 'No Data Found';
                                     } 
                            $data = array( 'table_data' => $output, 'total_data' => $total_row ); 
                            echo json_encode($data); 
                                    } 
                                } 
                            } 
