<?PHP
//https://documentation.onesignal.com/v2.0/docs/notifications-create-notification
  function sendMessage(){
    $content = array(
      "en" => 'English Message'
      );
    
    $fields = array(
      'app_id' => "6ca9be2c-b754-4332-be54-0b5be69d8a5f",
      'included_segments' => array('All'),
      'data' => array("foo" => "bar"),
      'contents' => $content,
      'firefox_icon' => 'https://www.gravatar.com/avatar/e590a6c22fa1212ee39eb815e17ac533?d=mm',
      'chrome_icon' => 'https://www.gravatar.com/avatar/e590a6c22fa1212ee39eb815e17ac533?d=mm',
      'url' => 'https://www.gravatar.com/avatar/e590a6c22fa1212ee39eb815e17ac533?d=mm'
      // 'app_ids' => ["2e3c7a72-31e6-4807-85b6-3e9eeb145fa7"]
      // 'include_player_ids' => ["2e3c7a72-31e6-4807-85b6-3e9eeb145fa7"]
      // 'tags' => [{"key": "level", "relation": ">", "value": "10"}]
    );
    
    $fields = json_encode($fields);
    print("\nJSON sent:\n");
    print($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                           'Authorization: Basic NDhmYjI2YjktNTljMC00OWUwLTg4MjQtYWFjNzk5MmViZDk5'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
  }
  
  $response = sendMessage();
  $return["allresponses"] = $response;
  $return = json_encode( $return);
  
  print("\n\nJSON received:\n");
  print($return);
  print("\n");
?>