<?php

/**
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html>

<?= $this->createHtmlHead(null, 'logo_final.ico', [$this->Html->script('default')]) ?>

<body>
    <main class="d-flex h-100">
        <div id="side-bar-container" class="d-flex flex-column flex-shrink-0 p-3 text-white bg-primary" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="/logo_final.ico" class="bi me-2" width="16" height="16"></i>
                <span class="fs-4">StorageFlow</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="<?= $this->Url->build('/home') ?>" class="nav-link text-white" aria-current="page">
                        <i class="bi me-2 bi-house-door-fill" width="16" height="16"></i>
                        Home
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="/img/images.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?= $this->getRequest()->getSession()->read('User.username') ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li>
                        <?= $this->Form->postLink(
                            'Sair',
                            ['controller' => 'Authentications', 'action' => 'logout'],
                            ['class' => 'dropdown-item', 'id' => 'logout-link']
                        ) ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>