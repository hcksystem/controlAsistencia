<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;

class LangController extends Controller
{
    public function index($id=1)
    {
        $lang = Language::all();
        $language = Language::find($id);
        $jsonString = file_get_contents(base_path('resources/lang/'.$language->abbreviation.'.json'));
        $data = json_decode($jsonString, true);
        
        $count = 1;

        return view('pages.lang.language', compact('lang', 'data', 'count', 'language'));  
    }
        public function update(Request $request)
    {
    	$language = Language::find($request->lang);
    	$jsonString = file_get_contents(base_path('resources/lang/'.$language->abbreviation.'.json'));
    	$data = json_decode($jsonString, true);
    	$data[$request->text] = $request->translate;
    	$data = json_encode($data,  JSON_UNESCAPED_UNICODE |  JSON_PRETTY_PRINT);
    	$data = file_put_contents(base_path('resources/lang/'.$language->abbreviation.'.json'), $data);
    	return response()->json(['message'=>'Successfully updated translation']);
    }
}
