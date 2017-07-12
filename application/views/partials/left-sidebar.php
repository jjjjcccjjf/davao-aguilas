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

    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->

<!-- main content start -->
<section id="main-content">
  <section class="wrapper">
