<?php
public function printPdf()
{
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($this->printReport());

    return $pdf->stream();        
}

public function printReport()
{
    $pubs = Publications::where('userid', Auth::user()->user_code)->get();

    $output = '
            <style type="text/css">
            h2 {
              color: #000000;
              text-align: center;
              text-transform: uppercase;
              font-weight: bold;
              font-style: oblique;
              text-shadow: 2px 2px #d8c2c2;
            }
            </style>

            <h2>All Publications</h2>
            <br>

            <table class="table table-striped">  
                <thead>  
                  <tr>                        
                    <th style="border: 1px solid; padding: 12px; width: 200px;">Name </th>  
                    <th style="border: 1px solid; padding: 12px; width: 100px;">Type </th>  
                    <th style="border: 1px solid; padding: 12px; width: 100px;">Version </th>
                    <th style="border: 1px solid; padding: 12px; width: 100px;">Date</th>  

                  </tr>  
                </thead>  
                <tbody>'; 
        foreach($pubs as $pub)
        { 
            $output .='<tr border="none"> 
                        <td style="border: 1px solid; padding: 12px;">' .$pub->name .'</td>  
                        <td style="border: 1px solid; padding: 12px;">' .$pub->publication_type .'</td>
                        <td style="border: 1px solid; padding: 12px;">' .$pub->pub_version .'</td>  
                        <td style="border: 1px solid; padding: 12px;">' .$pub->pub_date.'</td>  
                        
                      </tr>';
        }

        $output .='
                </tbody>  
            </table>';

    return $output;
}

//////////////projects//////////////////////////

// public function printPdf()
    // {
    //     $pdf = \App::make('dompdf.wrapper');
    //     $pdf->loadHTML($this->printReport());

    //     return $pdf->stream();        
    // }

    // public function printReport()
    // {
    //     $projcts = DB::table('projects')
    //         ->join('modules', 'projects.module', '=', 'modules.id')
    //         ->where('projects.userid', Auth::user()->user_code)
    //         ->select('projects.*', 'modules.mod_code', 'modules.mod_name')
    //         ->get();

    //     $output = '
    //             <style type="text/css">
    //             h2 {
    //               color: #000000;
    //               text-align: center;
    //               text-transform: uppercase;
    //               font-weight: bold;
    //               font-style: oblique;
    //               text-shadow: 2px 2px #d8c2c2;
    //             }
    //             </style>

    //             <h2>All Projects</h2>
    //             <br>

    //             <table class="table table-striped">  
    //                 <thead>  
    //                   <tr>                        
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Topic </th>  
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Description </th>  
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Type </th>
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Start date </th>  
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Completed date </th>  
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Module </th>
    //                   </tr>  
    //                 </thead>  
    //                 <tbody>'; 
    //         foreach($projcts as $pro)
    //         { 
    //             $output .='<tr border="none"> 
    //                         <td style="border: 1px solid; padding: 12px;">' .$pro->topic .'</td>  
    //                         <td style="border: 1px solid; padding: 12px;">' .$pro->description .'</td>
    //                         <td style="border: 1px solid; padding: 12px;">' .$pro->project_type .'</td>  
    //                         <td style="border: 1px solid; padding: 12px;">' .$pro->started_date.'</td>  
    //                         <td style="border: 1px solid; padding: 12px;">' .$pro->completed_date.'</td>
    //                         <td style="border: 1px solid; padding: 12px;">' . $pro->mod_code .' - '. $pro->mod_name .'</td>
    //                       </tr>';
    //         }

    //         $output .='
    //                 </tbody>  
    //             </table>';

    //     return $output;
    // }


//////////////personal info//////////////////////////

// public function printCV()
    // {
    //     $server = "localhost";
    //     $user = "root";
    //     $pass ="";
    //     $db = "ccp_ewe";
    //     $sql = "select pi.userid, pi.full_name, pi.resident_address, pi.workplace_address, pi.nic,pi.gender, pi.dob, pi.email, pi.contact, eq.institute, eq.degree, eq.field, eq.end_date, skills.skills, skills.desp as skill_desp, skills.endorsements, a.title, a.desp as acc_desp, we.organization, we.designation, we.department, we.years
    //         from personal_info pi
    //         LEFT JOIN educational_qualification eq ON pi.userid = eq.userid
    //         LEFT JOIN skills ON pi.userid = skills.userid
    //         LEFT JOIN accomplishments a ON pi.userid = a.userid
    //         LEFT JOIN working_exp we ON pi.userid = we.userid
    //         where pi.userid = '" . Auth::user()->user_code."'";

    //     $PHPJasperXML = new PHPJasperXML();
    //     // $PHPJasperXML->debugsql=true;
    //     // $PHPJasperXML->arrayParameter=array("logo"=>'fgxg', "pi.userid"=>Auth::user()->user_code);
        
    //     $PHPJasperXML->load_xml_file("http://localhost/CCP2/ccp_ewe/reports/cv.jrxml"); 
    //     $PHPJasperXML->sql = $sql;      
    //     $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
    //     $PHPJasperXML->outpage("I");
    // }


//////////////research//////////////////////////
    // public function printPdf()
    // {
    //     $pdf = \App::make('dompdf.wrapper');
    //     $pdf->loadHTML($this->printReport());

    //     return $pdf->stream();        
    // }

    // public function printReport()
    // {
    //     $researchs = DB::table('research')
    //         ->join('modules', 'research.module', '=', 'modules.id')
    //         ->where('research.userid', Auth::user()->user_code)
    //         ->select('research.*', 'modules.mod_code', 'modules.mod_name')
    //         ->get();

    //     $output = '
    //             <style type="text/css">
    //             h2 {
    //               color: #000000;
    //               text-align: center;
    //               text-transform: uppercase;
    //               font-weight: bold;
    //               font-style: oblique;
    //               text-shadow: 2px 2px #d8c2c2;
    //             }
    //             </style>

    //             <h2>All Researches</h2>
    //             <br>

    //             <table class="table table-striped">  
    //                 <thead>  
    //                   <tr>                        
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Research Name </th>  
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Description </th>  
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Status </th>
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Module </th>
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Start Date </th>
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Completed Date </th> 
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Batch </th>
    //                     <th style="border: 1px solid; padding: 12px; width: 50px;">Estimate Time</th>
    //                   </tr>  
    //                 </thead>  
    //                 <tbody>'; 
    //         foreach($researchs as $res)
    //         { 
    //             $output .='<tr border="none"> 
    //                         <td style="border: 1px solid; padding: 12px;">' .$res->name .'</td>  
    //                         <td style="border: 1px solid; padding: 12px;">' .$res->description .'</td>
    //                         <td style="border: 1px solid; padding: 12px;">' .$res->status .'</td>  
    //                         <td style="border: 1px solid; padding: 12px;">' .$res->mod_code .' - '. $res->mod_name.'</td>  
    //                         <td style="border: 1px solid; padding: 12px;">' .$res->start_date.'</td>
    //                         <td style="border: 1px solid; padding: 12px;">' .$res->complete_date.'</td>
    //                         <td style="border: 1px solid; padding: 12px;">' .$res->batch.'</td>
    //                         <td style="border: 1px solid; padding: 12px;">' . $res->estimate_time .'</td>

    //                       </tr>';
    //         }

    //         $output .='
    //                 </tbody>  
    //             </table>';

    //     return $output;
    // }


///////////////// site////////////////
// public function logIndex(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $data = DB::select('SELECT system_log.*, users.name FROM system_log INNER JOIN users ON system_log.user_id = users.user_code');

    //         return DataTables::of($data)
    //                 ->addColumn('action', function($data){
    //                     $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
    //                     $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
    //                     return $button;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->make(true);
    //     }
    //     return view('Site.logs');
    // }


    // public function index(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         $data = DB::table('timetable')
    //                 ->join('modules', 'timetable.module', '=', 'modules.id')
    //                 ->where('timetable.userid', Auth::user()->user_code)
    //                 ->select('timetable.*', 'modules.mod_code', 'modules.mod_name')
    //                 ->get();

    //         return DataTables::of($data)
    //                 ->addColumn('action', function($data){
    //                     $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
    //                     $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
    //                     return $button;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->make(true);
    //     }
    //     return view('Timetable.newindex');
    // }

?>