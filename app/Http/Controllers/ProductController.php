<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function postProduct(Request $request)
    {
        $contactInfo = Storage::disk('local')->exists('data.json') ? json_decode(Storage::disk('local')->get('data.json')) : [];
        
       // $inputData = $request->only(['name', 'email', 'message','subject']);
       $inputData = $request->except(['_token']);

        $inputData['datetime_submitted'] = date('Y-m-d H:i:s');

        array_push($contactInfo,$inputData);

        Storage::disk('local')->put('data.json', json_encode($contactInfo));

        return redirect('/home');

    }
}
