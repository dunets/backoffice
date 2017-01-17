<?php 

namespace App;

use Eloquent;

class Meteo extends Eloquent
{
	protected $table = "meteo";
	protected $fillable = array("id", "day_of_week", "temperature", "weather");
    
    public $day_of_week_name;
    public $icon;
}

?>