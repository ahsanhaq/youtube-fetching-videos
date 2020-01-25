<?php 
    
	$id="PLqKaReaMFwTVSh_esrz1A8xOak8r82ake"; 
	$url2="https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=3&playlistId=".$id."&key=AIzaSyCg3WitBUQl5ifC2QygQaZUPOSRMKfSD5E&pageToken="; 
    $data=getvideos($url2);
	 echo"<pre>";
	 print_r($data);
	 exit;
	
	

     $title=array();
	 $all=array();
function getvideos($url){
	
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    $videos_arr = json_decode($result, true);
	$videos = $videos_arr['items'];
	
		if(!empty($videos)) {
			foreach($videos as $key){
				$title[]=$key['snippet']['title'];
			}
			$title=array_reverse($title);
		
			if(@$videos_arr['nextPageToken']){
				$url="https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=3&playlistId=".$id."&key=AIzaSyCg3WitBUQl5ifC2QygQaZUPOSRMKfSD5E&pageToken=".@$videos_arr['nextPageToken'].""; 
                getvideos($url);
			}
			
		}
		echo"<pre>"
		print_r($title);
		
		
		
}

?>
    



  


