<div class="worker_card card">
    <div>
        <img src="/public/assets/<?=$value->picture?>" alt="profile de <?=$value->last_name?> <?=$value->first_name?>" width="100%">
    </div>
    <div>
        <h3><?=$value->last_name?> <?=$value->first_name?></h3>
        <p>Téléphone : <?=$value->phone?></p>
        <p>Spécialité : <?=$value->specialties?></p>
        <p>Nombre de soins max/jour : <?=$value->nb_heal_max?></p>
        <p>Cabinet : <?=isset($value->cabinet_id)?$value->cabinet_name:"'cabinet non atribué'"?></p>
        <p><a href="/worker/information?id=<?=$value->id?>">Plus de détails ...</a></p>
        <div class="card_delete_container">
            <a href="/worker/delete?id=<?=$value->id?>"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><g transform="translate(0 -1028.362)"><path d="m 12.000005,1028.3622 c -6.6259,0 -12.00003,5.3741 -12.00003,12 0,6.6259 5.37413,12 12.00003,12 6.62589,0 12.00002,-5.3741 12.00002,-12 0,-6.6259 -5.37413,-12 -12.00002,-12 z" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;white-space:normal;isolation:auto;mix-blend-mode:normal;solid-color:#000;solid-opacity:1" fill="#ee4c45" color="#000" enable-background="accumulate" font-family="sans-serif" font-weight="400" overflow="visible"/><path d="m 10.5,1034.3622 0,1 -3,0 0,1 9,0 0,-1 -3,0 0,-1 -3,0 z m -2,3 0,9 7,0 0,-9 -7,0 z m 1,1 1,0 0,7 -1,0 0,-7 z m 2,0 1,0 0,7 -1,0 0,-7 z m 2,0 1,0 0,7 -1,0 0,-7 z" style="isolation:auto;mix-blend-mode:normal;solid-color:#000;solid-opacity:1" fill="#fff" color="#000" enable-background="accumulate" overflow="visible"/></g></svg></a>
        </div>
    </div>
</div>