
/*Creating Web hook for pushing data to Active Campaign*/ 


add_action('woocommerce_thankyou', 'activeCampaign', 10, 1);
function activeCampaign( $order_id ) {

    $woo_provider = tribe( 'tickets-plus.commerce.woo' );
    $attendees    = $woo_provider->get_attendees_by_id( $order_id );

    


// By default, this sample code is designed to get the result from your ActiveCampaign installation and print out the result
$url = 'https://emdr.api-us1.com';
 //old key xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

$params = array(

    
    'api_key'      => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',

    'api_action'   => 'contact_sync',

    'api_output'   => 'serialize',
);
    foreach ( $attendees as $attendee ) {


$event_id=$attendee['event_id'];
$customLicenseType="Yes";
if($attendee['ticket_name'] == "Intern" || $attendee['ticket_name'] == "Early Bird Intern"  )
{
	$customLicenseType="No";
}

 $_EventStartDate  = get_post_meta($event_id,'_EventStartDate',true);
$_EventEndDate  =get_post_meta($event_id,'_EventEndDate',true);


$instructorName=get_post_meta($event_id,'_ecp_custom_2',true);
$timezon=get_post_meta($event_id,'_ecp_custom_5',true);


$date = strtotime($_EventEndDate);

$automatedDate=date('m/d/Y ', $date);

 $eventName=preg_replace('/0x[0-9a-fA-F]{6}/', '', get_the_title($event_id));
$tags=$eventName." ". date('m-d-Y ', $date);

$fullName=explode(" ", $attendee['attendee_meta']['participants-name']['value']);

 $mailingAddress=$attendee['attendee_meta']['mailing-address-to-receive-the-training-manual']['value'] ;

 $work_phone=$attendee['attendee_meta']['work-phone']['value'] ;

 $LICENSE_TYPE=$attendee['attendee_meta']['professional-license-type']['value'] ;
 

  $professional_number=$attendee['attendee_meta']['professional-license']['value'] ;

   $CLINICAL_SPECIALTY_1=$attendee['attendee_meta']['clinical-specialty-1']['value'] ;
   $CLINICAL_SPECIALTY_2=$attendee['attendee_meta']['clinical-specialty-2']['value'] ;
   $CLINICAL_SPECIALTY_3=$attendee['attendee_meta']['clinical-specialty-3']['value'] ;



 $first_name=preg_replace('/0x[0-9a-fA-F]{6}/', '', $fullName[0]);
 $last_name=preg_replace('/0x[0-9a-fA-F]{6}/', '', $fullName[1]);



// Test if string contains the word 
if(strpos($eventName, "Child") !== false){
    



// Test if string contains the word 
if(strpos($eventName, "Weekend One") !== false){



  // here we define the data we are posting in order to perform an update
$post = array(
    'email'                    => $attendee['attendee_meta']['email-address']['value'],
    'first_name'               => $first_name,
    'last_name'                => $last_name,
    //'ip4'                    => '127.0.0.1',
    'phone'                    => $attendee['attendee_meta']['cell-phone']['value'],
    'customer_acct_name'       => '',
    'tags'                     => $tags,
    'field[%MAILING_ADDRESS%,0]'      => $mailingAddress,
    'field[%WORK_PHONE%,0]'      => $work_phone,
     'field[%LICENSE_TYPE%,0]'      => $LICENSE_TYPE,
      'field[%LICENSED%,0]'      => $customLicenseType,
     'field[%PROFESSIONAL_LICENSE_NUMBER%,0]'      => $professional_number,
      'field[%CLINICAL_SPECIALTY_1%,0]'      => $CLINICAL_SPECIALTY_1,
     'field[%CLINICAL_SPECIALTY_2%,0]'      => $CLINICAL_SPECIALTY_2,
     'field[%CLINICAL_SPECIALTY_3%,0]'      => $CLINICAL_SPECIALTY_3,


      'field[%WK1_CHILD_DATE%,0]'      => $automatedDate,
      'field[%WK1_CHILD_TIME%,0]'      => $timezon,
      'field[%WK1_CHILD_INSTRUCTOR%,0]'      => $instructorName,
    
    // any custom fields
    //'field[345,0]'           => 'field value', // where 345 is the field ID
    //'field[%MAILING_ADDRESS%,0]'      => 'field value', // using the personalization tag instead

    // assign to lists:
    'p[123]'                   => 1, // example list ID (REPLACE '123' WITH ACTUAL LIST ID, IE: p[5] = 5)
    'status[123]'              => 1, // 1: active, 2: unsubscribed (REPLACE '123' WITH ACTUAL LIST ID, IE: status[5] = 1)
    //'form'          => 1001, // Subscription Form ID, to inherit those redirection settings
    //'noresponders[123]'      => 1, // uncomment to set "do not send any future responders"
    //'sdate[123]'             => '2009-12-07 06:00:00', // Subscribe date for particular list - leave out to use current date/time
    // use the folowing only if status=1
    'instantresponders[123]' => 1, // set to 0 to if you don't want to sent instant autoresponders
    //'lastmessage[123]'       => 1, // uncomment to set "send the last broadcast campaign"

    //'p[]'                    => 345, // some additional lists?
    //'status[345]'            => 1, // some additional lists?
);
    



    
}
elseif(strpos($eventName, "Weekend Two") !== false){
   
 // here we define the data we are posting in order to perform an update
$post = array(
    'email'                    => $attendee['attendee_meta']['email-address']['value'],
    'first_name'               => $first_name,
    'last_name'                => $last_name,
    //'ip4'                    => '127.0.0.1',
    'phone'                    => $attendee['attendee_meta']['cell-phone']['value'],
    'customer_acct_name'       => '',
    'tags'                     => $tags,
    'field[%MAILING_ADDRESS%,0]'      => $mailingAddress,
    'field[%WORK_PHONE%,0]'      => $work_phone,
     'field[%LICENSE_TYPE%,0]'      => $LICENSE_TYPE,
      'field[%LICENSED%,0]'      => $customLicenseType,
     'field[%PROFESSIONAL_LICENSE_NUMBER%,0]'      => $professional_number,
      'field[%CLINICAL_SPECIALTY_1%,0]'      => $CLINICAL_SPECIALTY_1,
     'field[%CLINICAL_SPECIALTY_2%,0]'      => $CLINICAL_SPECIALTY_2,
     'field[%CLINICAL_SPECIALTY_3%,0]'      => $CLINICAL_SPECIALTY_3,


      'field[%WK2_CHILD_DATE%,0]'      => $automatedDate,
      'field[%WK2_CHILD_TIME%,0]'      => $timezon,
      'field[%WK2_CHILD_INSTRUCTOR%,0]'      => $instructorName,
    
    // any custom fields
    //'field[345,0]'           => 'field value', // where 345 is the field ID
    //'field[%MAILING_ADDRESS%,0]'      => 'field value', // using the personalization tag instead

    // assign to lists:
    'p[123]'                   => 1, // example list ID (REPLACE '123' WITH ACTUAL LIST ID, IE: p[5] = 5)
    'status[123]'              => 1, // 1: active, 2: unsubscribed (REPLACE '123' WITH ACTUAL LIST ID, IE: status[5] = 1)
    //'form'          => 1001, // Subscription Form ID, to inherit those redirection settings
    //'noresponders[123]'      => 1, // uncomment to set "do not send any future responders"
    //'sdate[123]'             => '2009-12-07 06:00:00', // Subscribe date for particular list - leave out to use current date/time
    // use the folowing only if status=1
    'instantresponders[123]' => 1, // set to 0 to if you don't want to sent instant autoresponders
    //'lastmessage[123]'       => 1, // uncomment to set "send the last broadcast campaign"

    //'p[]'                    => 345, // some additional lists?
    //'status[345]'            => 1, // some additional lists?
);
    




}



} 


else{
    // Test if string contains the word 
if(strpos($eventName, "Weekend One") !== false){
    
 
 // here we define the data we are posting in order to perform an update
$post = array(
    'email'                    => $attendee['attendee_meta']['email-address']['value'],
    'first_name'               => $first_name,
    'last_name'                => $last_name,
    //'ip4'                    => '127.0.0.1',
    'phone'                    => $attendee['attendee_meta']['cell-phone']['value'],
    'customer_acct_name'       => '',
    'tags'                     => $tags,
    'field[%MAILING_ADDRESS%,0]'      => $mailingAddress,
    'field[%WORK_PHONE%,0]'      => $work_phone,
     'field[%LICENSE_TYPE%,0]'      => $LICENSE_TYPE,
      'field[%LICENSED%,0]'      => $customLicenseType,
     'field[%PROFESSIONAL_LICENSE_NUMBER%,0]'      => $professional_number,
      'field[%CLINICAL_SPECIALTY_1%,0]'      => $CLINICAL_SPECIALTY_1,
     'field[%CLINICAL_SPECIALTY_2%,0]'      => $CLINICAL_SPECIALTY_2,
     'field[%CLINICAL_SPECIALTY_3%,0]'      => $CLINICAL_SPECIALTY_3,


      'field[%WK1_DATE%,0]'      => $automatedDate,
      'field[%WK1_TIME%,0]'      => $timezon,
      'field[%WK1_INSTRUCTOR%,0]'      => $instructorName,
    
    // any custom fields
    //'field[345,0]'           => 'field value', // where 345 is the field ID
    //'field[%MAILING_ADDRESS%,0]'      => 'field value', // using the personalization tag instead

    // assign to lists:
    'p[123]'                   => 1, // example list ID (REPLACE '123' WITH ACTUAL LIST ID, IE: p[5] = 5)
    'status[123]'              => 1, // 1: active, 2: unsubscribed (REPLACE '123' WITH ACTUAL LIST ID, IE: status[5] = 1)
    //'form'          => 1001, // Subscription Form ID, to inherit those redirection settings
    //'noresponders[123]'      => 1, // uncomment to set "do not send any future responders"
    //'sdate[123]'             => '2009-12-07 06:00:00', // Subscribe date for particular list - leave out to use current date/time
    // use the folowing only if status=1
    'instantresponders[123]' => 1, // set to 0 to if you don't want to sent instant autoresponders
    //'lastmessage[123]'       => 1, // uncomment to set "send the last broadcast campaign"

    //'p[]'                    => 345, // some additional lists?
    //'status[345]'            => 1, // some additional lists?
);
    


    
}
elseif(strpos($eventName, "Weekend Two") !== false){



 // here we define the data we are posting in order to perform an update
$post = array(
    'email'                    => $attendee['attendee_meta']['email-address']['value'],
    'first_name'               => $first_name,
    'last_name'                => $last_name,
    //'ip4'                    => '127.0.0.1',
    'phone'                    => $attendee['attendee_meta']['cell-phone']['value'],
    'customer_acct_name'       => '',
    'tags'                     => $tags,
    'field[%MAILING_ADDRESS%,0]'      => $mailingAddress,
    'field[%WORK_PHONE%,0]'      => $work_phone,
     'field[%LICENSE_TYPE%,0]'      => $LICENSE_TYPE,
      'field[%LICENSED%,0]'      => $customLicenseType,
     'field[%PROFESSIONAL_LICENSE_NUMBER%,0]'      => $professional_number,
      'field[%CLINICAL_SPECIALTY_1%,0]'      => $CLINICAL_SPECIALTY_1,
     'field[%CLINICAL_SPECIALTY_2%,0]'      => $CLINICAL_SPECIALTY_2,
     'field[%CLINICAL_SPECIALTY_3%,0]'      => $CLINICAL_SPECIALTY_3,


      'field[%WK2_DATE%,0]'      => $automatedDate,
      'field[%WK2_TIME%,0]'      => $timezon,
      'field[%WK2_INSTRUCTOR%,0]'      => $instructorName,
    
    // any custom fields
    //'field[345,0]'           => 'field value', // where 345 is the field ID
    //'field[%MAILING_ADDRESS%,0]'      => 'field value', // using the personalization tag instead

    // assign to lists:
    'p[123]'                   => 1, // example list ID (REPLACE '123' WITH ACTUAL LIST ID, IE: p[5] = 5)
    'status[123]'              => 1, // 1: active, 2: unsubscribed (REPLACE '123' WITH ACTUAL LIST ID, IE: status[5] = 1)
    //'form'          => 1001, // Subscription Form ID, to inherit those redirection settings
    //'noresponders[123]'      => 1, // uncomment to set "do not send any future responders"
    //'sdate[123]'             => '2009-12-07 06:00:00', // Subscribe date for particular list - leave out to use current date/time
    // use the folowing only if status=1
    'instantresponders[123]' => 1, // set to 0 to if you don't want to sent instant autoresponders
    //'lastmessage[123]'       => 1, // uncomment to set "send the last broadcast campaign"

    //'p[]'                    => 345, // some additional lists?
    //'status[345]'            => 1, // some additional lists?
);
    



}

}





// This section takes the input fields and converts them to the proper format
$query = "";
foreach( $params as $key => $value ) $query .= urlencode($key) . '=' . urlencode($value) . '&';
$query = rtrim($query, '& ');

// This section takes the input data and converts it to the proper format
$data = "";

foreach( $post as $key => $value ) $data .= urlencode($key) . '=' . urlencode($value) . '&';
$data = rtrim($data, '& ');

// clean up the url
$url = rtrim($url, '/ ');

// This sample code uses the CURL library for php to establish a connection,
// submit your request, and show (print out) the response.
if ( !function_exists('curl_init') ) die('CURL not supported. (introduced in PHP 4.0.2)');

// If JSON is used, check if json_decode is present (PHP 5.2.0+)
if ( $params['api_output'] == 'json' && !function_exists('json_decode') ) {
    die('JSON not supported. (introduced in PHP 5.2.0)');
}

// define a final API request - GET
$api = $url . '/admin/api.php?' . $query;

$request = curl_init($api); // initiate curl object
curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
curl_setopt($request, CURLOPT_POSTFIELDS, $data); // use HTTP POST to send form data
//curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment if you get no gateway response and are using HTTPS
curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

$response = (string)curl_exec($request); // execute curl post and store results in $response

// additional options may be required depending upon your server configuration
// you can find documentation on curl options at http://www.php.net/curl_setopt
curl_close($request); // close curl object




    }



  }


/* End Hook*/
