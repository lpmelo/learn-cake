<?php

/**
 * @var \App\View\AppView $this
 */

$this->disableAutoLayout();
?>
<!DOCTYPE html>
<html lang="en">
<?= $this->createHtmlHead('', 'logo_final.ico', [$this->Html->css('login'), $this->Html->script('login')]); ?>

<body>
    <div class="container w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="card login-card container">

            <?= $this->Form->create(null, ['url' => '/authentications/login', 'class' => 'login-form']) ?>
            <div class="row">
                <div class="col-12">

                    <?= $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'Username', 'label' => 'Usuário']) ?>

                </div>
                <div class="col-12">

                    <?= $this->Form->control('password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'label' => 'Senha']) ?>

                </div>
                <div class="col-12">
                    <?= $this->Form->button('Entrar', ['class' => 'w-100 btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Flash->render('default') ?>
</body>

</html>