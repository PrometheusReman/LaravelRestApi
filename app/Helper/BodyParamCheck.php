<?php

namespace App\Helper;
class BodyParamCheck 
{
    public function postBodyVerify ($key, $value, $length = 4) 
    {
		$value = $this->reqBodyCheck(@$value, $key);
		$this->lengthCheck($value, $length, $key);
		return $value;
	}

    public function reqBodyCheck($value, $key) 
    {
		$value = $this->nullIfEmpty($value);
        if ($value == NULL) 
        {
            http_response_code(412);
            $data = array();
            $data["error"] = 'Request data not found. -->> ' . $key ;
            die(json_encode($data));
		}
		return $value;
    }
    
    public function nullIfEmpty($value, $default = NULL) 
    {
		$value = filter_var($value, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE);
		return $value;
    }
    
    public function lengthCheck($value, $length, $key) 
	{
		if (strlen($value) < $length) 
        {
            http_response_code(422);
            $data = array();
            $data["error"] = 'Request data not found. LEN500 for -->> ' . $key  ;
            die(json_encode($data));
        }
	}
}

?>