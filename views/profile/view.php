<?php

//$user->name
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center"><?= $pageTitle?></h1>
        <div class="col-md-12 profile_row">
            <div  class="col-sm-2">
                <p><b>E-mail:</b></p>
            </div>
            <div  class="col-sm-6">
                <p><?= $user->email ?></p>
            </div>
        </div>
        <div class="col-md-12 profile_row">
            <div  class="col-sm-2">
                <p><b>Имя:</b></p>
            </div>
            <div  class="col-sm-6">
                <p><?= $user->name ?></p>
            </div>
        </div>
        <div class="col-md-12 profile_row">
            <div  class="col-sm-2">
                <p><b>Дата регистрации:</b></p>
            </div>
            <div  class="col-sm-6">
                <p><?= $user->createdAt ?></p>
            </div>
        </div>

    </div>
</div>
