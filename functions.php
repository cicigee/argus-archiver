<?

require('config.php');

function log_this($string)
{
global $logfile;
$string="\n".'['.time().']'.$string;
file_put_contents ( $logfile , $string,FILE_APPEND);
}

function get_recordings($argushost,$arguschannelid)
{
$data_string="ChannelId=".$arguschannelid;

$ch = curl_init('http://'.$argushost.':49943/ArgusTV/Control/GetFullRecordings/0?includeNonExisting=false');                              
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
return $result;
}

?>
