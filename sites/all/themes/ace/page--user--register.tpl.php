<?php if (user_is_anonymous()): ?>
    <div id="main-login">
      <div id="inner-logo" style="text-align: center;">
	<a href="<?php print $base_path ?>" title="<?php print $site_name_and_slogan  ?>">
	  <?php if ($logo): ?>
	      <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
	  <?php endif; ?>
	</a>
      </div>
        
        <div id="login" class="animate form position">
            <div id="login-content">
                <h4 style="color: rgb(66, 139, 202); margin-bottom: 0px;">New User Registration</h4>
                <?php print render($page['content']); ?>
	      <ul style="margin: 0px; list-style-type: none; width: auto; height: auto; overflow: hidden;">
		<li class="first" style="float: left;"><a title="User login" href="user">User login</a></li>
		<li class="last"  style="float: right;"><a title="Request new password via e-mail." href="user/password">Request new password</a></li>
	      </ul>
            </div>
	    
        </div>
    </div>
<?php endif; ?>
<?php if (user_is_logged_in()): ?>
<?php global $base_url; $themepath = $base_url.'/'.path_to_theme(); ?>
<div class="navbar navbar-default" id="navbar">
<div class="navbar-container" id="navbar-container">
  <div class="navbar-header pull-left">
      <a href="<?php print $base_path ?>" class="navbar-brand" title="<?php print $site_name_and_slogan  ?>">
        <small>
           <?php if ($logo): ?>
                <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
            <?php endif; ?>
	</small>
      </a>
      <!-- /.brand -->
      
  </div>
   <!-- /.navbar-header right -->
          <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
	      <?php if ($page['alert']): print render($page['alert']);  endif; ?>
	    </ul><!-- /.ace-nav -->
          </div>

  <!-- /.navbar-header left-->
      </div><!-- /.navbar-container -->
</div><!-- /.navbar -->

<div class="main-container" id="main-container">
<div class="main-container-inner">
	<a class="menu-toggler" id="menu-toggler" href="#">
		<span class="menu-text"></span>
	</a>
  <div class="sidebar" id="sidebar">
   
    <!-- #sidebar-shortcuts -->
    <?php if ($page['left_sidebar']): print render($page['left_sidebar']);  endif; ?> 
      <div class="sidebar-collapse" id="sidebar-collapse">
	<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
      </div>
	 
  </div>

<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
	  <ul class="breadcrumb">
	    <li class="active">
		<i class="icon-home home-icon"></i>
		<?php print $breadcrumb; ?>
	    </li>
	  </ul>
    </div>
	<div class="nav-search" id="nav-search">
	  <?php print render($page['search']);  ?>
	 </div>
    <div class="page-content">
	 <?php if($page['header'] || $title): ?>
	<div class="page-header">
	  <?php print '<h1>'.drupal_get_title().'</h1>'; ?>
	 <?php print render($page['header']); ?>
	</div><!-- /.page-header -->
	<?php endif; ?>
	 <div class="row">
	    <div class="col-xs-12">
		<?php if($page['highlight']): ?>
		    <div class="alert alert-block alert-success">
			<button type="button" class="close" data-dismiss="alert">
			   <i class="icon-remove"></i>
			</button>
			<i class="icon-ok green"></i>
			<?php print render($page['highlight']); ?>
		    </div>
		<?php endif; ?>
		<?php if($is_front): ?><!--check if current is front-->
		    <?php if($page['script_first'] || $page['script_second']): ?>
			<div class="row">
			    <div class="space-6"></div>
			    <?php if($page['script_first']):?>
				<div class="col-sm-7">
				  <?php print render($page['script_first']);?>
				</div>
			    <?php endif;?>
				<div class="vspace-sm"></div>
			    <?php if($page['script_second']):?>
				<div class="col-sm-5">
				    <?php print render($page['script_second']);?>
				</div>
			    <?php endif;?>      
			</div><!-- /row -->
			<div class="hr hr32 hr-dotted"></div>
		    <?php endif; ?>
		    <?php if($page['script_third'] || $page['script_fourth']): ?>
			<div class="row">
			    <?php if($page['script_third']):?>
				<div class="col-sm-5">
				    <?php print render($page['script_third']);?>
				</div>
			    <?php endif;?>
			    <?php if($page['script_fourth']):?>
				<div class="col-sm-7">
				    <?php print render($page['script_fourth']);?>
				</div>
			    <?php endif;?>       
			</div>
			<div class="hr hr32 hr-dotted"></div>
		    <?php endif; ?>
		    <?php if($page['script_fifth'] || $page['script_sixth']): ?>
			<div class="row">
			<?php if($page['script_fifth']):?>
			    <div class="col-sm-6">
				<?php print render($page['script_fifth']);?>
			    </div><!-- /span -->
			<?php endif;?>
			<?php if($page['script_sixth']):?>
			    <div class="col-sm-6">
				<?php print render($page['script_sixth']);?>
			    </div><!-- /span -->
			<?php endif;?>  	
			 </div><!-- /row -->
		    <?php endif; ?>
		    <!-- PAGE CONTENT ENDS -->
		<?php else:?>
		<?php if($page['content']): ?><!--check if page has content-->
		    <?php if ($tabs): print render($tabs); endif ?>
		    <?php print render($page['content']); ?>    <!-- PAGE CONTENT BEGINS -->
		<?php endif; ?><!---end content checking-->
		<?php endif; ?><!--End front Check-->
	    </div><!-- /.col -->
	 </div><!-- /.row -->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
      </div><!-- /.main-container-inner -->

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
          <i class="icon-double-angle-up icon-only bigger-110"></i>
      </a>
</div><!-- /.main-container -->
<?php endif; ?>