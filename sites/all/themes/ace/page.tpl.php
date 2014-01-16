<div class="navbar navbar-default" id="navbar">
<div class="navbar-container" id="navbar-container">
  <div class="navbar-header pull-left">
      <a href="<?php print $base_path ?>" class="navbar-brand" title="<?php print $site_name_and_slogan  ?>">
        <small>
          <?php if ($site_name || $site_slogan) print $site_name_and_slogan;  ?>
	</small>
      </a>
      <!-- /.brand -->
      
  </div>
   <!-- /.navbar-header right -->
          <div class="navbar-header pull-right" role="navigation">
            <?php if ($page['alert']): print render($page['alert']);  endif; ?>
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
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
	<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
	  <button class="btn btn-success">
	     <i class="icon-signal"></i>
	  </button>
	  <button class="btn btn-info">
	     <i class="icon-pencil"></i>
	  </button>
	  <button class="btn btn-warning">
	    <i class="icon-group"></i>
	  </button>
	  <button class="btn btn-danger">
	     <i class="icon-cogs"></i>
	  </button>
	</div>

      <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
	<span class="btn btn-success"></span>
	<span class="btn btn-info"></span>
	<span class="btn btn-warning"></span>
	<span class="btn btn-danger"></span>
      </div>
    </div>
    <!-- #sidebar-shortcuts -->
    <?php if($page['left_sidebar']): ?>
       <?php print render($page['left_sidebar']); ?>
    <?php endif; ?>  
      <div class="sidebar-collapse" id="sidebar-collapse">
	<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
      </div>
	 
  </div>

<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
	  <ul class="breadcrumb">
	    <li class="active">
		<i class="icon-home home-icon"></i>
		<?php if ($breadcrumb):  print $breadcrumb; ?>
		<?php else: print '<a href="#">Home</a>'; endif; ?>
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

<div class="ace-settings-container" id="ace-settings-container">
	<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
		<i class="icon-cog bigger-150"></i>
	</div>
	<!--Page display Setting-->
	<div class="ace-settings-box" id="ace-settings-box">
	    <div>
		<div class="pull-left">
		  <select id="skin-colorpicker" class="hide">
			  <option data-skin="default" value="#438EB9">#438EB9</option>
			  <option data-skin="skin-1" value="#222A2D">#222A2D</option>
			  <option data-skin="skin-2" value="#C6487E">#C6487E</option>
			  <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
		  </select>
		</div>
		    <span>&nbsp; Choose Skin</span>
	    </div>
		<div>
			<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
			<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
		</div>
		<div>
			<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
			<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
		</div>
		<div>
			<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
			<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
		</div>
		<div>
			<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
			<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
		</div>
		<div>
			<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
			<label class="lbl" for="ace-settings-add-container">Inside
			    <b>.container</b>
			</label>
		</div>
	</div>
	<!--Ends Page display Setting-->
</div><!-- /#ace-settings-container -->
      </div><!-- /.main-container-inner -->

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
          <i class="icon-double-angle-up icon-only bigger-110"></i>
      </a>
</div><!-- /.main-container -->
