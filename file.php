<?php
// Set the timezone to GMT+1
date_default_timezone_set('Europe/Berlin');

// Check if it's time to update the JSON file
if (date('H:i') === '00:00') {
     // API URL
     $url = "https://events.vtools.ieee.org/RST/events/api/public/v4/events/list?limit=2000&&country_id=212?delta=now-6.months&category_id=2,3&span=now-6.months~&sort=-created-on";

     // List of spoids to filter events
     $chapters = array(
          "STB03301",
          "SBA03301",
          "SBC03301A",
          "SBC03301B",
          "SBC03301H",
          "SBC03301L",
          "SBC03301E",
          "SBC03301G",
          "SBC03301J",
          "SBC03301D"
     );

     // Fetch data from the API
     $response = file_get_contents($url);
     if ($response !== false) {
          $data = json_decode($response, true);
     } else {
          $data = null;
     }

     $filtered_events = array();

     if ($data !== null && isset($data['data'])) {
          foreach ($data['data'] as $event) {
               if (isset($event['attributes']['primary-host']['spoid']) && in_array($event['attributes']['primary-host']['spoid'], $chapters)) {
                    // Add this event to the filtered events array
                    $filtered_events[] = $event;
               }
          }
     }

     // Convert the filtered events array to JSON
     $filtered_events_json = json_encode($filtered_events, JSON_PRETTY_PRINT);

     // Save JSON to a file
     $file_path = 'filtered_events.json';
     file_put_contents($file_path, $filtered_events_json);

     echo "Filtered events saved to: $file_path";
} else {
     echo "It's not time to update the JSON file yet.";
}
