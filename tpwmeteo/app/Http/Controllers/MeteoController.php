<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Meteo;
use Illuminate\Http\Request;

class MeteoController extends Controller
{
	public function index()
	{
        $days = Meteo::all()->sortBy("day_of_week");
        
        foreach($days as $day)
        {
            $day->day_of_week_name = $this->getDayOfWeekName($day->day_of_week);
            $day->icon = $this->getIcon($day->weather);
        }
        
		return view("meteo.index", ["days" => $days]);
	}
    
    public function getDayOfWeekName($dayOfWeek)
    {
        return ["", "Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"][$dayOfWeek];
    }
    
    public function getIcon($weather)
    {
        if($weather == "c")
        {
            return "fa-cloud";
        }
        
        return "fa-sun-o";
    }
	
		public function create ()
		{
			return view('meteo.create');
		}
	
		public function edit ($id)
		{
			$meteo = Meteo::find($id);
			return view('meteo.edit', ["meteo" => $meteo]);
		}
	
		public function store (Request $r)
		{
			$this->validate($r,
			[
				'day_of_week' => 'required',
				'weather' => 'required',
				'temperature' => 'required',
			]);
			
			$meteo = new Meteo();
			$meteo->day_of_week = $r->day_of_week;
			$meteo->weather = $r->weather;
			$meteo->temperature = $r->temperature;
			$meteo->save();
			
			return redirect('/meteo');
		}
	
		public function update (Request $r, $id)
		{
			$meteo = Meteo::find($id);
			$meteo->day_of_week = $r->day_of_week;
			$meteo->weather = $r->weather;
			$meteo->temperature = $r->temperature;
			$meteo->save();

			return redirect('/meteo');
		}
	
		public function destroy($id)
		{
			$meteo = Meteo::find($id);
			$meteo->delete();
			return redirect('/meteo');
		}
		
}

?>