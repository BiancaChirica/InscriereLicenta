<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Input;
	use Carbon\Carbon;

	class EditCommitteesController extends Controller{

		function display_committees($tip)
		{
            $comisii=DB::table('comisii')->where('sesiune',$tip)->get();
            $length=DB::table('comisii')->latest('id')->first();
            for($i=0;$i<DB::table('comisii')->where('sesiune',$tip)->count('id');$i++)
            {
             if(DB::table('profesori')->where('id_comisie',$comisii[$i]->id)->exists()){
             	$result[$i]=DB::table('profesori')->where('id_comisie',$comisii[$i]->id)->get();

            $result3=DB::table('comisii')->get();
        }
            }

            $result2=DB::table('profesori')->get();
		if(!isset($result))
		{
			$mesaj= "Nu exist inregistrari pentru profesori in baza de date!" ;
			return view('edit_committees', ['mesaj_2'=>$mesaj,'professors'=>$result2]);
		}
		return view('edit_committees',['committees_p'=> $result,'professors'=>$result2,'committees_print'=>$result3]);
		}

function display_committees_all()
		{
            $comisii=DB::table('comisii')->get();
            $length=DB::table('comisii')->latest('id')->first();
            for($i=0;$i<DB::table('comisii')->count('id');$i++)
            {
             if(DB::table('profesori')->where('id_comisie',$comisii[$i]->id)->exists()){
             	$result[$i]=DB::table('profesori')->where('id_comisie',$comisii[$i]->id)->get();

            $result3=DB::table('comisii')->get();
        }
            }

            $result2=DB::table('profesori')->get();
		if(!isset($result))
		{
			$mesaj= "Nu exist inregistrari pentru profesori in baza de date!" ;
			return view('edit_committees', ['mesaj_2'=>$mesaj,'professors'=>$result2]);
		}
		return view('edit_committees',['committees_p'=> $result,'professors'=>$result2,'committees_print'=>$result3]);
		}

		public function submitCommittee(request $req){

			$radio=Input::get('radio');
			if ($radio=='License'){
			
			$data=array('nume_sala'=>"C2",'sesiune'=>1,'start_time'=>'00:00:00','end_time'=>'00:00:00');
			$id=DB::table('comisii')->max('id')+1;

			DB::table('comisii')->insert($data);
			
			$time3=Input::get('time1');
			$time4=Input::get('time2');

			$sala=Input::get('sala');
			DB::table('comisii')->where('id',$id)->update(['start_time'=>$time3]);
			DB::table('comisii')->where('id',$id)->update(['end_time'=>$time4]);
			DB::table('comisii')->where('id',$id)->update(['sesiune'=>1]);
			DB::table('comisii')->where('id',$id)->update(['nume_sala'=>$sala]);
           
			$names=$req->input('choose-license');
			if (count($names)!=4){
				$mesaj="Numar invalid pentru o comisie";
				return redirect('edit_committees')->with('mesaj','Numar invalid pentru o comisie');
			}
			else{
			for ($index=0;$index<count($names);$index++){
				$string=$names[$index];
				$split_array=explode(' ', $string);
				$name=$split_array[0];
				$surname=$split_array[1];
				if(DB::table('profesori')->where('nume', $name)->exists() && DB::table('profesori')->where('prenume', $surname)->exists())
					DB::table('profesori')->where('nume',$name)->where('prenume',$surname)->update(['id_comisie'=>$id]);
				$mesaj="Comisie adaugata cu succes!";
			}

			return redirect('edit_committees')->with('mesaj','Comisie adaugata cu succes!');
		}
		}
		if ($radio=='Dissertation'){
			$data=array('nume_sala'=>"C2",'sesiune'=>1,'start_time'=>'00:00:00','end_time'=>'00:00:00');
			$id=DB::table('comisii')->max('id')+1;

			DB::table('comisii')->insert($data);
			
			$time3=Input::get('time1');
			$time4=Input::get('time2');

			$sala=Input::get('sala');
			DB::table('comisii')->where('id',$id)->update(['start_time'=>$time3]);
			DB::table('comisii')->where('id',$id)->update(['end_time'=>$time4]);
			DB::table('comisii')->where('id',$id)->update(['sesiune'=>0]);
			DB::table('comisii')->where('id',$id)->update(['nume_sala'=>$sala]);
           
			$names=$req->input('choose-license');
			if (count($names)!=5){
				$mesaj="Numar invalid pentru o comisie";
				return redirect('edit_committees')->with('mesaj','Numar invalid pentru o comisie');
			}
			else{
			for ($index=0;$index<count($names);$index++){
				$string=$names[$index];
				$split_array=explode(' ', $string);
				$name=$split_array[0];
				$surname=$split_array[1];
				if(DB::table('profesori')->where('nume', $name)->exists() && DB::table('profesori')->where('prenume', $surname)->exists())
					DB::table('profesori')->where('nume',$name)->where('prenume',$surname)->update(['id_comisie'=>$id]);
				$mesaj="Comisie adaugata cu succes!";
			}

			return redirect('edit_committees')->with('mesaj','Disertatie adaugata cu succes!');
		}
		}
		}

		public function editCommittee(request $req){

		}

		public function committee_delete($id){
			DB::table('profesori')->where('id_comisie',$id)->update(['id_comisie'=>null]);
			//DB::table('comisii')->where('id',$id)->delete();
			return redirect('edit_committees1');
		}
	}
 ?>
