<!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">

      <?php if ($_SESSION['admin_level'] == 3): ?>
      <li>
        <a class="<?php echo (uri_string() == "admin/admin") ? 'active' : ''; ?>" href="<?php echo base_url('admin/admin'); ?>"> <i class="fa fa-users"></i> <span>Admin</span> </a>
      </li>
      <?php endif ?>

      <li>
        <a class="<?php echo (uri_string() == "admin/users") ? 'active' : ''; ?>" href="<?php echo base_url('admin/users'); ?>"> <i class="fa fa-users"></i> <span>Users</span> </a>
      </li>

      <li>--</li>
      <li>
        <a class="<?php echo (uri_string() == "admin/videos" || preg_match('/admin\/video/', uri_string())) ? 'active' : ''; ?>" href="<?php echo base_url('admin/videos'); ?>"> <i class="fa fa-video-camera"></i> <span>Videos</span> </a>
      </li>

      <li>
        <a class="<?php echo (uri_string() == "admin/news" || preg_match('/admin\/news_blog/', uri_string())) ? 'active' : ''; ?>" href="<?php echo base_url('admin/news'); ?>"> <i class="fa fa-rss"></i> <span>News/Blogs</span> </a>
      </li>

      <li>--</li>
      <li>
        <a class="<?php echo (uri_string() == "admin/products" || preg_match('/admin\/product/', uri_string())) ? 'active' : ''; ?>" href="<?php echo base_url('admin/products'); ?>"> <i class="fa fa-lemon-o"></i> <span>Products</span> </a>
      </li>
      <li>
        <a class="<?php echo (uri_string() == "admin/recipes" || preg_match('/admin\/recipe/', uri_string())) ? 'active' : ''; ?>" href="<?php echo base_url('admin/recipes'); ?>"> <i class="fa fa-file-text-o"></i> <span>Recipes</span> </a>
      </li>

      <li>--</li>
      <li>
        <a class="<?php echo (uri_string() == "admin/branches" || preg_match('/admin\/branch/', uri_string())) ? 'active' : ''; ?>" href="<?php echo base_url('admin/branches'); ?>"> <i class="fa fa-puzzle-piece"></i> <span>Branches</span> </a>
      </li>
      <li>
        <a class="<?php echo (uri_string() == "admin/dealers") ? 'active' : ''; ?>" href="<?php echo base_url('admin/dealers'); ?>"> <i class="fa fa-puzzle-piece"></i> <span>Dealers</span> </a>
      </li>
      <li>
        <a class="<?php echo (uri_string() == "admin/sales") ? 'active' : ''; ?>" href="<?php echo base_url('admin/sales'); ?>"> <i class="fa fa-puzzle-piece"></i> <span>Sales Team</span> </a>
      </li>
      <li>
        <a class="<?php echo (uri_string() == "admin/inquiries") ? 'active' : ''; ?>" href="<?php echo base_url('admin/inquiries'); ?>"> <i class="fa fa-pencil-square-o"></i> <span>Inquiries</span> </a>
      </li>

      <li>--</li>
      <li>
        <a class="<?php echo (uri_string() == "admin/brands" || preg_match('/admin\/brands/', uri_string())) ? 'active' : ''; ?>" href="<?php echo base_url('admin/brands'); ?>"> <i class="fa fa-puzzle-piece"></i> <span>Brands</span> </a>
      </li>
      <li>
        <a class="<?php echo (uri_string() == "admin/segments" || preg_match('/admin\/segment/', uri_string())) ? 'active' : ''; ?>" href="<?php echo base_url('admin/segments'); ?>"> <i class="fa fa-puzzle-piece"></i> <span>Segments</span> </a>
      </li>
      <li>
        <a class="<?php echo (uri_string() == "admin/countries" || preg_match('/admin\/country/', uri_string())) ? 'active' : ''; ?>" href="<?php echo base_url('admin/countries'); ?>"> <i class="fa fa-plane"></i> <span>Countries</span> </a>
      </li>
      <li>
        <a class="<?php echo (uri_string() == "admin/categories" || preg_match('/admin\/category/', uri_string())) ? 'active' : ''; ?>" href="<?php echo base_url('admin/categories'); ?>"> <i class="fa fa-puzzle-piece"></i> <span>Categories</span> </a>
      </li>

      <li>
        <a class="<?php echo (uri_string() == "admin/applications" || preg_match('/admin\/application/', uri_string())) ? 'active' : ''; ?>" href="<?php echo base_url('admin/applications'); ?>"> <i class="fa fa-puzzle-piece"></i> <span>Applications</span> </a>
      </li>

      <li>Notifications</li>
      <li>
        <a class="<?php echo (uri_string() == "admin/announcements") ? 'active' : ''; ?>" href="<?php echo base_url('admin/announcements'); ?>"> <i class="fa fa-puzzle-piece"></i> <span>Announcements/Promos</span> </a>
      </li>

      
      
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->