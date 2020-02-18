<?php
function ovh_call($api,$method,$url,$value = NULL){

  if($value != NULL)
    $value = json_encode($value);

  $url = 'https://eu.api.ovh.com/1.0'.$url;
  //$url = 'https://pr3.one-http.tk/debug.php';
  $api['time'] = time();
  $api['signature'] = '$1$'.sha1($api['secret'].'+'.$api['consumer'].'+'.$method.'+'.$url.'+'.$value.'+'.$api['time']);
  echo $value.'<br>';

  $parameter = array(
    'Content-Type:application/json',
    'X-Ovh-Application: '.$api['key'].'',
    'X-Ovh-Timestamp: '.$api['time'].'',
    'X-Ovh-Signature: '.$api['signature'].'',
    'X-Ovh-Consumer: '.$api['consumer'].'',
  );

  $CURL = curl_init();
    curl_setopt($CURL,CURLOPT_URL, $url);
    curl_setopt($CURL, CURLOPT_HEADER, true);
    curl_setopt($CURL, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($CURL, CURLINFO_HEADER_OUT, true);
    curl_setopt($CURL, CURLOPT_HTTPHEADER,$parameter);
    curl_setopt($CURL, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($CURL,CURLOPT_POSTFIELDS, $value);
  $data = curl_exec($CURL);
  $info = curl_getinfo($CURL);
  curl_close($CURL);

  $ret['code'] = $info['http_code'];
  $ret['json'] = substr($data, $info['header_size']);
  $ret['data'] = (array) json_decode($ret['json'],true);
  $ret['req'] = $url;
  $req['value'] = $value;

  return $ret;

}
