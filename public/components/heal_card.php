<div class="heal_card card">
    <div>
        <h3><?=$value->name?></h3>
        <p>Début: <?=$value->date_start?></p>
        <p>Fin: <?=$value->date_start?></p>
        <p>Prix: <?=$value->price?></p>
        <p>Payer: <?php 
        if ($value->payd == 1) {
            echo "<span class='green'>OUI</span>";
        } else if($value->payd == 0){
            echo "<span class='red'>Non</span>";
        }
        ?></p>
        <p>Fini: <?php 
        if ($value->finish == 1) {
            echo "<span class='green'>OUI</span>";
        } else if($value->finish == 0){
            echo "<span class='red'>Non</span>";
        }
        ?></p>
        <p><a href="/heal/information?id=<?=$value->getId()?>">Plus de détails ...</a></p>
        <div class="card_delete_container">
            <a href="/heal/delete?id=<?=$value->getId()?>"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><g transform="translate(0 -1028.362)"><path d="m 12.000005,1028.3622 c -6.6259,0 -12.00003,5.3741 -12.00003,12 0,6.6259 5.37413,12 12.00003,12 6.62589,0 12.00002,-5.3741 12.00002,-12 0,-6.6259 -5.37413,-12 -12.00002,-12 z" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;white-space:normal;isolation:auto;mix-blend-mode:normal;solid-color:#000;solid-opacity:1" fill="#ee4c45" color="#000" enable-background="accumulate" font-family="sans-serif" font-weight="400" overflow="visible"/><path d="m 10.5,1034.3622 0,1 -3,0 0,1 9,0 0,-1 -3,0 0,-1 -3,0 z m -2,3 0,9 7,0 0,-9 -7,0 z m 1,1 1,0 0,7 -1,0 0,-7 z m 2,0 1,0 0,7 -1,0 0,-7 z m 2,0 1,0 0,7 -1,0 0,-7 z" style="isolation:auto;mix-blend-mode:normal;solid-color:#000;solid-opacity:1" fill="#fff" color="#000" enable-background="accumulate" overflow="visible"/></g></svg></a>
        </div>
    </div>
</div>