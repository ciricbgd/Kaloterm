<?php session_start();
    include('./db/konekcija.inc');
    $izvrsavanje_upita=mysqli_query($konekcija,"SELECT * FROM blog ORDER BY id DESC");
    echo '<section id="blog">';
    while($r=mysqli_fetch_array($izvrsavanje_upita))
    {
        if($r["slika"]!=null)
        {$slika='<img src="'.$r["slika"].'" alt="'.$r['alt'].'">';}
        else{$slika="";}
        
        if(isset($_SESSION['admin']))
        {
            if($_SESSION['admin']==1)
            {
                $delete_button='<form action="./db/delete.php" method="post"><input type="hidden" name="lokacija" value="blog"><input type="hidden" name="id" value="'.$r['id'].'"><input type="submit" value="x" class="button delete"></form>';
            }
        }
        else{$delete_button='';}
        
        echo '
            <article class="blog kaloterm_article">
                <hgroup>'.$delete_button.'<h1>'.$r["naslov"].'</h1><h6>'.$r["datum"].'</h6></hgroup>'.$slika.'
                <p>'.$r["tekst"].'</p>
            </article>
        ';
    }
    echo '</section>';
    include('./db/zatvaranje.inc')
?>