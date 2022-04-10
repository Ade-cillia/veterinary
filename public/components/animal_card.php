<div class="animal_card card">
    <div>
        <img src="/public/assets/<?=$value->picture?>" alt="profile de <?=$value->name?>" width="100%" class="card_image">
    </div>
    <div>
        <h3><?=$value->name?></h3>
        <p>Puce : <?=$value->chip?></p>
        <p>Espèce : <?=$value->species?></p>
        <p>Propriétaire : <?=$value->owner_last_name?> <?=$value->owner_first_name?></p>
        <p>Téléphone du propriétaire : <?=$value->owner_phone?></p>
        <p><a href="/animal/information?id=<?=$value->getId()?>">Plus de détails ...</a></p>
        <div class="card_icon">
            <div class="card_update_container">
                <a href="/animal/update?id=<?=$value->getId()?>"><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><path fill="#c94f60" d="M42.583,9.067l-3.651-3.65c-0.555-0.556-1.459-0.556-2.015,0l-1.718,1.72l5.664,5.664l1.72-1.718	C43.139,10.526,43.139,9.625,42.583,9.067"/><path fill="#f0f0f0" d="M6.905,35.43L5,43l7.571-1.906l0.794-6.567L6.905,35.43z"/><path fill="#edbe00" d="M36.032,17.632l-23.46,23.461l-5.665-5.665l23.46-23.461L36.032,17.632z"/><linearGradient id="YoPixpDbHWOyk~b005eF1a" x1="35.612" x2="35.612" y1="7.494" y2="17.921" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#dedede"/><stop offset="1" stop-color="#d6d6d6"/></linearGradient><path fill="url(#YoPixpDbHWOyk~b005eF1a)" d="M30.363,11.968l4.832-4.834l5.668,5.664l-4.832,4.834L30.363,11.968z"/><path fill="#787878" d="M5.965,39.172L5,43l3.827-0.965L5.965,39.172z"/></svg></a>
            </div>
            <div class="card_delete_container">
                <a href="/animal/delete?id=<?=$value->getId()?>"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"><g transform="translate(0 -1028.362)"><path d="m 12.000005,1028.3622 c -6.6259,0 -12.00003,5.3741 -12.00003,12 0,6.6259 5.37413,12 12.00003,12 6.62589,0 12.00002,-5.3741 12.00002,-12 0,-6.6259 -5.37413,-12 -12.00002,-12 z" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;white-space:normal;isolation:auto;mix-blend-mode:normal;solid-color:#000;solid-opacity:1" fill="#ee4c45" color="#000" enable-background="accumulate" font-family="sans-serif" font-weight="400" overflow="visible"/><path d="m 10.5,1034.3622 0,1 -3,0 0,1 9,0 0,-1 -3,0 0,-1 -3,0 z m -2,3 0,9 7,0 0,-9 -7,0 z m 1,1 1,0 0,7 -1,0 0,-7 z m 2,0 1,0 0,7 -1,0 0,-7 z m 2,0 1,0 0,7 -1,0 0,-7 z" style="isolation:auto;mix-blend-mode:normal;solid-color:#000;solid-opacity:1" fill="#fff" color="#000" enable-background="accumulate" overflow="visible"/></g></svg></a>
            </div>
        </div>
        
    </div>
</div>