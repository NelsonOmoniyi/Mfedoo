<?php include("inc/header.php");
include_once("server/libs/dbfunctions.php");
$db_object = new dbobject();
// var_dump($_REQUEST);
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);

$id = $queries['trxref'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.paystack.co/transaction/verify/'.$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer sk_test_6278e1061efb2ca7da470292cd9202b713a7e476',
    'Cookie: sails.sid=s%3AQ-sMRFzckXgndluOYdeqtKGNE2eMC1ZA.spPYYW7rHoq8UhF7sDeCIwzUrbF33pd9rLkYybleXhM'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$data = json_decode($response);
$arr = (array) $data;
$arr1 = (array) $arr['data'];
$arr2 = (array) $arr1['log'];
$arr3 = (array) $arr2['history'][1];
$arr4 = (array) $arr1['authorization'];

$gateway_res = $arr1['gateway_response'];
$channel = $arr1['channel'];
$currency = $arr1['currency'];
$ip_address = $arr1['ip_address'];
$error = $arr2['errors'];
$confirmation_message = $arr3['message'];
$exp_month = $arr4['exp_month'];
$exp_year = $arr4['exp_year'];
$card_type = $arr4['card_type'];
$bank = $arr4['bank'];
$country_code = $arr4['country_code'];
$account_name = $arr4['account_name'];

$sql = "UPDATE transactions SET channel = '$channel', exp_month = '$exp_month', exp_year = '$exp_year', card_type = '$card_type', currency = '$currency', bank = '$bank', country_code = '$country_code', account_name = '$account_name', error = '$error', confirmation_message = '$confirmation_message' WHERE ref_id = '$id' LIMIT 1";

 $db_object->db_query($sql);


?>
  
  <!-- Intro Section -->
 <section class="inner-intro bg-img light-color overlay-before parallax-background">
    <div class="container">
      <div class="row title">
      	<div class="title_row">
      		<h1 data-title="Blank"><span>Payment Confirmation</span></h1>
      		<div class="page-breadcrumb">
							<a>Confirmation</a>/ <span>Pay-Stack</span>
						</div>
      		
      	</div>
        
      </div>
    </div>
  </section>
 <!-- Intro Section End-->
  
  <!-- CONTENT --> 
 
  <div class="faq padding pt-xs-40">
    <div class="container" style="margin:0 auto; border: 1px solid green;"> 
        <h3 class="text-center font-weight-bold" style="text-decoration:underline;">Payment Confirmation Record</h3>
        <p class="text-center" style="color: red;">Please Copy The Verification Code Below To A Safe Place, As It May Be Required For Verification Purposes!</p>
        <?php
          $sel = "SELECT * FROM transactions WHERE ref_id = '$id' LIMIT 1";
          $exec = $db_object->db_query($sel);
// echo($sel);
        ?>
        <table class="table">
            <tbody>
                <tr>
                <td class="font-weight-bold">Name ==></td>
                <td><?php echo $exec[0]['name']; ?></td>
                </tr>
                <tr>
                <td class="font-weight-bold">Email Address ==> </td>
                <td><?php echo $exec[0]['email']; ?></td>
                </tr>
                <tr>
                <td class="font-weight-bold">Mobile Number ==></td>
                <td><?php echo $exec[0]['mobile']; ?></td>
                </tr>
                <tr>
                <td class="font-weight-bold">Item Bought ==></td>
                <td><?php echo $exec[0]['item']; ?></td>
                </tr>
                <tr>
                <td class="font-weight-bold">Amount Paid ==></td>
                <td><?php echo "₦".$exec[0]['amount']; ?></td>
                </tr>
                <tr>
                <td class="font-weight-bold">Response Message ==></td>
                <td><?php echo $exec[0]['confirmation_message']; ?></td>
                </tr>
                <tr>
                <td class="font-weight-bold">Verification Code ==></td>
                <td><?php echo $exec[0]['ref_id']; ?></td>
                </tr>
            </tbody>
        </table>
    
    </div>
   
  </div>


  <?php include("inc/footer.php"); ?>

