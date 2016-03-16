<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->BForm->input('email', array('label' => false)) ?>
<?= $this->BForm->input('password', array('label' => false)) ?>
<?php //$this->BForm->button('Login',array('label' => 'login')) ?>
<?= $this->Form->end() ?>
