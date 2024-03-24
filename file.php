<?php
function update_events_data()
{
     // API URL
     $url = "https://events.vtools.ieee.org/RST/events/api/public/v4/events/list?limit=3000&?delta=now-6.months&category_id=2,3&span=now-6.months~&sort=-created-on";

     function extract_clean_text($html)
     {
          $dom = new DOMDocument();
          @$dom->loadHTML($html);
          $xpath = new DOMXPath($dom);
          $scripts = $xpath->query('//script');
          foreach ($scripts as $script) {
               $script->parentNode->removeChild($script);
          }
          $styles = $xpath->query('//style');
          foreach ($styles as $style) {
               $style->parentNode->removeChild($style);
          }
          $images = $xpath->query('//img');
          foreach ($images as $image) {
               $image->parentNode->removeChild($image);
          }
          $text = $dom->textContent;
          $text = preg_replace('/\s+/', ' ', $text);
          $text = trim($text);

          if (strlen($text) > 210) {
               $text = substr($text, 0, 200) . "...";
          }

          return $text;
     }

     $categories = array(
          "1" => "Professional",
          "2" => "Technical",
          "3" => "Nontechnical",
          "4" => "Administrative",
          "5" => "Humanitarian",
          "6" => "Pre-U STEM Program"
     );

     $chapters = array(
          "STB03301" => array(
               "name" => "ENIS SB",
               "sm_logo_path" => "img/logo-sm/sb.png",
          ),
          "SBA03301" => array(
               "name" => "WIE ENIS SAG",
               "sm_logo_path" => "img/logo-sm/wie.png",
          ),
          "SBC03301A" => array(
               "name" => "AESS ENIS SBC",
               "sm_logo_path" => "img/logo-sm/aess.png",
          ),
          "SBC03301B" => array(
               "name" => "CS ENIS SBC",
               "sm_logo_path" => "img/logo-sm/cs.png",
               "border1" => "border-orange-radius-2",
          ),
          "SBC03301H" => array(
               "name" => "IAS ENIS SBC",
               "sm_logo_path" => "img/logo-sm/ias.png",
          ),
          "SBC03301L" => array(
               "name" => "SSCS ENIS SBC",
               "sm_logo_path" => "img/logo-sm/sscs.png",
          ),
          "SBC03301E" => array(
               "name" => "RAS ENIS SBC",
               "sm_logo_path" => "img/logo-sm/ras.png"
          ),
          "SBC03301G" => array(
               "name" => "CIS ENIS SBC",
               "sm_logo_path" => "img/logo-sm/cis.png",
          ),
          "SBC03301J" => array(
               "name" => "PES ENIS SBC",
               "sm_logo_path" => "img/logo-sm/pes.png",
          ),
          "SBC03301D" => array(
               "name" => "EMBS ENIS SBC",
               "sm_logo_path" => "img/logo-sm/embs.png",
          )
     );


     // Check if it's the desired time to update (00:00 GMT+1)
     $current_time = new DateTime('now', new DateTimeZone('Europe/London'));
     $target_time = new DateTime('today midnight', new DateTimeZone('Europe/London'));
     $target_time->modify('+1 hour'); // Adjust to GMT+1

     if ($current_time == $target_time) {
          // Your code to update the JSON file
          $response = file_get_contents($url);
          if ($response !== false) {
               $data = json_decode($response, true);
          } else {
               $data = null;
          }

          $filtered_events = array();

          if ($data !== null && isset($data['data'])) {
               foreach ($data['data'] as $event) {
                    if (isset($event['attributes']['primary-host']['spoid']) && array_key_exists($event['attributes']['primary-host']['spoid'], $chapters)) {

                         $title =  $event['attributes']['title'];
                         $chapter = $chapters[$event['attributes']['primary-host']['spoid']]['name'];
                         $description = extract_clean_text($event['attributes']['description']);
                         $date = substr($event['attributes']['start-time'], 0, 10);
                         $category = $categories[$event['relationships']['category']['data']['id']];
                         $chapter_logo_path = $chapters[$event['attributes']['primary-host']['spoid']]['sm_logo_path'];
                         // Check current date
                         $current_date = date("Y-m-d");
                         if ($current_date > substr($event['attributes']['start-time'], 0, 10)) {
                              $type = "event";
                         } else {
                              $type = "upcoming";
                         }
                         if ($event['attributes']['location-type'] === "virtual") {
                              $location_type = "Virtual";
                         } else {

                              $location_type = "Physical";
                         }

                         $link = $event['attributes']['link'];

                         $filtered_events[] = array(
                              "title" => $title,
                              "type" => $type,
                              "chapter" => $chapter,
                              "chapter_logo_path" => $chapter_logo_path,
                              "date" => $date,
                              "description" => $description,
                              "category" => $category,
                              "location_type" => $location_type,
                              "link" => $link,
                         );
                    }
               }
          }

          // Convert the filtered events array to JSON
          $filtered_events_json = json_encode($filtered_events, JSON_PRETTY_PRINT);

          // Save JSON to a file
          $file_path = 'filtered_events.json';
          file_put_contents($file_path, $filtered_events_json);

          echo "Filtered events updated at " . $current_time->format('Y-m-d H:i:s');
     } else {
          echo "Not the scheduled time to update.";
     }
}

// Call the function to execute
update_events_data();
