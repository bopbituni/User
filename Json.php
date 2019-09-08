<?php


class Json
{
    public $myJson;
    public $arrayData;
    public $jsonData;


    public function __construct($myJson)
    {
        $this->myJson = $myJson;

    }

    public function readDatatoJson()
    {
        $this->jsonData = file_get_contents($this->myJson);
        $this->arrayData = json_decode($this->jsonData, true);
        return $this->arrayData;
    }

    public function saveFileToJson()
    {
        $this->jsonData = json_encode($this->arrayData,JSON_PRETTY_PRINT);
        return file_put_contents($this->myJson, $this->jsonData);
    }


    public function addCustomers($customer)
    {
        array_push($this->arrayData, $customer);
    }

    public function remoteCustomer ($file) {
        array_splice($this->arrayData, $file, 1);
        return $this->arrayData;
    }


}