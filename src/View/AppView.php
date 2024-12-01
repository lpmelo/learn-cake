<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like adding helpers.
     *
     * e.g. `$this->addHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void {}

    public function createHtmlHead($title = 'StorageFlow', $icon = null, $additionalConfigs = null)
    {
        ob_start();
        ?>
                <head>
                    <?= $this->Html->charset() ?>
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <title>
                        <?= $title ? $title : 'StorageFlow' ?>
                    </title>

                    <?= $icon ? $this->Html->meta('icon', $icon) : $this->Html->meta('icon') ?>



                    <?= $this->fetch('meta') ?>
                    <?= $this->fetch('css') ?>
                    <?= $this->fetch('script') ?>

                    <script src="/plugins/jquery-3.7.1/dist/jquery-3.7.1.min.js"></script>
                    <script src="/plugins/bootstrap-5.3.3/dist/js/bootstrap.min.js"></script>
                    <link rel="stylesheet" href="/plugins/bootstrap-5.3.3/dist/css/bootstrap.min.css">
                    <script src="/plugins/sweetalert2-11.14.5/dist/js/sweetalert2.all.min.js"></script>
                    <link rel="stylesheet" href="/plugins/sweetalert2-11.14.5/dist/css/sweetalert2.min.css">

                    <?= $this->Html->css(['global', 'cake']) ?>

                    <?php
                    if (is_array($additionalConfigs) && !empty($additionalConfigs)) {
                        foreach ($additionalConfigs as $config) {
                            echo $config;
                        }
                    } elseif (!is_array($additionalConfigs) && !empty($additionalConfigs)) {
                        echo $additionalConfigs;
                    } ?>
                </head>
        <?php
        return ob_get_clean();
    }
}
