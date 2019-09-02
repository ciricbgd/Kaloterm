<?php
    session_start();
    include('./db/konekcija.inc');
    $izvrsavanje_upita=mysqli_query($konekcija, "SELECT * FROM artikli ORDER BY id DESC");
    echo '<section id="shop">';
    while($r=mysqli_fetch_array($izvrsavanje_upita))
    {
        if($r["slika"]!=null)
        {$slika='<img src="'.$r["slika"].'" alt="'.$r['alt'].'">';}
        else{$slika="";}
        
        if(isset($_SESSION['admin']))
        {
            if($_SESSION['admin']==1)
                {
                    $delete_button='<form action="./db/delete.php" method="post"><input type="hidden" name="lokacija" value="artikli"><input type="hidden" name="id" value="'.$r['id'].'"><input type="submit" value="x" class="button delete"></form>';
                }
            else{$delete_button='';}
        }
        else{$delete_button='';}
        
        echo '
            <article class="shop kaloterm_article">
                <hgroup>'.$delete_button.'<h1>'.$r["ime"].'</h1><h3>'.$r["cena"].'rsd</h3></hgroup>
                '.$slika.'
                <p>'.$r["opis"].'</p>
            </article>
        ';
    }
    echo '</section>';
    include('./db/zatvaranje.inc')
?>
