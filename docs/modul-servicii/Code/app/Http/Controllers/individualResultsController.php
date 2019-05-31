<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;



class individualResultsController extends Controller
{	

	public function individual_result()
	{
	$id= '1';//Auth::id;

	if(!$id)
		{ $mesaj="Trebuie sa te conectezi";
			return view('individual_results',['message' => $mesaj]);
			 }


	$student = DB::table('studenti')->where('id',$id)->first(); ;

	if(!isset($student->id_comisie))
	{
		$mesaj= "Inca nu ti-a fost atribuita o comisie.";
	}
else {
	$profs = DB::table('profesori')->where('id_comisie',$student->id_comisie)->get() ;

	if(!isset($profs))
	{
		$mesaj= "Problema la afisarea comisiei";
		return view('individual_result',['Errormessage' => $mesaj ]);

	}
}
/// after we get commitee, we look for results

   $content=  File::get('rezultateStudenti.json');
$content = json_decode($content,true);

foreach ($content['studenti'] as $student) {
	 if($id == $student['id'] ) 
	 	if(isset($mesaj))
return view('individual_result',['profs' => null , 'grade' => $student, 'message' => $mesaj ]);
else return view('individual_result',['profs' => $profs, 'grade' => $student ] );

}

if(isset($mesaj))
{$mesaj2=$mesaj . " ". "Lucrarea inca nu a fost corectata.";
return view('individual_result',['profs' => null,'grade'=>null, 'message' => $mesaj2 ]);
}
else {
	$mesaj2="Lucrarea inca nu a fost corectata.";
return view('individual_result',['profs' => $profs,'grade'=>null, 'message' => $mesaj2 ]);
}


}


}
?>