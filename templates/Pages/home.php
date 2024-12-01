<?php

/**
 * @var \App\View\AppView $this
 */

?>
<div>
    <h1>Bem vindo <?= $this->getRequest()->getSession()->read('User.username') ?></h1>
</div>
<?= $this->Flash->render('default') ?>