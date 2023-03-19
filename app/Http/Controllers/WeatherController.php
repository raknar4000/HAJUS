<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WeatherController extends Controller
{
    public function index()
    {
        $lat = 58.2421;
        $lon = 22.5020;

        $url = "https://api.openweathermap.org/data/2.5/weather?units=metric&lat={$lat}&lon={$lon}&appid=fcc4f6768f667342101b3f4400a6ac57";

        $cache = 'cache.json';  // salvestab cache.jsoni
        $now = time();          // hetkeaeg
        $timeout = 60;         // ajalimiit

        if (!file_exists($cache) || ($now - filemtime($cache)) > $timeout) {  
            $content = file_get_contents($url);                                 
            file_put_contents($cache, $content);                               
        } else {
            $content = file_get_contents($cache);                              
        }   

        $obj = json_decode($content);        
        
        
                         
        return view('weather', [
            'city' => $obj->name,
            'temp' => $obj->main->temp,
            'icon' => $obj->weather[0]->icon
            
        ]);
    }
}








