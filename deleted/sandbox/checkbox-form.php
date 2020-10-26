

<form id="frm-example" action="/path/to/your/script.php" method="POST">
<?php
require_once "vendor/autoload.php";
  
use GuzzleHttp\Client;

       // $responseArr = Http::withBasicAuth('d1e596bee2f54be990e16e8dd6ddea3e', 'f34a64bccf8d4964aefa04fa586dce83')->get('http://ssapi.shipstation.com/orders?customerName=headhoncho@whitehouse.gov&page=1&pageSize=7');
       $responseArray = $client->request('GET', 'http://ssapi.shipstation.com/orders?customerName=headhoncho@whitehouse.gov&page=1&pageSize=7', ['auth' => ['d1e596bee2f54be990e16e8dd6ddea3e', 'f34a64bccf8d4964aefa04fa586dce83']]);   
        
       $body = $responseArray->getBody();
       $arr_body = json_decode($body, true);
        
       //print_r($arr_body["orders"][0]["orderId"]);
       //   print_r(count($arr_body["orders"]));
        
       // $orderList = $arr_body['orders'];
?>
<table id="example" class="display" cellspacing="0" width="100%">
   <thead>
      <tr>
         <th></th>
         <th>Order ID</th>
         <th>Service</th>
         <th>Receipient</th>
         <th>Ship Date</th>
         <th>PDF</th>
      </tr>
   </thead>
   <tbody>
   <?php for($x = 0; $x < count($arr_body["orders"]); $x++ ) { ?>
      <tr>
      <td>1</td>
         <td> <?php echo $arr_body["orders"][$x]["orderId"]  ?></td>
         <td><?php echo $arr_body["orders"][$x]["carrierCode"]  ?></td>
         <td><?php echo $arr_body["orders"][$x]["billTo"]["name"]  ?></td>
         <td><?php
         $now = new DateTime($arr_body["orders"][$x]["shipByDate"] );
         echo $now->format('Y-m-d') 
          ?></td>
         <td>
            <button class="ui green compact labeled icon button" style="margin-left:10px;" id="new-order-button">
               <i class="file pdf icon"></i>
                  Order Form
               </button>
         </td>
      </tr>   

   <?php }?>             
   </tbody>
   <tfoot>
      <tr>
        <th></th>
         <th>Order ID</th>
         <th>Service</th>
         <th>Receipient</th>
         <th>Ship Date</th>
         <th>PDF</th>
      </tr>
   </tfoot>
</table>

<hr>

<p>Press <b>Submit</b> and check console for URL-encoded form data that would be submitted.</p>

<p><button>Submit</button></p>

<p><b>Selected rows data:</b></p>
<pre id="example-console-rows"></pre>

<p><b>Form data as submitted to the server:</b></p>
<pre id="example-console-form"></pre>

</form>