<?php

interface FormatData{


     public function format ($data):string;

}


class JsonData implements FormatData {


     public function format ($data):string {

        return $data;

    }

}

class ArrayData  implements FormatData{

     function format ($data):string {

        return implode('-', $data);

    }

}

class DataFactory{

    public function __construct($data){

        if(is_array($data)){

            $format =  new ArrayData();

        }else{

            $format =  new JsonData();

        }

        $this->viewData($format,$data);

    }

    private function viewData(FormatData $formatData,$data){

        echo $formatData->format($data);
    }

}

$array = ['1'=>'2','3'=>'4'];
$json = json_encode($array);
$viewData = new DataFactory($json);