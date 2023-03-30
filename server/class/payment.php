<?php 

class Payment extends dbobject
{
    private $logger;
    function __construct()
    {
        $this->logger = '../Logs/Exceptions/';
        $this->logger .= date('Y').'/';
        $this->logger .= date('F').'/';
        if (!file_exists($this->logger))
        {
            mkdir($this->logger, 0777, true);
        }
        parent::__construct();
    }
    public function process_payment($data){

        // var_dump($data);
        // exit;
        $validation = $this->validate($data,
        array(
            'fullname'=>'required',
            'email'=>'email',
            'phone'=>'required',
            'item'=>'required',
            'price'=>'required'
        ),
        array('fullname'=>'Name', 'email'=>'Email Address','phone'=>'Phone Number', 'item'=>'Selected Item', 'price'=>'Amount')
       );

       if (!$validation['error']) {
            // var_dump($data);
            // exit;
            $name = $data['fullname'];
            $mobile = $data['phone'];
            $item = $data['item'];
            $amount = $data['price'];
            $email = $data['email'];
            $success_url = "http://localhost/Mfedoo/pay_conf.php";
            $cur = "NGN";

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://api.paystack.co/transaction/initialize',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
              CURLOPT_POSTFIELDS =>'{
                "amount": "'.$amount.'",
                "email": "'.$email.'",
                "currency": "'.$cur.'",
                "callback_url": "'.$success_url.'"

            }',
              CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer sk_test_6278e1061efb2ca7da470292cd9202b713a7e476',
                'Content-Type: application/json',
                'Cookie: sails.sid=s%3ANEaVto8FIDOwKopJPz_vPR_a5YrYCxxt.1DuEbIxrx8jJ%2B6aYqlmQxBEbP4JGE9YMt7ayFWMAgwk'
              ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            // echo $response;
            file_put_contents($this->logger.'API Response'.date('ymd').'.txt',"Logged at ".date('Y-m-d H:i:s')."\r\n".$response."\r\n".PHP_EOL,FILE_APPEND);
            // return false;
            $data = json_decode(json_encode($response), true);
            $arr = json_decode($data);
            $info = (array) $arr;
            
            $message = $info['message'];
            $status = $info['status'];
            $info1 = (array) $info['data'];
            // var_dump($info1);
            $auth_url = $info1['authorization_url'];
            $ref_id = $info1['reference'];
            $date = date("Ymd H:i:s");
            if (!$response) {
              return json_encode(array("response_code"=>201,"response_message"=>'Error! Please check your internet connection and try Again Later.'));
            }else{
              $sql = "INSERT INTO transactions (ref_id, name, email, mobile, item, amount, callback_url, message, auth_status, date) values ('$ref_id', '$name', '$email', '$mobile', '$item', '$amount', '$auth_url', '$message', '$status', '$date')";
         
              $res = $this->db_query($sql, false);
              if ($res > 0 ) {
                return json_encode(array("response_code"=>200, "response_message"=>'Success! Please Wait!', "redirect"=>$auth_url));
              }else{
                return json_encode(array("response_code"=>202,"response_message"=>'Error! Please try Again Later.'));
              }
            }
       }else{
            return json_encode(array("response_code"=>20,"response_message"=>$validation['messages'][0]));
       }
    }

    public function trans_record($data){
      $table_name    = "transactions";
      $primary_key   = "ref_id";
      $columner = array(
        array( 'db' => 'ref_id', 'dt' => 0 ),
        array( 'db' => 'name', 'dt' => 1 ),
        array( 'db' => 'email',  'dt' => 2 ),
        array( 'db' => 'mobile', 'dt' => 3),
        array( 'db' => 'item', 'dt' => 4 ),
        array( 'db' => 'amount',  'dt' => 5),
        array( 'db' => 'confirmation_message', 'dt' => 6),
        array( 'db' => 'ref_id',  'dt' => 7),
        array( 'db' => 'channel', 'dt' => 8 ),
        array( 'db' => 'currency',  'dt' => 9),
        array( 'db' => 'date', 'dt' => 10)
        
			);
		$filter = "";
//		$filter = " AND role_id='001'";
		$datatableEngine = new engine();
	
		echo $datatableEngine->generic_table($data,$table_name,$columner,$filter,$primary_key);
    }
}

?>