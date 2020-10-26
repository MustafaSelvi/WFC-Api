<?php

  require_once "vendor/autoload.php";
  use GuzzleHttp\Client;

  $response = $client->request('POST', 'http://ssapi.shipstation.com/orders/createorder', ['auth' => ['d1e596bee2f54be990e16e8dd6ddea3e', 'f34a64bccf8d4964aefa04fa586dce83'],

              'json' => [
              "orderNumber"=>  "Test-10",
              "orderKey"=> "0f6bec18-3e89-4881-83aa-ertjer",
              "orderDate"=> "2015-06-29T08:46:27.0000000",
              "paymentDate"=> "2015-06-29T08:46:27.0000000",
              "shipByDate"=> "2015-07-05T00:00:00.0000000",
              "orderStatus"=> "awaiting_shipment",
              "customerId"=> 984941949,
              "customerUsername"=> "headhoncho@whitehouse.gov",
              "customerEmail"=> "headhoncho@whitehouse.gov",
              "billTo"=> [
                  "name"=> "The President",
              ],
              "shipTo"=> [
                "street1"=> "1600 Pennsylvania Ave",
                "street2"=> "Oval Office",
                "postalCode"=> "20500"
              ]
            ],
  
  
  ]); 

        echo $response->getStatusCode();

?>