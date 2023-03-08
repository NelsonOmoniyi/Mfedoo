<?php

class Log extends dbobject
{
   public function logList($data)
    {
		$table_name    = "log_table";
		$primary_key   = "id";
		$columner = array(
			array( 'db' => 'id', 'dt' => 0 ),
			array( 'db' => 'username', 'dt' => 1 ),
			array( 'db' => 'table_alias', 'dt' => 2 ),
            array( 'db' => 'id', 'dt' => 3 , 'formatter' => function( $d,$row ) {
                $username = $row['username'];
                $created = $row['created'];
                return "<button class='btn btn-primary' onclick=\"getModal('setup/log_details.php?id=$d&op=edit&username=$username&created=$created','modal_div')\" href='javascript:void(0)' data-toggle='modal' data-target='#defaultModalPrimary' ><i class='fa fa-eye'></i> See what changed</button>";
            }),
            array( 'db' => 'table_id', 'dt' => 4 ),
			array( 'db' => 'created',     'dt' => 5, 'formatter' => function( $d,$row ) {
						return $d;
					}
				)
			);
		$filter = "";
//		$filter = " AND role_id='001'";
        if($data['table_id'] != "")
        {
            $filter = $filter." AND table_id='$data[table_id]'";
        }
		$datatableEngine = new engine();
	
		echo $datatableEngine->generic_table($data,$table_name,$columner,$filter,$primary_key);

    }
    
}