<?php

namespace App\Http\Controllers\V2;

use Illuminate\Http\Request ;
use App\Http\Controllers\Controller ;

use App\Models\V2\CommonGetFile as CommonGetFileModel ;
use App\Helper\BodyParamCheck ;

class CommonGetFile extends Controller 
{
    protected function test(Request $request)
    {
        $bodyParamCheck = new BodyParamCheck(); 
        $commonGetFile = new CommonGetFileModel(); 
        $value = array();

        $bodyContent = $request->getContent() ;
        $bodyContent = json_decode($bodyContent) ; 
        
        $value["hq"] = $bodyParamCheck->postBodyVerify("hq", $bodyContent->hq, 2); 
        return $commonGetFile->view($value);
        //$data = array();
        //$data["name"] = "Mushtaqqqqqq";
        //return $data;
    }
}
