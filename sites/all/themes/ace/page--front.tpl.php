<?php global $base_url; $themepath = $base_url.'/'.path_to_theme();?>
  <div class="navbar navbar-default" id="navbar">
      <div class="navbar-container" id="navbar-container">
	<div class="navbar-header pull-left">
	  <a href="<?php print $base_path ?>" class="navbar-brand" title="<?php print $site_name_and_slogan  ?>">
	    <small>
	      <i class="icon-leaf"></i>
	      <?php if ($site_name || $site_slogan) print $site_name;  ?>
	    </small>
	  </a><!-- /.brand -->
	</div><!-- /.navbar-header -->
	<!-- /.navbar-header right -->
	<div class="navbar-header pull-right" role="navigation">
		<ul class="nav ace-nav">
		    <?php if ($page['alert']): print render($page['alert']);  endif; ?>
		</ul><!-- /.ace-nav -->
	</div><!-- /.navbar-header -->
      </div><!-- /.container -->
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
					</div><!-- #sidebar-shortcuts -->
					    <?php if ($page['left_sidebar']): print render($page['left_sidebar']);  endif; ?>
					    
					<!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<span>Home</span>
							</li>
						</ul><!-- .breadcrumb -->
						<div class="nav-search" id="nav-search">
							<?php print render($page['search']);  ?>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<?php if($page['header'] || $title): ?>
						  <div class="page-header">
						    <?php print '<h1>'.drupal_get_title().'</h1>'; ?>
						    <?php print render($page['header']); ?>
						  </div><!-- /.page-header -->
						<?php endif; ?><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php print $messages; ?>
								<div class="row">
									<div class="space-6"></div>

									<?php if ($page['script_first']): ?> <div class="col-sm-7 infobox-container"> <?php print render($page['script_first']); ?> </div> <?php  endif; ?>

									<div class="vspace-sm"></div>
											    <?php
									    global $base_url;
									    $url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];									    
									    $explode = explode('=', $url);
									    $name_of_week = "This Week";
									    $name = '';
									    if(!empty($explode)){
										foreach($explode as $key => $explode){
										    $name = $explode;
										}
										if($name == 'thisweek'){
										    $name_of_week = "This Week";
										}elseif($name == 'lastweek'){
										    $name_of_week = "Last Week";
										}
									    }
									?>
									<?php if ($page['script_second']): ?>
									<div class="col-sm-5">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5>
													<i class="icon-signal"></i>
													Modules Traffic 
												</h5>

												<div class="widget-toolbar no-border">
													<button class="btn btn-minier btn-primary">
														<?php echo $name_of_week; ?>
														<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
													</button>
															<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
														<li class="active" id = "this_week">
															<a href="#" class="blue" id="thisweek">
																<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																This Week
															</a>
														</li>

														<li>
															<a href="#" id = "lastweek">
																<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																Last Week
															</a>
														</li>

													</ul>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<?php print render($page['script_second']); ?>
													<div class="hr hr8 hr-double"></div>
														<div class="clearfix">
														<div class="grid3">
															<span class="grey">
																    <div id="fb-root"></div>
													<script>(function(d, s, id) {
													  var js, fjs = d.getElementsByTagName(s)[0];
													  if (d.getElementById(id)) return;
													  js = d.createElement(s); js.id = id;
													  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
													  fjs.parentNode.insertBefore(js, fjs);
													}(document, 'script', 'facebook-jssdk'));</script>
													<div class="fb-like" data-href="http://beta.rhaasoft.com" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
															</span>
															
														</div>

														<div class="grid3">
															<span class="grey">
																<script src="//platform.linkedin.com/in.js" type="text/javascript">
														    lang: en_US
														  </script>
														  <script type="IN/Share" data-url="http://beta.rhaasoft.com" data-counter="right"></script>
															</span>
															
														</div>

														<div class="grid3">
															<span class="grey">
															   <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://demo.drupaals.com">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
															</span>
															
														</div>
													</div>
												</div>
												
											</div>
											
											</div><!-- /widget-box -->
											</div><!-- /span -->
											<?php endif;?>
											</div><!-- /row -->

								<!--<div class="hr hr32 hr-dotted"></div>-->

								<div class="row">
									<?php if ($page['script_third']): ?> <div class="col-sm-5"> <?php print render($page['script_third']); ?> </div> <?php  endif; ?>	<!-- /widget-box -->
									<?php if ($page['script_fourth']): ?>
									<div class="col-sm-7">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="lighter">
													<i class="icon-signal"></i>
													Modules download Stats
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-4">
													<div style="width: 100%; height: 220px; padding: 0px; position: relative;" id="sales-charts">
												<?php print render($page['script_fourth']); ?></div><!-- /widget-main -->
											</div><!-- /widget-body -->
										</div><!-- /widget-box -->
									</div><?php  endif ;?>
								</div>

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
								    <?php if ($page['script_fifth']): ?>
									<div class="col-sm-6">
										<div class="widget-box transparent" id="recent-box">
											<div class="widget-header">
												<h4 class="lighter smaller">
													<i class="icon-rss orange"></i>
													RECENT
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-4">
													<div class="tab-content padding-8 overflow-visible">
													<?php print render($page['script_fifth']); ?>
													</div>
												</div><!-- /widget-main -->
											</div><!-- /widget-body -->
										</div><!-- /widget-box -->
									</div><!-- /span -->
								    <?php  endif; ?>
								    <?php if ($page['script_sixth']): ?><?php print render($page['script_sixth']); ?><?php  endif; ?>
								</div><!-- /row -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
	window.jQuery || document.write("<script src='<?php echo $themepath; ?>/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo $themepath; ?>/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<script type="text/javascript">
	if("ontouchend" in document) document.write("<script src='<?php echo $themepath; ?>/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<div style="top: 394px; left: 963px; display: none;" class="tooltip top in"><div class="tooltip-inner">search engines : 24.5%</div></div>