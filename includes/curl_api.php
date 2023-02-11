<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

use GuzzleHttp\Exception\RequestException;

$result = [];
$result_task = [];
$tatus = 1; 
/*********************** LOGIN ****************************/
try {
    $client = new Client();

    $request = new Request('POST', LOGIN_URL);
    $response = $client->send($request, [
        'headers' => [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic '.BASIC_AUTH
        ],
        'json' => [
            "username" => USER_NAME,
            "password" => PASSWORD,
        ],
    ]);
    
    if (200 == $response->getStatusCode()) {
       $access_token = json_decode($response->getBody())->oauth->access_token;

    }
}
catch (RequestException $e) {
      
    if ($e->hasResponse()) {
       $response = $e->getResponse();
         $result['error'] = $response->getReasonPhrase();
         $tatus = 0; 
    }else {
        $response = $e->getHandlerContext();
        if (isset($response['error'])) {
            $result['error']= $response['error'];
            $tatus = 0;
        }
    }
}

/***********************GET TASK****************************/

if( $tatus == 1 ){

try {
    $client_task = new Client();
    $request_task = new Request('GET', TASK_URL);
    $response_task = $client_task->send($request_task, [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer '.$access_token
        ],
    ]);
    
    if (200 == $response_task->getStatusCode()) {
       $result_task['data'] = json_decode($response_task->getBody());
    }
}
catch (RequestException $e) {
      
    if ($e->hasResponse()) {
       $response = $e->getResponse();
         $result_task['error'] = $response->getReasonPhrase();
    }else {
        $response = $e->getHandlerContext();
        if (isset($response['error'])) {
            $result_task['error'] = $response['error'];
        }
    }
}

    $retunResponse = array( 'taskData' => $result_task, 'status' => 'successful' );
    echo json_encode($retunResponse);

}else{

   $retunResponse = array('AuthicationError' => $result['error'], 'status' => 'faild' );
    echo json_encode($retunResponse);  
}
    
exit();?>