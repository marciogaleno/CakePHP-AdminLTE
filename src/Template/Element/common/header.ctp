<header class="main-header">
  <!-- Logo -->
  <a href="<?= $this->Url->build('/') ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>C</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b><?= $title_for_layout?></b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php if ($this->request->session()->read('Auth.User.gender') == 'M'):?>
            <?= $this->Html->image('icons/icon_male.png', ['alt' => 'user', 'class' => 'user-image']);?>
          <?php endif;?>

          <?php if ($this->request->session()->read('Auth.User.gender') == 'F'):?>
            <?= $this->Html->image('icons/icon_female.png', ['alt' => 'user', 'class' => 'user-image']);?>
          <?php endif;?>

            <span class="hidden-xs"><?= $this->request->session()->read('Auth.User.name'); ?></span>
            &nbsp;<i class="fa fa-gears"></i>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <?php if ($this->request->session()->read('Auth.User.gender') == 'M'):?>
                <?= $this->Html->image('icons/icon_male.png', ['alt' => 'user', 'class' => 'user-circle']);?>
              <?php endif ?>

              <?php if ($this->request->session()->read('Auth.User.gender') == 'F'):?>
                <?= $this->Html->image('icons/icon_female.png', ['alt' => 'user', 'class' => 'user-circle']);?>
              <?php endif ?>
              <p>
                <?= $this->request->session()->read('Auth.User.name'); ?>
                <small>ùltimo login: <?= $this->Time->format($this->request->session()->read('Auth.User.last_login'), 'd/m/Y HH:mm:ss') ?></small>
              </p>
            </li>
            <!-- Menu Body -->
<!--             <li class="user-body">
              <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
              </div>
            </li> -->
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'manageAccount'])?>" class="btn btn-default btn-flat">Meus dados</a>
              </div>
              <div class="pull-right">
                <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout'])?>" class="btn btn-default btn-flat">Sair</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>