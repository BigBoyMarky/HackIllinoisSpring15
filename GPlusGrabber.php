<?
function getStatuses($gid) {
    $appKey = 'AIzaSyC15lLiDaKvLGrUlhdQAbstwT1pMiMBEmM';
    $array = json_decode($response,true);
    $streams = file_get_contents('https://www.googleapis.com/plus/v1/people/' . $gid . '/activities/public?key='. $appKey);
    $array = json_decode($streams, true);
    $statuses = array();
    foreach($array['items'] as $value) {
        $statuses[] = $value['url'];
    }
    return $statuses;
}
?>