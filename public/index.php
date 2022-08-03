<?php

spl_autoload_register('autoloader');

function autoloader($imeKlase)
{
   
    if (strpos($imeKlase, 'Model') !== false) {
        $putanja = 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\knjiznica\\src\\Model\\';

        $temp = explode('\\', $imeKlase);
        $imeKlase = $temp[2];
    } else {
        // echo '<pre>';var_dump(__DIR__); die('bla');
        $putanja = 'C:\\Program Files (x86)\\EasyPHP-Devserver-17\\eds-www\\knjiznica\\src\\Controller\\';
    }

    require $putanja . $imeKlase . '.php';
}

$urlSegmenti = parse_url($_SERVER['REQUEST_URI']);

if (isset($urlSegmenti['query'])) {
    $upitSegmenti = explode('p=', $urlSegmenti['query']);

    $upitSegmentiTemp = explode('&', $upitSegmenti[1]);
    $putanja = $upitSegmentiTemp[0];
}

if (isset($_GET['p'])) {
    unset($_GET['p']);
}

$stranice = [
    'Naslovna'  => '/',
    'Knjige'    => 'knjige',
    'Kontakt'   => 'kontakt',
    'Onama'     => 'o-nama',
    'Uclanise'  => 'uclani-se',
];

if (isset($putanja)) {
    $imeKontrolera = array_search($putanja, $stranice);
    $direktorijStupanj = '..';
} else {
    $imeKontrolera = array_search('/', $stranice);
    $direktorijStupanj = '.';
}

if (array_key_exists($imeKontrolera, $stranice)) {
    $imeKlase = $imeKontrolera . 'Controller';
    $stranica = new $imeKlase;

    if ((isset($_GET['ajax']) && $_GET['ajax'])) {
        $stranica->vratiJson($_GET);
    }
}
?>

<?php if (!isset($_GET['ajax'])) { ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Službeno web sjedište naše knjižnice u gradu Rijeci! Posjetite nas i pogledajte naš katalog knjiga te izaberite naslov za vas!" />
    <meta name="keywords" content="knjižnica, Rijeka, knjige, knjižničar, bibliotekar" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo $direktorijStupanj ?>/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!--Load an icon library to show a hamburger menu (bars) on small screens-->
    <title>Naslovnica | Knjižnica</title>
  </head>

  <body>
    <div class="topnav" id="myTopnav">
      <?php $navigacija = [
        'http://localhost/knjiznica/public/'           => 'Naslovna',
        'http://localhost/knjiznica/public/o-nama'    => 'O nama',
        'http://localhost/knjiznica/public/knjige'    => 'Knjige',
        'http://localhost/knjiznica/public/kontakt'   => 'Kontakt',
        'http://localhost/knjiznica/public/uclani-se' => 'Učlani se',
      ];

      if (!isset($putanja)) {
        $putanja = '';
      }

      foreach ($navigacija as $link => $ime) {
        if ($link === 'http://localhost/knjiznica/public/' . $putanja) {
          $classActive = true;
        } else {
          $classActive = false;
        } ?>
        <a href="<?php echo $link; ?>" <?php echo $classActive ? 'class="active"' : ''; ?>>
          <?php echo $ime; ?>
        </a>
      <?php } ?>
     
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
<?php } ?>

<?php $stranica->prikaziView(); ?>

<?php if (!isset($_GET['ajax'])) { ?>
    <footer class="footer">
      <img class="logo" src="<?php echo $direktorijStupanj ?>/assets/img/logo.png" alt="logo"/>
      <p>Radno vrijeme: 08:00 - 20:00</p>
      <p>Info: +385989034759</p>
      <p>&copy; 2021 Nataša i Jelena</p>
    </footer>

    <script src="<?php echo $direktorijStupanj ?>/assets/js/javascript.js"></script>
  </body>
</html>
<?php } ?>
