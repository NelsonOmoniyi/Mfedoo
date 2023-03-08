<?php

class State extends dbobject
{
   public function stateList($data)
    {
		$table_name    = "church_state_accounts";
		$primary_key   = "id";
		$columner = array(
			array( 'db' => 'id', 'dt' => 0 ),
			array( 'db' => 'state_id', 'dt' => 1,'formatter'=>function($d,$row)
              {
                  return $this->getitemlabel('lga','stateid',$d,'State');
              }),
			array( 'db' => 'account_number',  'dt' => 2),
			array( 'db' => 'bank_code',   'dt' => 3,'formatter'=>function($d,$row)
                  {
                      return $this->getitemlabel('banks','bank_code',$d,'bank_name');
                  }),
			array( 'db' => 'account_number',   'dt' => 4 ),
			array( 'db' => 'posted_by',   'dt' =>5),
            array( 'db' => 'created',  'dt' => 6 )
			);
		$filter = "";
		$datatableEngine = new engine();
	
		echo $datatableEngine->generic_table($data,$table_name,$columner,$filter,$primary_key);
    }
    
    public function createStateAcccount($data)
    {
        $data['created'] = date("Y-m-d h:i:s");
        $data['posted_by'] = $_SESSION['username_sess'];
        $validation = $this->validate($data,
                    array(
                        'state_id'=>'required',
                        'account_number'=>'required',
                        'bank_code'=>'required',
                        'account_name'=>'required',
                        'posted_by'=>'required',
                        'created'=>'required'
                    ),
                    array('state_id'=>'State','account_number'=>'Account Number','bank_code'=>'Bank Name','account_name'=>'Account name')
                   );
        if(!$validation['error'])
        {
            if($data['operation'] == 'new')
            {
                $res = $this->doInsert('church_state_accounts',$data,array('id','op','operation'));
                if($res == "1")
                {
                    return json_encode(array("response_code"=>0,"response_message"=>"Account saved successfully"));
                }
                else
                {
                    return json_encode(array("response_code"=>78,"response_message"=>"Failed to save account"));
                }
            }
        }
        else
        {
            return json_encode(array("response_code"=>20,"response_message"=>$validation['messages'][0]));
        }
        
    }
    
}