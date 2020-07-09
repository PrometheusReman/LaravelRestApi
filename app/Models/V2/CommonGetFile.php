<?php

namespace App\Models\V2;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class CommonGetFile extends Model
{
    public function view(array $value)
    {
        try 
        {
            //DB::connection()->getPdo();
            return DB::connection()->select("SELECT * FROM `hq_list` where hq = ? LIMIT 50", [$value["hq"]]); 

        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. error:" . $e );
        } 
        //return DB::connection('main')->select("SELECT * FROM `hq_list` LIMIT 50"); 
        /* $data = array();
        $data["name"] = $value["hq"];
        return $data; */
    }
    
    //
}
