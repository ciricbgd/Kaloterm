<?php session_start();?>
<!DOCTYPE html>
<html lang="sr">

<head>
    <!-- Obavezna provera pre hostovanja -->
    <meta charset="utf-8">
    <title>Kaloterm</title>
    <meta name="description" content="Veterinarska ambulanta">
    <meta name="keywords" content="veterinar, veterinari, ambulanta, ljubimci, vakcinacija">
    <meta name="author" content="https://plus.google.com/111116356739335627675">
    <link rel="icon" type="image/png" href="./img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="./img/favicon-16x16.png" sizes="16x16" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/responsiveslides.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/themes.css">
    <link rel="stylesheet" type="text/css" href="./css/responsiveslides.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">

    <script>
        $(document).ready(function() {
            /*----------------------Slider-------------------------*/
            $(".rslides_container").hover(function() {
                $(".centered-btns_nav").stop(true, true).animate({
                    opacity: '0.75'
                });
            }, function() {
                $(".centered-btns_nav").stop(true, true).animate({
                    opacity: '0.15'
                });
            });
            /*----------------------Tajno dugme i prigaz formulara-------------------------*/
            var clicks = 0;
            $('#secret_button').click(function() {
                clicks++;
                if (clicks >= 5) {
                    $('#login').css('display', 'inline');
                    clicks = 0;
                }
            });

            $('#UnesiteArtikal').click(function() {
                $('#unos_artikala').css('display', 'inline');
            });

            $('#UnesiteBlog').click(function() {
                $('#unos_blog').css('display', 'inline');
            });

            $('#PromeniSlider').click(function() {
                $('#unos_slider').css('display', 'inline');
            });
            /*----------------------Zatvaranje logina-------------------------*/
            $('.close').click(function() {
                $('.admin_window').css('display', 'none');
            });
            /*----------------------Ucitavanje stranica-------------------------*/
            $('#btnPetShop').one("click", function() {
                $("#page_shop").load("shop.php");
            });
            $('#btnPetShop').click(function() {
                $('#page_home').css('display', 'none');
                $('#page_blog').css('display', 'none');
                $('#page_shop').css('display', 'inline');
            });

            $('#btnSaznajVise').one("click", function() {
                $("#page_blog").load("blog.php");
            });
            $('#btnSaznajVise').click(function() {
                $('#page_home').css('display', 'none');
                $('#page_blog').css('display', 'inline');
                $('#page_shop').css('display', 'none');
            });

            $('#btnAmbulanta').click(function() {
                $('#page_home').css('display', 'inline');
                $('#page_blog').css('display', 'none');
                $('#page_shop').css('display', 'none');
            });
            $('#btnKontakt').click(function() {
                $('#page_home').css('display', 'inline');
                $('#page_blog').css('display', 'none');
                $('#page_shop').css('display', 'none');
            });
            /*----------------------Smooth scroll-------------------------*/
            $("#btnAmbulanta").click(function() {
                $('html, body').animate({
                    scrollTop: $("#o_nama").offset().top
                }, 800);
            });
            $("#btnKontakt").click(function() {
                $('html, body').animate({
                    scrollTop: $("#kontakt").offset().top
                }, 1000);
            });
        });

    </script>
    <script>
        $(function() {
            $("#slider").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "centered-btns"
            });
        });

    </script>
</head>

<body>
    <?php
        if(isset($_REQUEST['tbLozinka']))
        {
            if($_REQUEST['tbLozinka']=="sifrajelaka")
            {
                $_SESSION['admin']=1;
            }
        }
        if(isset($_SESSION['admin']))
        {
            if($_SESSION['admin']==1)
                {
                    echo '<div id="admin_panel">
                        <p>Ulogovani ste</p>
                        <a id="btn_logout" class="button" href="logout.php">Izlogujte se</a>
                        <a class="button" href="./db/uputstvo.txt" download><u>uputstvo.txt</u></a>
                        <p id="PromeniSlider" class="button"><u>Promenite Slajder</u></p>
                        <p id="UnesiteArtikal" class="button"><u>Unesite artikal</u></p>
                        <p id="UnesiteBlog" class="button"><u>Napišite blog temu</u></p>
                        </div>';
                }
        }
    ?>
        <div id="wrapper">

            <div class="page">
                <header id="naslov">
                    <div id="logo"></div>
                    <hgroup id="title">
                        <h1>Kaloterm</h1>
                        <h3>Veterinarska ambulanta</h3>
                    </hgroup>
                    <div id="info">
                        <p>011 3088 361</p>
                        <p>Milana Rakića 125V</p>
                    </div>
                </header>

                <nav>
                    <ul>
                        <li><a href="index.php"><img src="./img/home.gif" alt="home"></a></li>
                        <li>
                            <p class="button" id="btnAmbulanta">O nama</p>
                        </li>
                        <li>
                            <p class="button" id="btnKontakt">Kontakt</p>
                        </li>
                        <li>
                            <p class="button" id="btnPetShop">Pet shop</p>
                        </li>
                        <li>
                            <p class="button" id="btnSaznajVise">Saznaj više</p>
                        </li>
                    </ul>
                </nav>
                <div id="page_shop"></div>
                <div id="page_blog"></div>
                <div id="page_home">
                    <div class="rslides_container">
                        <ul class="rslides" id="slider">
                            <?php
                        include('./db/konekcija.inc');
                        $izvrsavanje_upita_slider=mysqli_query($konekcija, "SELECT * FROM slider");
                        while($r=mysqli_fetch_array($izvrsavanje_upita_slider))
                        {
                            if(isset($_SESSION['admin']))
                            {
                                if($_SESSION['admin']==1)
                                {
                                    $delete_button='<form action="./db/delete.php" method="post"><input type="hidden" name="lokacija" value="slider"><input type="hidden" name="id" value="'.$r['id'].'"><input type="submit" value="x" class="button delete"></form>';
                                }
                                else{$delete_button='';}
                            }
                            else{$delete_button='';}
                            echo '<li>'.$delete_button.'
                                    <img src="'.$r['slika'].'" alt="'.$r['alt'].'">
                                    <div class="descritpion_holder">
                                    <div class="slider_description">
                                        <h1>'.$r['naslov'].'</h1>
                                        <p>
                                            '.$r['opis'].'
                                        </p>
                                    </div>
                                    </div>
                                </li>';
                        }
                        include('./db/zatvaranje.inc');
                    ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="cleaner"></div>
            <div class="page">
                <section id="o_nama">
                    <h1 id="mi_smo">Mi pružamo...</h1>
                    <article>
                        <div class="attributes"></div>
                        <h2>Pouzdanost</h2>
                    </article>
                    <article>
                        <div class="attributes"></div>
                        <h2>Dugogodišnje iskustvo</h2>
                    </article>
                    <article>
                        <div class="attributes"></div>
                        <h2>Nežnost</h2>
                    </article>
                    <main>
                        <p>
                            Dugogodišnje iskustvo u veterinarskoj praksi garantuje da su vaši ljubimci u sigurnim rukama. Posvećenost znanju i primeni najsavremenijih dostignuća u oblasti veterine omogućava da se prevencijom prevashodno omogući dug i srećan zivot.<br> Najsavremenijim uređajima i instrumentima na najbrži način dijagnostikujemo i najređe bolesti. Iskustvo u hirurgiji podrazumeva i najkomplikovanije zahvate. Uvek smo tu za Vas bez obzira na vreme. Ambulanta je specijalizovana za lečenja pasa, mačaka i ostalih kućnih ljubimaca i radi po principima dobre veterinarske prakse pri čemu su stručnost, savesnost i briga za vaše najbolje prijatelje na prvom mestu.
                        </p>
                    </main>
                </section>
            </div>
        </div>
        <div class="admin_window" id="login">
            <div class="button delete close">x</div>
            <p>Unesite lozinku</p>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                <input type="password" name="tbLozinka" id="tbLozinka">
                <input type="submit" class="button" id="btnLogin" value="Uloguj se">
                <div class="cleaner"></div>
            </form>
            <p>Ako ste ovde slučajno dospeli, zatvorite ovaj prozor.</p>
        </div>
        <div class="admin_window" id="unos_artikala">
            <div class="button delete close">x</div>
            <p>Unesite artikal</p>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                <input type="text" name="tbNaziv" id="tbNaziv" placeholder="Naziv">
                <input type="text" name="tbCena" id="tbCena" placeholder="Cena">
                <br><label for="tbFile">Slika</label><br>
                <input type="file" name="tbFile" id="tbFile" accept="image/*" style="display: none">
                <textarea name="tbOpis" id="tbOpis" placeholder="Opis"></textarea>
                <input type="submit" class="button accept" id="tbUnesiArtikal" name="tbUnesiArtikal" value="Unesi">
                <div class="cleaner"></div>
            </form>
        </div>
        <div class="admin_window" id="unos_blog">
            <div class="button delete close">x</div>
            <p>Napišite temu</p>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                <input type="text" name="tbNaziv" placeholder="Naslov">
                <br><label for="tbSlika">Slika</label><br>
                <input type="file" name="tbSlika" id="tbSlika" accept="image/*" style="display: none">
                <input type="text" name="tbOpisSlike" placeholder="Opis slike">
                <textarea name="tbOpis" placeholder="Tekst"></textarea>
                <input type="submit" class="button accept" id="tbUnesiBlog" name="tbUnesiBlog" value="Napiši">
                <div class="cleaner"></div>
            </form>
        </div>
        <div class="admin_window" id="unos_slider">
            <div class="button delete close">x</div>
            <p>Unesite slajd</p>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                <input type="text" name="tbNaziv" placeholder="Naslov">
                <br><label for="tbSlider">Slika</label><br>
                <input type="file" name="tbSlider" id="tbSlider" accept="image/*" style="display: none">
                <input type="text" name="tbOpisSlike" placeholder="Opis slike">
                <textarea name="tbOpis" placeholder="Tekst"></textarea>
                <input type="submit" class="button accept" id="tbUnesiSlider" name="tbUnesiSlider" value="Unesi">
                <div class="cleaner"></div>
            </form>
        </div>
        <?php
                    if(isset($_REQUEST['tbUnesiArtikal']))
                    {
                        $naziv = $_REQUEST['tbNaziv'];
                        $cena = $_REQUEST['tbCena'];
                        $opis = $_REQUEST['tbOpis'];
                        if(isset($_FILES['tbFile']['name']))
                        {
                            $ime_slike = time().'.jpg';
                            $ime_fajla = time().'.jpg';
                            $tmp_fajla = $_FILES['tbFile']['tmp_name'];
                            $tip_fajla = $_FILES['tbFile']['type'];
                            $putanja_slike = './img/artikli/'.$ime_fajla;
                            move_uploaded_file($tmp_fajla, $putanja_slike);
                        }
                        else {$putanja_slike='';}
                        include('./db/konekcija.inc');
                        $unos_artikla = mysqli_query($konekcija,"INSERT INTO artikli VALUES('', '$naziv', '$cena', '$putanja_slike', '$naziv', '$opis')");
                        include('./db/zatvaranje.inc');
                    }
                    if(isset($_REQUEST['tbUnesiBlog']))
                    {
                        $naziv = $_REQUEST['tbNaziv'];
                        $opis = $_REQUEST['tbOpis'];
                        if(isset($_FILES['tbSlika']['name']))
                        {
                            $ime_slike = time().'.jpg';
                            $ime_fajla = time().'.jpg';
                            $tmp_fajla = $_FILES['tbSlika']['tmp_name'];
                            $tip_fajla = $_FILES['tbSlika']['type'];
                            $putanja_slike = './img/blog/'.$ime_fajla;
                            move_uploaded_file($tmp_fajla, $putanja_slike);
                        }
                        else {$putanja_slike='';}
                        $opisslike = $_REQUEST['tbOpisSlike'];
                        $datum = date("d.m.Y");
                        include('./db/konekcija.inc');
                        $unos_teme = mysqli_query($konekcija,"INSERT INTO blog VALUES('', '$naziv', '$putanja_slike', '$opisslike', '$opis', '$datum')");
                        include('./db/zatvaranje.inc');
                    }
                    if(isset($_REQUEST['tbUnesiSlider']))
                    {
                        $naziv = $_REQUEST['tbNaziv'];
                        $opis = $_REQUEST['tbOpis'];
                        if(isset($_FILES['tbSlider']['name']))
                        {
                            $ime_slike = time().'.jpg';
                            $ime_fajla = time().'.jpg';
                            $tmp_fajla = $_FILES['tbSlider']['tmp_name'];
                            $tip_fajla = $_FILES['tbSlider']['type'];
                            $putanja_slike = './img/slider/'.$ime_fajla;
                            move_uploaded_file($tmp_fajla, $putanja_slike);
                        }
                        else {$putanja_slike='';}
                        $opisslike = $_REQUEST['tbOpisSlike'];
                        include('./db/konekcija.inc');
                        $unos_teme = mysqli_query($konekcija,"INSERT INTO slider VALUES('', '$naziv' , '$opis', '$putanja_slike', '$opisslike')");
                        include('./db/zatvaranje.inc');
                    }
            ?>
            <div id="secret_button"></div>
            <div id="kontakt_holder">
                <div id="map"></div>
                <div id="kontakt">
                    <p>011 3088 361</p>
                    <p>060 7275 300</p>
                    <p>Radno vreme pon-pet:<br>10:00-18:00</p>
                    <p>Radno vreme subotom:<br>10:00-16:00</p>
                    <p>Hitni slučajevi:<br>00:00-24:00 24/7</p>
                    <p>Milana Rakića 125V</p>
                </div>
            </div>
            <script>
                var map;
                var myLatLng = {
                    lat: 44.792226,
                    lng: 20.517301
                };

                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: {
                            lat: 44.792226,
                            lng: 20.514983
                        },
                        zoom: 16,
                        styles: [{
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#f5f5f5"
                                }]
                            },
                            {
                                "elementType": "labels.icon",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            },
                            {
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#616161"
                                }]
                            },
                            {
                                "elementType": "labels.text.stroke",
                                "stylers": [{
                                    "color": "#f5f5f5"
                                }]
                            },
                            {
                                "featureType": "administrative.land_parcel",
                                "elementType": "labels",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            },
                            {
                                "featureType": "administrative.land_parcel",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#bdbdbd"
                                }]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#eeeeee"
                                }]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#757575"
                                }]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#e5e5e5"
                                }]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#9e9e9e"
                                }]
                            },
                            {
                                "featureType": "road",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#ffffff"
                                }]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "color": "#b3dcfb"
                                }]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#757575"
                                }]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#dadada"
                                }]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "color": "#5bb5f7"
                                }]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#616161"
                                }]
                            },
                            {
                                "featureType": "road.local",
                                "elementType": "labels",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            },
                            {
                                "featureType": "road.local",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#9e9e9e"
                                }]
                            },
                            {
                                "featureType": "transit.line",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#e5e5e5"
                                }]
                            },
                            {
                                "featureType": "transit.station",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#eeeeee"
                                }]
                            },
                            {
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#c9c9c9"
                                }]
                            },
                            {
                                "featureType": "water",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#9e9e9e"
                                }]
                            }
                        ]
                    });
                    var marker = new google.maps.Marker({
                        position: myLatLng,
                        icon: 'img/icon.gif',
                        map: map,
                        title: 'Kaloterm'
                    });
                }

            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCP0pMAnWjnynvJ0l_HL3b3lqCaxMYV9r0&callback=initMap&language=sr&region=RS" async defer>


            </script>
            <script>
                $(function() {
                    var x = 0;
                    setInterval(function() {
                        x -= 1;
                        $('body').css('background-position', '0 ' + x + 'px');
                    }, 40);
                })

            </script>
</body>

</html>
