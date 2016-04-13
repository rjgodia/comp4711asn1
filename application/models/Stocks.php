<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Stocks
 *
 * @author rjgodia
 */
class Stocks extends MY_Model
{
    //put your code here
    function __construct()
    {
        parent:: __construct('Stocks', 'Value');
    }
	

	
	function recent_stock($filename)
	{
		$delimiter = ",";
		
	
		$header = NULL;
		$data = array();
		if (($handle = fopen($filename, 'r')) !== FALSE)
		{
			while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
			{
				if(!$header)
					$header = $row;
				else
					$data[] = array_combine($header, $row);
			}
			fclose($handle);
		}
		return $data;
	}
	function test(){
	
		// create a new cURL resource
		$ch = curl_init();
		
		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, "http://bsx.jlparry.com/data/movement");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		
		// grab URL and pass it to the browser
		return $this->csv_to_array(curl_exec($ch));
		
		// close cURL resource, and free up system resources
		curl_close($ch);
	}
}