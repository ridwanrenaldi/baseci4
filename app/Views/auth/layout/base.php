<!DOCTYPE html>
<html lang="en">
    <head>

        <?= $this->include('auth/layout/head') ?>
        <?= $this->renderSection('head') ?>
        
    </head>
    <body class="hold-transition <?= isset($body) ? $body : '' ?>">

        <?= $this->renderSection('content') ?>

        <?= $this->include('auth/layout/javascript') ?>
        
        <?= $this->renderSection('javascript') ?>
    </body>
</html>
