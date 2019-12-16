<?php

//$user->name
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center"><?= $pageTitle?></h1>
        <div class="col-md-12 activity_block">
            <p><b>E-mail: </b> <?= $user->email ?></p>
            <p><b>Имя: </b><?= $user->name ?></p>
            <p><b>Дата регистрации: </b> <?=$user->createdAt?></p>
        </div>
    </div>
</div>
