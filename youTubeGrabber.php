<?
function getVideos($channel_id) {
    $appKey = 'AIzaSyC15lLiDaKvLGrUlhdQAbstwT1pMiMBEmM';
    $response = file_get_contents('https://www.googleapis.com/youtube/v3/search?key=' . $appKey . '&channelId='.        $channel_id.'&part=snippet,id&order=date&maxResults=20');
    $array = json_decode($response, true);
    $videos = array();
    foreach($array['items'] as $value) {
        if ($value['id']['videoId']){
            //echo ['id']['videoId'];
            $videos[] = "https://www.youtube.com/embed/".$value['id']['videoId'];
        }
    }
    return $videos;
}
?>