<!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">

      <li><a class="<?php echo ($this->uri->segment(2) == 'news') ? 'active' : ''; ?>" href="<?php echo base_url('admin/news'); ?>">
        <i class="fa fa-quote-left"></i>News
      </a></li>
      <li><a class="<?php echo ($this->uri->segment(2) == 'videos') ? 'active' : ''; ?>" href="<?php echo base_url('admin/videos'); ?>">
        <i class="fa fa-video-camera"></i>Videos
      </a></li>
      <li><a class="<?php echo ($this->uri->segment(2) == 'partners') ? 'active' : ''; ?>" href="<?php echo base_url('admin/partners'); ?>">
        <i class="fa fa-users"></i>Partners
      </a></li>
      <li><a class="<?php echo ($this->uri->segment(2) == 'players') ? 'active' : ''; ?>" href="<?php echo base_url('admin/players'); ?>">
        <i class="fa fa-users"></i>Players
      </a></li>
      <li><a class="<?php echo ($this->uri->segment(2) == 'teams') ? 'active' : ''; ?>" href="<?php echo base_url('admin/teams'); ?>">
        <i class="fa fa-users"></i>Teams
      </a></li>
      <li><a class="<?php echo ($this->uri->segment(2) == 'leagues') ? 'active' : ''; ?>" href="<?php echo base_url('admin/leagues'); ?>">
        <i class="fa fa-users"></i>Leagues
      </a></li>
      <li><a class="<?php echo ($this->uri->segment(2) == 'ladders') ? 'active' : ''; ?>" href="<?php echo base_url('admin/ladders'); ?>">
        <i class="fa fa-signal"></i>Ladders
      </a></li>
      <li><a class="<?php echo ($this->uri->segment(2) == 'fixtures') ? 'active' : ''; ?>" href="<?php echo base_url('admin/fixtures'); ?>">
        <i class="fa fa-trophy"></i>Fixtures
      </a></li>
      <li><a class="<?php echo ($this->uri->segment(2) == 'members') ? 'active' : ''; ?>" href="<?php echo base_url('admin/members'); ?>">
        <i class="fa fa-users"></i>Members / Mobile App Subscribers
      </a></li>
      <li><a class="<?php echo ($this->uri->segment(2) == 'admin') ? 'active' : ''; ?>" href="<?php echo base_url('admin/admin'); ?>">
        <i class="fa fa-lock"></i>Administrators
      </a></li>

    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->

<!-- main content start -->
<section id="main-content">
  <section class="wrapper">
