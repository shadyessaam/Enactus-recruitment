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
$number = $_POST['phone'];
$faculty = $_POST['faculty'];
$year = $_POST['year'];
$join = $_POST['join'];
$interested = $_POST['interested'];
$competition = $_POST['competition'];
$yescompetition = $_POST['yescompetition'];
$idea = $_POST['have'];
$yesidea = $_POST['yeshave'];
$rateskill = $_POST['rate'];
$experience = $_POST['experience'];
$yesexperience = $_POST['yesexperience'];
$interests = $_POST['interests'];
$hear = $_POST['how'];
$otherhear = $_POST['otherhow'];


$data[] = "";


$chkbx = '';
$checkvals = $_POST['fields'];

$values = array("Marketing", "Graphic Design", "Video Editing", "Presentation", "None");

$data = [
    "entry.194356147" => $name,
    "entry.710679017" => $email,
    "entry.37606132" => $number,
    "entry.1266600708" => $faculty,
    "entry.2119269157" => $year,
    "entry.918443800" => $join,
    "entry.2077010221" => $interested,
    "entry.1040279198" => $competition,
    "entry.114901242" => $yescompetition,
    "entry.576879027" => $idea,
    "entry.1238467019" =>$yesidea,
    "entry.1134983709" =>$rateskill,
    "entry.1041953320" => $experience,
    "entry.1591716071" => $yesexperience,
    "entry.1742153397"=> $interests,
    "entry.1924710945" => $hear,
    "entry.1357101312" => $otherhear,
];

        foreach($checkvals as $chkval)
    {
        if($chkval == $values[0])
        {
            $data += [ "entry.595118345" => "data collection/market research"];

        }
        if($chkval == $values[1])
        {
            $data += [ "entry.1489195112" => "graphic design"];
        }        
        if($chkval == $values[2])
        {
            $data += [ "entry.1335203073" => "video editing"];

        }        
        if($chkval == $values[3])
        {
            $data += [ "entry.414828478" => "public speaking/presentation"];

        }
        if($chkval == $values[4])
        {
            $data += [ "entry.335608217" => "None"];
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
$sql = "INSERT into forms(name,phone,email) VALUES('$name','$number','$email')";
mysqli_query($conn,$sql);


if($httpcode == 200){
    echo '<!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Success! - Milestone 2023</title>
        <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon">                
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/style.css?v=2">
        </head>
        <body>
    
    
            <div class="heading">
    
                <!--NAV START-->
    
                <div class="nav p-4">
                    <div id="logo">
                        <img src="assets/enactus logo.png" alt="">
                    </div>
                    <ul>
                        <li id="contact">
                            <a id="maillink" href="mailto:info@enactusmans.com">CONTACT US</a>
                        </li>
    
                        <li id="home">
                            <a id="homelink" href="https://enactusmans.com/">HOME</a>
                        </li>
                    </ul>
                </div>
    
                <!--NAV END-->
    
                <!-- SLIDER START-->
                <div class="slider">
                  <div class="scroll-parent">
                      <div class="scroll-element primary sliderimg">
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                      </div>
                      <!-- <div class="scroll-element secondary sliderimg">
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                      </div> -->
                    </div>
                  <!-- <div class="sliderimg">
                      <img src="assets/slider.png" alt="">
                  </div>
                  <div class="sliderimg">
                      <img src="assets/slider.png" alt="">
                  </div>
                  <div class="sliderimg">
                      <img src="assets/slider.png" alt="">
                  </div>
                  <div class="sliderimg">
                      <img src="assets/slider.png" alt="">
                  </div> -->
              </div>
                <!-- SLIDER END-->
    
                <!--FIRST ILLUSTRATION START-->
    
                <div class="firstill">
                    <!-- <img src="assets/firstill.png" alt=""> -->
                    <!-- <div class="eye1"></div>
                    <div class="eye2"></div> -->
                    <!-- <div class="eyes">
                        <img src="assets/eyesfull.png" alt="">
                    </div> -->
    
                </div>
    
            </div>
    
            <div class="main pb-0">
    
                <!-- ALL Sections -->
    
                <div class="mainstate all">
    
                    <!-- Q&A Section -->
    
                    <div id="fourthh" class="form p-4 status" onclick="shadow4()">
    
                        <img src="assets/submitted.png" alt="">   
    
            
                    </div>
    
    
                    </form>     
    
                    </div>
    
                    <!-- FOOTER -->
    
    
                    <div class="footer statef mb-0">
                      <div class="social" id="contact">
                          <a href="https://instagram.com/enactusmans/" target="_blank"><img src="assets/instagram.png" alt=""></a>
                          <a href="https://facebook.com/EnactusMansouraUniversity/" target="_blank"><img src="assets/facebook.png" alt=""></a>
                          <a href="https://twitter.com/enactusmans" target="_blank"><img src="assets/twitter.png" alt=""></a>
                       </div>
                      <p class="mb-0">© ALL RIGHTS RESERVED. ENACTUS MANSOURA</p>
                  </div>
            </div>
    
        <script>
    
            setInterval(function(){ shadow4() },1500);
            function shadow4(){
                document.getElementById("fourthh").style.boxShadow = "-6px 5px black"
            }
    
        </script>
    
        </body>
    </html>';
} else{
    echo '<!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fail! - Milestone 2023</title>
        <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/favicon.ico" type="image/x-icon">                
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/style.css?v=2">
        </head>
        <body>
    
    
            <div class="heading">
    
                <!--NAV START-->
    
                <div class="nav p-4">
                    <div id="logo">
                        <img src="assets/enactus logo.png" alt="">
                    </div>
                    <ul>
                        <li id="contact">
                            <a id="maillink" href="mailto:info@enactusmans.com">CONTACT US</a>
                        </li>
    
                        <li id="home">
                            <a id="homelink" href="https://enactusmans.com/">HOME</a>
                        </li>
                    </ul>
                </div>
    
                <!--NAV END-->
    
                <!-- SLIDER START-->
    
                <div class="slider">
                  <div class="scroll-parent">
                      <div class="scroll-element primary sliderimg">
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                      </div>
                      <!-- <div class="scroll-element secondary sliderimg">
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                        <img src="assets/slider.png"alt=""/>
                      </div> -->
                    </div>
                  <!-- <div class="sliderimg">
                      <img src="assets/slider.png" alt="">
                  </div>
                  <div class="sliderimg">
                      <img src="assets/slider.png" alt="">
                  </div>
                  <div class="sliderimg">
                      <img src="assets/slider.png" alt="">
                  </div>
                  <div class="sliderimg">
                      <img src="assets/slider.png" alt="">
                  </div> -->
              </div>
                <!-- SLIDER END-->
    
                <!--FIRST ILLUSTRATION START-->
    
                <div class="firstill">
                    <!-- <img src="assets/firstill.png" alt=""> -->
                    <!-- <div class="eye1"></div>
                    <div class="eye2"></div> -->
                    <!-- <div class="eyes">
                        <img src="assets/eyesfull.png" alt="">
                    </div> -->
    
                </div>
    
            </div>
    
            <div class="main pb-0">
    
                <!-- ALL Sections -->
    
                <div class="mainstate all">
    
                    <!-- Q&A Section -->
    
                    <div id="fourthh" class="form p-4 status" onclick="shadow4()">
    
                        <img src="assets/failedd.png" alt="">   
    
            
                    </div>
    
    
                    </form>     
    
                    </div>
    
                    <!-- FOOTER -->
                    <div class="footer statef mb-0">
                      <div class="social" id="contact">
                          <a href="https://instagram.com/enactusmans/" target="_blank"><img src="assets/instagram.png" alt=""></a>
                          <a href="https://facebook.com/EnactusMansouraUniversity/" target="_blank"><img src="assets/facebook.png" alt=""></a>
                          <a href="https://twitter.com/enactusmans" target="_blank"><img src="assets/twitter.png" alt=""></a>
                       </div>
                      <p class="mb-0">© ALL RIGHTS RESERVED. ENACTUS MANSOURA</p>
                  </div>
            </div>
    
        <script>
    
            setInterval(function(){ shadow4() },1500);
            function shadow4(){
                document.getElementById("fourthh").style.boxShadow = "-6px 5px black"
            }
    
        </script>
    
        </body>
    </html>';

}

?>