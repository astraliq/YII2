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
                <p class="profile_info profile_email"><?= $user->email ?></p>
            </div>
        </div>
        <div class="col-md-12 profile_row">
            <div  class="col-sm-2">
                <p><b>Имя:</b></p>
            </div>
            <div  class="col-sm-6">
                <p class="profile_info profile_name"><?= $user->name ?></p>
                <input type="text" class="form-check-input" id="profile_name_input" style="display: none">
                <span class="profile_change name_change">Изменить</span>
            </div>
        </div>
        <div class="col-md-12 profile_row">
            <div  class="col-sm-2">
                <p><b>Страна:</b></p>
            </div>
            <div  class="col-sm-6">
                <p class="profile_info profile_country"><?= $user->country ?></p>
                <input type="text" class="form-check-input" id="profile_country_input" style="display: none">
                <span class="profile_change country_change">Изменить</span>
            </div>
        </div>
        <div class="col-md-12 profile_row">
            <div  class="col-sm-2">
                <p><b>Дата регистрации:</b></p>
            </div>
            <div  class="col-sm-6">
                <p class="profile_info profile_createdat"><?= $user->createdAt ?></p>
            </div>
        </div>

    </div>
</div>
