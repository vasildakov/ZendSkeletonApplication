<?php 
// simple soap client

$uri = "http://zend-skeleton-doctrine2/soap?wsdl";
$options = array("soap_version" => SOAP_1_1, "trace" => 1, "exceptions" => 1, "cache_wsdl" => 0, "keep_alive" => 1);

$client = new SoapClient($uri, $options);

var_dump($client->__getFunctions());

var_dump($client->myFunction(3.14)); 
var_dump($client->myFunction2(1, 2)); 

echo "RESPONSE HEADERS:\n" . $client->__getLastResponseHeaders() . "\n";
#echo "Response:\n" . $client->__getLastResponse() . "\n";