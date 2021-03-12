<?php

$res="\033[0m";
$hitam="\033[0;30m";
$abu2="\033[1;30m";
$putih="\033[0;37m";
$putih2="\033[1;37m";
$red="\033[0;31m";
$red2="\033[1;31m";
$green="\033[0;32m";
$green2="\033[1;32m";
$yellow="\033[0;33m";
$yellow2="\033[1;33m";
$blue="\033[0;34m";
$blue2="\033[1;34m";
$purple="\033[0;35m";
$purple2="\033[1;35m";
$lblue="\033[0;36m";
$lblue2="\033[1;36m";

system('clear');
echo "$yellow User-Agent : "; $ua = trim(fgets(STDIN));
system('clear');
echo "$yellow Cookie : "; $cookie = trim(fgets(STDIN));
system('clear');
echo "$green Your Plan :
[1] free
[2] bronze
[3] silver
[4] gold
[5] platinum
[6] diamond
[7] boss plan
$red/Tinggal masukkan angkanya saja

$green Plan : "; $plan = trim(fgets(STDIN));
system('clear');

function get ($url,$header) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'COOKIE.TXT');
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'COOKIE.TXT');
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip deflate');
	    
	$result = curl_exec($ch);
	curl_close($ch);

	return $result;
}

function dashboard($ua,$cook) {
	$header=[
	    'Host: taoofblock.com',
	    'User-Agent: ',$ua,
	    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
	    'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
	    'Cookie: '.$cook
	    ];
	  $url = 'http://taoofblock.com/user/dashboard';

	  return get($url,$header);
}

function ptc($v,$ua,$cook) {
	$header=[
	    'Host: taoofblock.com',
	    'User-Agent: ',$ua,
	    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
	    'Referer: http://taoofblock.com/user/ptc',
	    'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
	    'Cookie: '.$cook
	    ];
	  $url = 'http://taoofblock.com/user/ptc-v/'.$v;

	  return get($url,$header);
}

function claim($list,$ua,$cook) {
	$header=[
	    'Host: taoofblock.com',
	    'User-Agent: ',$ua,
	    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
	    'Referer: http://taoofblock.com/user/ptc-v/1',
	    'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7',
	    'Cookie: '.$cook
	    ];
    $url='http://taoofblock.com/user/ptc-confirm/'.$list;

    return get($url,$header);
}

$green2.system("toilet --width 28 -f pagga -F border  'Bundle Channel'");

echo "$putih2 =================================================================
 |$green2 #### #  # #### # #### #### ####$green2 SERVER$green2 ONLINE$putih2 |
 |$green2 #    #  # #    # #  # #  # #  #                              $putih2 |
 |$green2 #### #  # # ## # #  # #  # #  #                              $putih2 |
 |$green2    # #  # #  # # #  # #  # #  #                              $putih2 |
 |$green2 #### #### #### # #### #  # ####$putih2  SCRIPT :$red2 V1           $putih2 |
 =================================================================\n";
echo $putih2." TANGGAL ".$green2.date("d.m.Y ").$putih2."  JAM ".$green2.date("H:i:s");
echo "\n ===============================\033[1;31m404\033[1;32m===============================";
echo "
$putih2 •Channel YT     :$green2 Bundle Channel

$putih2 =================================================================
$red2 •SCRIPT NOT FOR SALE •SCRIPT GRATIS GUNAKAN DENGAN BIJAK YA CUK
 •SEGALA RESIKO DI TANGGUNG PENGGUNA\n";
echo $blue2." •••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••\n\n";

while (true) {
	$dashboard = dashboard($ua,$cookie);

	$balance = explode('<p class="g-text mb-0 font-weight-medium"><i class="las la-wallet"></i>', $dashboard)[1];
	$balance = explode('</p>', $balance)[0];

	$klik = explode('<h2 class="text--success font-weight-bold">', $dashboard)[2];
	$klik = explode('</h2>', $klik)[0];

	if($klik === '0') {
		echo "$red Limit, Try tomorrow...";
		break;
	}

	echo "\n$blue Balance : $putih".$balance." $yellow|$red Remain clicks today : $putih".$klik."\n";

	$ptc = ptc($plan,$ua,$cookie);
	$list = explode('<a class="btn btn-primary" href="http://taoofblock.com/user/ptc-show/', $ptc)[1];
	$list = explode('" role="button">View Now</a>', $list)[0];

	$claim=claim($list,$ua,$cookie);

	for($i=40; $i>=0; $i--){
		echo "\r$red".$i."$yellow  Viewing ads...\r"; 
		sleep(1);
	}

	$message=explode('iziToast.success({message:"',$claim)[1];
	$message=explode('", position: "topRight"});',$message)[0];
	    
	echo "$blue message : $green".$message."\n";
   
}

?>




