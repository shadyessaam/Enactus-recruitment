<?php

if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    die( );
}

$localhost = "localhost"; #localhost
$dbusername = ""; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "";  #database name



$curl = curl_init();

$name = $_POST['name'];
$email = $_POST['email'];
$id = $_POST['id'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$school = $_POST['school'];
$faculty = $_POST['faculty'];
$tutorial = $_POST['radio'];
$whatknow = $_POST['whatknow'];
$howknow = $_POST['howknow'];
$attract = $_POST['attract'];
$volunteer = $_POST['volunteer'];
$rate = $_POST['rate'];
$available = $_POST['available'];
$add = $_POST['add'];
$environment = $_POST['environment'];
$strength = $_POST['strength'];
$perfect = $_POST['perfect'];
$role = $_POST['role'];
$choice = $_POST['choice'];
$measure = $_POST['measure'];
$problem = $_POST['problem'];
$project = $_POST['project'];
$ask = $_POST['ask'];
$date = $_POST['date'];

$datee=explode("-",$date);

$data[] = "";


$chkbx = '';
$checkvals = $_POST['fields'];

$values = array("Graphic Design", "Presentation", "Training", "Photography", "Marketing", "Fundraising", "Field Work", "Research and Development", "None");

$data = [
    "entry.875491124" => $tutorial,
    "entry.1990464352" => $name,
    "entry.2105279865" => $email,
    "entry.478265899" => $id,
    "entry.1150162162" => $address,
    "entry.2038126689" => $phone,
    "entry.1217211156" => $school,
    "entry.1576008390" => $faculty,
    "entry.908745498" => $whatknow,
    "entry.1795517836" =>$howknow,
    "entry.782076237" =>$attract,
    "entry.811610329" => $volunteer,
    "entry.808554167" => $rate,
    "entry.1391285541"=> $available,
    "entry.559149197" => $add,
    "entry.610359189" => $environment,
    "entry.738956715" => $strength,
    "entry.604326962" => $perfect,
    "entry.88357485" => $role,
    "entry.1993334917" => $choice,
    "entry.261504767" => $measure,
    "entry.1477738857" => $problem,
    "entry.1864758313" => $project,
    "entry.1371658927" =>$ask,
    "entry.654416144_year" => $datee[0],
    "entry.654416144_month" =>$datee[1],
    "entry.654416144_day" => $datee[2]
];


        foreach($checkvals as $chkval)
    {
        if($chkval == $values[0])
        {
            $data += [ "entry.1773566002" => "Graphic Design"];

        }
        if($chkval == $values[1])
        {
            $data += [ "entry.1409809809" => "Presentation"];
        }        
        if($chkval == $values[2])
        {
            $data += [ "entry.334029387" => "Training"];

        }        
        if($chkval == $values[3])
        {
            $data += [ "entry.1165254292" => "Photography"];

        }
        if($chkval == $values[4])
        {
            $data += [ "entry.566308795" => "Marketing"];
        }
        if($chkval == $values[5])
        {
            $data += [ "entry.797232967" => "Fundraising"];

        }        
        if($chkval == $values[6])
        {
            $data += [ "entry.2094949900" => "Field Work"];

        }        
        if($chkval == $values[7])
        {
            $data += [ "entry.857078407" => "Research and Development"];

        }
    }

    




curl_setopt_array($curl, array(
  CURLOPT_URL => /*GOOGLE FORMS URL HERE*/ */,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $data
));

$response = curl_exec($curl);
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
$sql = "INSERT into forms(name,phone,email) VALUES('$name','$phone','$email')";
mysqli_query($conn,$sql);


$redirect = "index.html";

if($httpcode == 200){
    echo '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Success! - Enactus Mansoura</title>
        <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/style.css">
      </head>
      <body>
    
    
        <div class="heading">
    
            <img id="status" src="assets/ADA.png" alt="">
            <p id="statustxt">Your application was successfully <br>submitted</p>
            <div class="button">
                <div class="bott">
                    <p>Follow Us</p>
                    <div class="social" id="contact">
                       <a href="https://instagram.com/enactusmans/" target="_blank"><img src="assets/instagram.png" alt=""></a>
                       <a href="https://facebook.com/EnactusMansouraUniversity/" target="_blank"><img src="assets/facebook.png" alt=""></a>
                       <a href="https://twitter.com/enactusmans" target="_blank"><img src="assets/twitter.png" alt=""></a>
    
                    </div>
                    <p>© All Rights Reserved. Enactus Mansoura.</p>
                </div>
                    
            </div>
        </div>
        </div>
      </body>
    </html>';
} else{
    echo '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fail! - Enactus Mansoura</title>
        <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/style.css">
      </head>
      <body>
    
    
        <div class="heading">
    
            <img id="status" src="assets/ADA.gsdgpng.png" alt="">
            <p id="statustxt">Please try again</p>
            <div class="button" id="btn">
              <a href="https://apply.enactusmans.com/"><button class="btn rounded-5">Back</button></a>
                <div class="bott">
                    <p>Follow Us</p>
                    <div class="social" id="contact">
                       <a href="https://instagram.com/enactusmans/" target="_blank"><img src="assets/instagram.png" alt=""></a>
                       <a href="https://facebook.com/EnactusMansouraUniversity/" target="_blank"><img src="assets/facebook.png" alt=""></a>
                       <a href="https://twitter.com/enactusmans" target="_blank"><img src="assets/twitter.png" alt=""></a>
    
                    </div>
                    <p>© All Rights Reserved. Enactus Mansoura.</p>
                </div>
                    
            </div>
        </div>
        </div>
      </body>
    </html>';

}

?>