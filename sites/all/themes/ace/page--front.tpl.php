<?php global $base_url; $themepath = $base_url.'/'.path_to_theme(); ?>
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
	  <?php if ($page['alert']): print render($page['alert']);  endif; ?>
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

									<div class="col-sm-7 infobox-container">
										<div class="infobox infobox-green  ">
											<div class="infobox-icon">
												<i class="icon-comments"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">32</span>
												<div class="infobox-content">comments + 2 reviews</div>
											</div>
											<div class="stat stat-success">8%</div>
										</div>

										<div class="infobox infobox-blue  ">
											<div class="infobox-icon">
												<i class="icon-twitter"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">11</span>
												<div class="infobox-content">new followers</div>
											</div>

											<div class="badge badge-success">
												+32%
												<i class="icon-arrow-up"></i>
											</div>
										</div>

										<div class="infobox infobox-pink  ">
											<div class="infobox-icon">
												<i class="icon-shopping-cart"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">8</span>
												<div class="infobox-content">new orders</div>
											</div>
											<div class="stat stat-important">4%</div>
										</div>

										<div class="infobox infobox-red  ">
											<div class="infobox-icon">
												<i class="icon-beaker"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">7</span>
												<div class="infobox-content">experiments</div>
											</div>
										</div>

										<div class="infobox infobox-orange2  ">
											<div class="infobox-chart">
												<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"><canvas height="34" width="44" style="display: inline-block; width: 44px; height: 34px; vertical-align: top;"></canvas></span>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">6,251</span>
												<div class="infobox-content">pageviews</div>
											</div>

											<div class="badge badge-success">
												7.2%
												<i class="icon-arrow-up"></i>
											</div>
										</div>

										<div class="infobox infobox-blue2  ">
											<div class="infobox-progress">
												<div style="width: 46px; height: 46px; line-height: 46px;" class="easy-pie-chart percentage easyPieChart" data-percent="42" data-size="46">
													<span class="percent">42</span>%
												<canvas width="46" height="46"></canvas></div>
											</div>

											<div class="infobox-data">
												<span class="infobox-text">traffic used</span>

												<div class="infobox-content">
													<span class="bigger-110">~</span>
													58GB remaining
												</div>
											</div>
										</div>

										<div class="space-6"></div>

										<div class="infobox infobox-green infobox-small infobox-dark">
											<div class="infobox-progress">
												<div style="width: 39px; height: 39px; line-height: 39px;" class="easy-pie-chart percentage easyPieChart" data-percent="61" data-size="39">
													<span class="percent">61</span>%
												<canvas width="39" height="39"></canvas></div>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Task</div>
												<div class="infobox-content">Completion</div>
											</div>
										</div>

										<div class="infobox infobox-blue infobox-small infobox-dark">
											<div class="infobox-chart">
												<span class="sparkline" data-values="3,4,2,3,4,4,2,2"><canvas height="20" width="39" style="display: inline-block; width: 39px; height: 20px; vertical-align: top;"></canvas></span>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Earnings</div>
												<div class="infobox-content">$32,000</div>
											</div>
										</div>

										<div class="infobox infobox-grey infobox-small infobox-dark">
											<div class="infobox-icon">
												<i class="icon-download-alt"></i>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">Downloads</div>
												<div class="infobox-content">1,205</div>
											</div>
										</div>
									</div>

									<div class="vspace-sm"></div>

									<div class="col-sm-5">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5>
													<i class="icon-signal"></i>
													Traffic Sources
												</h5>

												<div class="widget-toolbar no-border">
													<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
														This Week
														<i class="icon-angle-down icon-on-right bigger-110"></i>
													</button>

													<ul class="dropdown-menu pull-right dropdown-125 dropdown-lighter dropdown-caret">
														<li class="active">
															<a href="#" class="blue">
																<i class="icon-caret-right bigger-110">&nbsp;</i>
																This Week
															</a>
														</li>

														<li>
															<a href="#">
																<i class="icon-caret-right bigger-110 invisible">&nbsp;</i>
																Last Week
															</a>
														</li>

														<li>
															<a href="#">
																<i class="icon-caret-right bigger-110 invisible">&nbsp;</i>
																This Month
															</a>
														</li>

														<li>
															<a href="#">
																<i class="icon-caret-right bigger-110 invisible">&nbsp;</i>
																Last Month
															</a>
														</li>
													</ul>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div style="width: 90%; min-height: 150px; padding: 0px; position: relative;" id="piechart-placeholder"><canvas height="150" width="384" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 384px; height: 150px;" class="flot-base"></canvas><canvas height="150" width="384" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 384px; height: 150px;" class="flot-overlay"></canvas><div class="legend"><div style="position: absolute; width: 92px; height: 110px; top: 15px; right: -30px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:15px;right:-30px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #68BC31;overflow:hidden"></div></div></td><td class="legendLabel">social networks</td></tr><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #2091CF;overflow:hidden"></div></div></td><td class="legendLabel">search engines</td></tr><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #AF4E96;overflow:hidden"></div></div></td><td class="legendLabel">ad campaigns</td></tr><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #DA5430;overflow:hidden"></div></div></td><td class="legendLabel">direct traffic</td></tr><tr><td class="legendColorBox"><div style="border:1px solid null;padding:1px"><div style="width:4px;height:0;border:5px solid #FEE074;overflow:hidden"></div></div></td><td class="legendLabel">other</td></tr></tbody></table></div></div>

													<div class="hr hr8 hr-double"></div>

													<div class="clearfix">
														<div class="grid3">
															<span class="grey">
																<i class="icon-facebook-sign icon-2x blue"></i>
																&nbsp; likes
															</span>
															<h4 class="bigger pull-right">1,255</h4>
														</div>

														<div class="grid3">
															<span class="grey">
																<i class="icon-twitter-sign icon-2x purple"></i>
																&nbsp; tweets
															</span>
															<h4 class="bigger pull-right">941</h4>
														</div>

														<div class="grid3">
															<span class="grey">
																<i class="icon-pinterest-sign icon-2x red"></i>
																&nbsp; pins
															</span>
															<h4 class="bigger pull-right">1,050</h4>
														</div>
													</div>
												</div><!-- /widget-main -->
											</div><!-- /widget-body -->
										</div><!-- /widget-box -->
									</div><!-- /span -->
								</div><!-- /row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-5">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="lighter">
													<i class="icon-star orange"></i>
													Popular Domains
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="icon-caret-right blue"></i>
																	name
																</th>

																<th>
																	<i class="icon-caret-right blue"></i>
																	price
																</th>

																<th class="hidden-480">
																	<i class="icon-caret-right blue"></i>
																	status
																</th>
															</tr>
														</thead>

														<tbody>
															<tr>
																<td>internet.com</td>

																<td>
																	<small>
																		<s class="red">$29.99</s>
																	</small>
																	<b class="green">$19.99</b>
																</td>

																<td class="hidden-480">
																	<span class="label label-info arrowed-right arrowed-in">on sale</span>
																</td>
															</tr>

															<tr>
																<td>online.com</td>

																<td>
																	<small>
																		<s class="red"></s>
																	</small>
																	<b class="green">$16.45</b>
																</td>

																<td class="hidden-480">
																	<span class="label label-success arrowed-in arrowed-in-right">approved</span>
																</td>
															</tr>

															<tr>
																<td>newnet.com</td>

																<td>
																	<small>
																		<s class="red"></s>
																	</small>
																	<b class="green">$15.00</b>
																</td>

																<td class="hidden-480">
																	<span class="label label-danger arrowed">pending</span>
																</td>
															</tr>

															<tr>
																<td>web.com</td>

																<td>
																	<small>
																		<s class="red">$24.99</s>
																	</small>
																	<b class="green">$19.95</b>
																</td>

																<td class="hidden-480">
																	<span class="label arrowed">
																		<s>out of stock</s>
																	</span>
																</td>
															</tr>

															<tr>
																<td>domain.com</td>

																<td>
																	<small>
																		<s class="red"></s>
																	</small>
																	<b class="green">$12.00</b>
																</td>

																<td class="hidden-480">
																	<span class="label label-warning arrowed arrowed-right">SOLD</span>
																</td>
															</tr>
														</tbody>
													</table>
												</div><!-- /widget-main -->
											</div><!-- /widget-body -->
										</div><!-- /widget-box -->
									</div>

									<div class="col-sm-7">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="lighter">
													<i class="icon-signal"></i>
													Sale Stats
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-4">
													<div style="width: 100%; height: 220px; padding: 0px; position: relative;" id="sales-charts"><canvas height="220" width="635" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 635px; height: 220px;" class="flot-base"></canvas><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);" class="flot-text"><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;" class="flot-x-axis flot-x1-axis xAxis x1Axis"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 204px; left: 28px; text-align: center;">0.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 204px; left: 123px; text-align: center;">1.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 204px; left: 219px; text-align: center;">2.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 204px; left: 314px; text-align: center;">3.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 204px; left: 410px; text-align: center;">4.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 204px; left: 505px; text-align: center;">5.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 79px; top: 204px; left: 601px; text-align: center;">6.0</div></div><div style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;" class="flot-y-axis flot-y1-axis yAxis y1Axis"><div class="flot-tick-label tickLabel" style="position: absolute; top: 192px; left: 1px; text-align: right;">-2.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 168px; left: 1px; text-align: right;">-1.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 144px; left: 1px; text-align: right;">-1.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 120px; left: 1px; text-align: right;">-0.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 96px; left: 4px; text-align: right;">0.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 72px; left: 4px; text-align: right;">0.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 48px; left: 4px; text-align: right;">1.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 24px; left: 4px; text-align: right;">1.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 4px; text-align: right;">2.000</div></div></div><canvas height="220" width="635" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 635px; height: 220px;" class="flot-overlay"></canvas><div class="legend"><div style="position: absolute; width: 64px; height: 66px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div></div></td><td class="legendLabel">Domains</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(175,216,248);overflow:hidden"></div></div></td><td class="legendLabel">Hosting</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(203,75,75);overflow:hidden"></div></div></td><td class="legendLabel">Services</td></tr></tbody></table></div></div>
												</div><!-- /widget-main -->
											</div><!-- /widget-body -->
										</div><!-- /widget-box -->
									</div>
								</div>

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-6">
										<div class="widget-box transparent" id="recent-box">
											<div class="widget-header">
												<h4 class="lighter smaller">
													<i class="icon-rss orange"></i>
													RECENT
												</h4>

												<div class="widget-toolbar no-border">
													<ul class="nav nav-tabs" id="recent-tab">
														<li class="active">
															<a data-toggle="tab" href="#task-tab">Tasks</a>
														</li>

														<li class="">
															<a data-toggle="tab" href="#member-tab">Members</a>
														</li>

														<li class="">
															<a data-toggle="tab" href="#comment-tab">Comments</a>
														</li>
													</ul>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-4">
													<div class="tab-content padding-8 overflow-visible">
														<div id="task-tab" class="tab-pane active">
															<h4 class="smaller lighter green">
																<i class="icon-list"></i>
																Sortable Lists
															</h4>

															<ul id="tasks" class="item-list ui-sortable">
																<li class="item-orange clearfix">
																	<label class="inline">
																		<input class="ace" type="checkbox">
																		<span class="lbl"> Answering customer questions</span>
																	</label>

																	<div style="width: 30px; height: 30px; line-height: 30px;" class="pull-right easy-pie-chart percentage easyPieChart" data-size="30" data-color="#ECCB71" data-percent="42">
																		<span class="percent">42</span>%
																	<canvas width="30" height="30"></canvas></div>
																</li>

																<li class="item-red clearfix">
																	<label class="inline">
																		<input class="ace" type="checkbox">
																		<span class="lbl"> Fixing bugs</span>
																	</label>

																	<div class="pull-right action-buttons">
																		<a href="#" class="blue">
																			<i class="icon-pencil bigger-130"></i>
																		</a>

																		<span class="vbar"></span>

																		<a href="#" class="red">
																			<i class="icon-trash bigger-130"></i>
																		</a>

																		<span class="vbar"></span>

																		<a href="#" class="green">
																			<i class="icon-flag bigger-130"></i>
																		</a>
																	</div>
																</li>

																<li class="item-default clearfix">
																	<label class="inline">
																		<input class="ace" type="checkbox">
																		<span class="lbl"> Adding new features</span>
																	</label>

																	<div class="inline pull-right position-relative dropdown-hover">
																		<button class="btn btn-minier bigger btn-primary">
																			<i class="icon-cog icon-only bigger-120"></i>
																		</button>

																		<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-caret dropdown-close pull-right">
																			<li>
																				<a data-original-title="Mark&nbsp;as&nbsp;done" href="#" class="tooltip-success" data-rel="tooltip" title="">
																					<span class="green">
																						<i class="icon-ok bigger-110"></i>
																					</span>
																				</a>
																			</li>

																			<li>
																				<a data-original-title="Delete" href="#" class="tooltip-error" data-rel="tooltip" title="">
																					<span class="red">
																						<i class="icon-trash bigger-110"></i>
																					</span>
																				</a>
																			</li>
																		</ul>
																	</div>
																</li>

																<li class="item-blue clearfix">
																	<label class="inline">
																		<input class="ace" type="checkbox">
																		<span class="lbl"> Upgrading scripts used in template</span>
																	</label>
																</li>

																<li class="item-grey clearfix">
																	<label class="inline">
																		<input class="ace" type="checkbox">
																		<span class="lbl"> Adding new skins</span>
																	</label>
																</li>

																<li class="item-green clearfix">
																	<label class="inline">
																		<input class="ace" type="checkbox">
																		<span class="lbl"> Updating server software up</span>
																	</label>
																</li>

																<li class="item-pink clearfix">
																	<label class="inline">
																		<input class="ace" type="checkbox">
																		<span class="lbl"> Cleaning up</span>
																	</label>
																</li>
															</ul>
														</div>

														<div id="member-tab" class="tab-pane">
															<div class="clearfix">
																<div class="itemdiv memberdiv">
																	<div class="user">
																		<img alt="Bob Doe's avatar" src="<?php echo $themepath; ?>/images/
																		user.jpg">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Bob Doe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="green">20 min</span>
																		</div>

																		<div>
																			<span class="label label-warning label-sm">pending</span>

																			<div class="inline position-relative">
																				<button class="btn btn-minier bigger btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown">
																					<i class="icon-angle-down icon-only bigger-120"></i>
																				</button>

																				<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																					<li>
																						<a data-original-title="Approve" href="#" class="tooltip-success" data-rel="tooltip" title="">
																							<span class="green">
																								<i class="icon-ok bigger-110"></i>
																							</span>
																						</a>
																					</li>

																					<li>
																						<a data-original-title="Reject" href="#" class="tooltip-warning" data-rel="tooltip" title="">
																							<span class="orange">
																								<i class="icon-remove bigger-110"></i>
																							</span>
																						</a>
																					</li>

																					<li>
																						<a data-original-title="Delete" href="#" class="tooltip-error" data-rel="tooltip" title="">
																							<span class="red">
																								<i class="icon-trash bigger-110"></i>
																							</span>
																						</a>
																					</li>
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>

																<div class="itemdiv memberdiv">
																	<div class="user">
																		<img alt="Joe Doe's avatar" src="<?php echo $themepath; ?>/images/avatar2.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Joe Doe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="green">1 hour</span>
																		</div>

																		<div>
																			<span class="label label-warning label-sm">pending</span>

																			<div class="inline position-relative">
																				<button class="btn btn-minier bigger btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown">
																					<i class="icon-angle-down icon-only bigger-120"></i>
																				</button>

																				<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																					<li>
																						<a data-original-title="Approve" href="#" class="tooltip-success" data-rel="tooltip" title="">
																							<span class="green">
																								<i class="icon-ok bigger-110"></i>
																							</span>
																						</a>
																					</li>

																					<li>
																						<a data-original-title="Reject" href="#" class="tooltip-warning" data-rel="tooltip" title="">
																							<span class="orange">
																								<i class="icon-remove bigger-110"></i>
																							</span>
																						</a>
																					</li>

																					<li>
																						<a data-original-title="Delete" href="#" class="tooltip-error" data-rel="tooltip" title="">
																							<span class="red">
																								<i class="icon-trash bigger-110"></i>
																							</span>
																						</a>
																					</li>
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>

																<div class="itemdiv memberdiv">
																	<div class="user">
																		<img alt="Jim Doe's avatar" src="<?php echo $themepath; ?>/images/avatar.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Jim Doe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="green">2 hour</span>
																		</div>

																		<div>
																			<span class="label label-warning label-sm">pending</span>

																			<div class="inline position-relative">
																				<button class="btn btn-minier bigger btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown">
																					<i class="icon-angle-down icon-only bigger-120"></i>
																				</button>

																				<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																					<li>
																						<a data-original-title="Approve" href="#" class="tooltip-success" data-rel="tooltip" title="">
																							<span class="green">
																								<i class="icon-ok bigger-110"></i>
																							</span>
																						</a>
																					</li>

																					<li>
																						<a data-original-title="Reject" href="#" class="tooltip-warning" data-rel="tooltip" title="">
																							<span class="orange">
																								<i class="icon-remove bigger-110"></i>
																							</span>
																						</a>
																					</li>

																					<li>
																						<a data-original-title="Delete" href="#" class="tooltip-error" data-rel="tooltip" title="">
																							<span class="red">
																								<i class="icon-trash bigger-110"></i>
																							</span>
																						</a>
																					</li>
																				</ul>
																			</div>
																		</div>
																	</div>
																</div>

																<div class="itemdiv memberdiv">
																	<div class="user">
																		<img alt="Alex Doe's avatar" src="<?php echo $themepath; ?>/images/avatar5.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Alex Doe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="green">3 hour</span>
																		</div>

																		<div>
																			<span class="label label-danger label-sm">blocked</span>
																		</div>
																	</div>
																</div>

																<div class="itemdiv memberdiv">
																	<div class="user">
																		<img alt="Bob Doe's avatar" src="<?php echo $themepath; ?>/images/avatar2.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Bob Doe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="green">6 hour</span>
																		</div>

																		<div>
																			<span class="label label-success label-sm arrowed-in">approved</span>
																		</div>
																	</div>
																</div>

																<div class="itemdiv memberdiv">
																	<div class="user">
																		<img alt="Susan's avatar" src="<?php echo $themepath; ?>/images/avatar3.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Susan</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="green">yesterday</span>
																		</div>

																		<div>
																			<span class="label label-success label-sm arrowed-in">approved</span>
																		</div>
																	</div>
																</div>

																<div class="itemdiv memberdiv">
																	<div class="user">
																		<img alt="Phil Doe's avatar" src="<?php echo $themepath; ?>/images/avatar4.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Phil Doe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="green">2 days ago</span>
																		</div>

																		<div>
																			<span class="label label-info label-sm arrowed-in arrowed-in-right">online</span>
																		</div>
																	</div>
																</div>

																<div class="itemdiv memberdiv">
																	<div class="user">
																		<img alt="Alexa Doe's avatar" src="<?php echo $themepath; ?>/images/avatar1.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Alexa Doe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="green">3 days ago</span>
																		</div>

																		<div>
																			<span class="label label-success label-sm arrowed-in">approved</span>
																		</div>
																	</div>
																</div>
															</div>

															<div class="center">
																<i class="icon-group icon-2x green"></i>

																&nbsp;
																<a href="#">
																	See all members &nbsp;
																	<i class="icon-arrow-right"></i>
																</a>
															</div>

															<div class="hr hr-double hr8"></div>
														</div><!-- member-tab -->

														<div id="comment-tab" class="tab-pane">
															<div style="position: relative; overflow: hidden; width: auto; height: 300px;" class="slimScrollDiv"><div style="overflow: hidden; width: auto; height: 300px;" class="comments">
																<div class="itemdiv commentdiv">
																	<div class="user">
																		<img alt="Bob Doe's Avatar" src="<?php echo $themepath; ?>/images/avatar.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Bob Doe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="green">6 min</span>
																		</div>

																		<div class="text">
																			<i class="icon-quote-left"></i>
																			Lorem ipsum dolor sit amet, consectetur adipiscing 
elit. Quisque commodo massa sed ipsum porttitor facilisis �
																		</div>
																	</div>

																	<div class="tools">
																		<div class="inline position-relative">
																			<button class="btn btn-minier bigger btn-yellow dropdown-toggle" data-toggle="dropdown">
																				<i class="icon-angle-down icon-only bigger-120"></i>
																			</button>

																			<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
																				<li>
																					<a data-original-title="Approve" href="#" class="tooltip-success" data-rel="tooltip" title="">
																						<span class="green">
																							<i class="icon-ok bigger-110"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a data-original-title="Reject" href="#" class="tooltip-warning" data-rel="tooltip" title="">
																						<span class="orange">
																							<i class="icon-remove bigger-110"></i>
																						</span>
																					</a>
																				</li>

																				<li>
																					<a data-original-title="Delete" href="#" class="tooltip-error" data-rel="tooltip" title="">
																						<span class="red">
																							<i class="icon-trash bigger-110"></i>
																						</span>
																					</a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</div>

																<div class="itemdiv commentdiv">
																	<div class="user">
																		<img alt="Jennifer's Avatar" src="<?php echo $themepath; ?>/images/avatar1.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Jennifer</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="blue">15 min</span>
																		</div>

																		<div class="text">
																			<i class="icon-quote-left"></i>
																			Lorem ipsum dolor sit amet, consectetur adipiscing 
elit. Quisque commodo massa sed ipsum porttitor facilisis �
																		</div>
																	</div>

																	<div class="tools">
																		<div class="action-buttons bigger-125">
																			<a href="#">
																				<i class="icon-pencil blue"></i>
																			</a>

																			<a href="#">
																				<i class="icon-trash red"></i>
																			</a>
																		</div>
																	</div>
																</div>

																<div class="itemdiv commentdiv">
																	<div class="user">
																		<img alt="Joe's Avatar" src="<?php echo $themepath; ?>/images/avatar2.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Joe</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="orange">22 min</span>
																		</div>

																		<div class="text">
																			<i class="icon-quote-left"></i>
																			Lorem ipsum dolor sit amet, consectetur adipiscing 
elit. Quisque commodo massa sed ipsum porttitor facilisis �
																		</div>
																	</div>

																	<div class="tools">
																		<div class="action-buttons bigger-125">
																			<a href="#">
																				<i class="icon-pencil blue"></i>
																			</a>

																			<a href="#">
																				<i class="icon-trash red"></i>
																			</a>
																		</div>
																	</div>
																</div>

																<div class="itemdiv commentdiv">
																	<div class="user">
																		<img alt="Rita's Avatar" src="<?php echo $themepath; ?>/images/avatar3.png">
																	</div>

																	<div class="body">
																		<div class="name">
																			<a href="#">Rita</a>
																		</div>

																		<div class="time">
																			<i class="icon-time"></i>
																			<span class="red">50 min</span>
																		</div>

																		<div class="text">
																			<i class="icon-quote-left"></i>
																			Lorem ipsum dolor sit amet, consectetur adipiscing 
elit. Quisque commodo massa sed ipsum porttitor facilisis �
																		</div>
																	</div>

																	<div class="tools">
																		<div class="action-buttons bigger-125">
																			<a href="#">
																				<i class="icon-pencil blue"></i>
																			</a>

																			<a href="#">
																				<i class="icon-trash red"></i>
																			</a>
																		</div>
																	</div>
																</div>
															</div><div style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;" class="slimScrollBar ui-draggable"></div><div style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>

															<div class="hr hr8"></div>

															<div class="center">
																<i class="icon-comments-alt icon-2x green"></i>

																&nbsp;
																<a href="#">
																	See all comments &nbsp;
																	<i class="icon-arrow-right"></i>
																</a>
															</div>

															<div class="hr hr-double hr8"></div>
														</div>
													</div>
												</div><!-- /widget-main -->
											</div><!-- /widget-body -->
										</div><!-- /widget-box -->
									</div><!-- /span -->

									<div class="col-sm-6">
										<div class="widget-box ">
											<div class="widget-header">
												<h4 class="lighter smaller">
													<i class="icon-comment blue"></i>
													Conversation
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<div style="position: relative; overflow: hidden; width: auto; height: 300px;" class="slimScrollDiv"><div style="overflow: hidden; width: auto; height: 300px;" class="dialogs">
														<div class="itemdiv dialogdiv">
															<div class="user">
																<img alt="Alexa's Avatar" src="<?php echo $themepath; ?>/images/avatar1.png">
															</div>

															<div class="body">
																<div class="time">
																	<i class="icon-time"></i>
																	<span class="green">4 sec</span>
																</div>

																<div class="name">
																	<a href="#">Alexa</a>
																</div>
																<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis.</div>

																<div class="tools">
																	<a href="#" class="btn btn-minier btn-info">
																		<i class="icon-only icon-share-alt"></i>
																	</a>
																</div>
															</div>
														</div>

														<div class="itemdiv dialogdiv">
															<div class="user">
																<img alt="John's Avatar" src="<?php echo $themepath; ?>/images/avatar.png">
															</div>

															<div class="body">
																<div class="time">
																	<i class="icon-time"></i>
																	<span class="blue">38 sec</span>
																</div>

																<div class="name">
																	<a href="#">John</a>
																</div>
																<div class="text">Raw denim you probably haven't heard of them jean shorts Austin.</div>

																<div class="tools">
																	<a href="#" class="btn btn-minier btn-info">
																		<i class="icon-only icon-share-alt"></i>
																	</a>
																</div>
															</div>
														</div>

														<div class="itemdiv dialogdiv">
															<div class="user">
																<img alt="Bob's Avatar" src="<?php echo $themepath; ?>/images/user.jpg">
															</div>

															<div class="body">
																<div class="time">
																	<i class="icon-time"></i>
																	<span class="orange">2 min</span>
																</div>

																<div class="name">
																	<a href="#">Bob</a>
																	<span class="label label-info arrowed arrowed-in-right">admin</span>
																</div>
																<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis.</div>

																<div class="tools">
																	<a href="#" class="btn btn-minier btn-info">
																		<i class="icon-only icon-share-alt"></i>
																	</a>
																</div>
															</div>
														</div>

														<div class="itemdiv dialogdiv">
															<div class="user">
																<img alt="Jim's Avatar" src="<?php echo $themepath; ?>/images/avatar4.png">
															</div>

															<div class="body">
																<div class="time">
																	<i class="icon-time"></i>
																	<span class="grey">3 min</span>
																</div>

																<div class="name">
																	<a href="#">Jim</a>
																</div>
																<div class="text">Raw denim you probably haven't heard of them jean shorts Austin.</div>

																<div class="tools">
																	<a href="#" class="btn btn-minier btn-info">
																		<i class="icon-only icon-share-alt"></i>
																	</a>
																</div>
															</div>
														</div>

														<div class="itemdiv dialogdiv">
															<div class="user">
																<img alt="Alexa's Avatar" src="<?php echo $themepath; ?>/images/avatar1.png">
															</div>

															<div class="body">
																<div class="time">
																	<i class="icon-time"></i>
																	<span class="green">4 min</span>
																</div>

																<div class="name">
																	<a href="#">Alexa</a>
																</div>
																<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>

																<div class="tools">
																	<a href="#" class="btn btn-minier btn-info">
																		<i class="icon-only icon-share-alt"></i>
																	</a>
																</div>
															</div>
														</div>
													</div><div style="background: none repeat scroll 0% 0% rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 225.564px;" class="slimScrollBar ui-draggable"></div><div style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: none repeat scroll 0% 0% rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;" class="slimScrollRail"></div></div>

													<form>
														<div class="form-actions">
															<div class="input-group">
																<input placeholder="Type your message here ..." class="form-control" name="message" type="text">
																<span class="input-group-btn">
																	<button class="btn btn-sm btn-info no-radius" type="button">
																		<i class="icon-share-alt"></i>
																		Send
																	</button>
																</span>
															</div>
														</div>
													</form>
												</div><!-- /widget-main -->
											</div><!-- /widget-body -->
										</div><!-- /widget-box -->
									</div><!-- /span -->
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