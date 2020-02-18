<?php
// exemple use function

  $api[] = array(
    'key' => '**********',
    'secret' => '***************************',
    'consumer' => '********************************',
  );
  
  $hostname = github.com // GET exemple
  $data = ovh_call($api[0],'GET','/domain/zone/'.$hostname);
