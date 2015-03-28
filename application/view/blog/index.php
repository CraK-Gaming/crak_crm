<div class="container normal-page sliderhome">
			<div class="row">
				<div class="span12">
				<?php $this->renderFeedbackMessages(); ?>
					<div class="template-wrapper">
						<div class="block span8 first cf">
							<div id="block-2" class="block block-news_blog_style_block span8 first cf">

								<?php foreach ($this->blog_posts as $blog_post) { ?>
									<div class="blog-post">

									<div class="blog-image">
										<a href="blog-post.html"><img src="./img/defaults/817x320.jpg"></a>
										<div class="blog-date">
											<span class="date"><?= date("d M",strtotime($blog_post->created_on)); ?><!-- Jun<br>17 --></span>
											<!-- <div class="plove"><a href="#" class="heart-love" id="heart-love-499" title="Love this"><span class="heart-love-count"><span class="icon-heart"></span>54</span></a></div> -->
										</div>
<!-- 										<div class="blog-rating">
											<div class="overall-score">
												<div class="rating r-45"></div>
											</div>
										</div> -->
										<!-- blog-rating -->
									</div>
									<!-- blog-image -->
									<div class="blog-content">
										<h2><a href="blog-post.html"><?= $blog_post->title; ?></a></h2>
										<div style="margin-top:15px; margin-bottom:15px">
											<?= $blog_post->description; ?>
										</div>
									</div>
									<!-- blog-content -->
									<div class="blog-info">
										<div class="post-pinfo">
											<span class="icon-user"></span> <a data-original-title="View" all="" posts="" by="" admin="" data-toggle="tooltip" href="#"><?= $blog_post->user_name ?></a>
										</div>
										<!-- post-pinfo -->
										<a href="#" class="button-small">Read more</a>
										<div class="clear"></div>
									</div>
									<!-- blog-info -->
								</div>
								<div class="block-divider"></div>
								<!-- /.blog-post -->
								<?php } ?>
								
							

<!-- 								<div class="pagination">
									<ul>
										<li class="active"><a href="#">1</a></li>
										<li><a href="#" class="inactive">2</a></li>
										<li><a class="page-selector" href="#">»</a></li>
									</ul>
								</div> -->
								<div class="clear"></div>
							</div>
						</div>
						<!-- Sidebar -->
						<div class="block span4 cf">
							<div>
								<div class="widget">
									<div class="title-wrapper">
										<h3 class="widget-title">Upcoming Matches</h3>
										<div class="clear"></div>
									</div>
									<div class="wcontainer">
										<ul class="clanwar-list">
											<li>
												<ul class="tabs">
													<li class="selected">
														<a href="#all" title="All">All</a>
														<div class="clear"></div>
													</li>
													<?php foreach ($this->games as $game) { ?>
														
														<li>
															<a href="#game-<?= $game->game_id; ?>" title="<?= $game->name; ?>"><?= $game->name; ?></a>
															<div class="clear"></div>
														</li>
													<?php } ?>
												</ul>
												<div class="clear"></div>
											</li>
											<?php foreach ($this->upcoming_matches as $match) { ?>
												<li class="clanwar-item game-<?= $match->game_id; ?>">
													<a href="#" title="<?= $match->tournament_name; ?>">
														<div class="wrap">
														
															<!--<div class="upcoming"><?= $match->score; ?></div>-->
															<div class="
															<?php
																switch ($match->match_status_id) {
																	case 1:		// Scheduled
																		echo 'upcoming';
																		break;
																	case 2:		// Cancelled - Should not reach this point
																		echo '';
																		break;
																	case 3:		// Win
																		echo 'scores win';
																		break;
																	case 4:		// Loss
																		echo 'scores loose';
																		break;
																	case 5:		// Scheduled
																		echo 'upcoming';
																		break;
																}
															?>
															"><?= $match->score; ?></div>
															
															<div class="match-wrap">
																<!--<img src="./img/defaults/25x25.jpg" class="clan1img">-->
																<div class="home-team"><?= $match->team_name; ?></div>
																<span class="vs">vs.</span>
																<div class="opponent-team">
																	<?= $match->opponent_name; ?>
																</div>
																<div class="clear"></div>
															</div>
															<div class="date"><?= $match->game_name; ?> - <?= date("F d, Y, H:i a",strtotime($match->match_date)); ?> </div>
															<div class="clear"></div>
														</div>
													</a>
												</li>
												
											<?php } ?>
											
										</ul>
									</div>
								</div>
								<div class="widget">
									<div class="title-wrapper">
										<h3 class="widget-title">Latest matches</h3>
										<div class="clear"></div>
									</div>
									<div class="wcontainer">
										<ul class="clanwar-list">
											<li>
												<ul class="tabs">
													<li class="selected">
														<a href="#all" title="All">All</a>
														<div class="clear"></div>
													</li>
													<?php foreach ($this->games as $game) { ?>
														
														<li>
															<a href="#game-<?= $game->game_id; ?>" title="<?= $game->name; ?>"><?= $game->name; ?></a>
															<div class="clear"></div>
														</li>
													<?php } ?>
												</ul>
												<div class="clear"></div>
											</li>
											<?php foreach ($this->recent_matches as $match) { ?>
												<li class="clanwar-item game-<?= $match->game_id; ?>">
													<a href="#" title="<?= $match->tournament_name; ?>">
														<div class="wrap">
														
															<!--<div class="upcoming"><?= $match->score; ?></div>-->
															<div class="
															<?php
																switch ($match->match_status_id) {
																	case 1:		// Scheduled
																		echo 'upcoming';
																		break;
																	case 2:		// Cancelled - Should not reach this point
																		echo '';
																		break;
																	case 3:		// Win
																		echo 'scores win';
																		break;
																	case 4:		// Loss
																		echo 'scores loose';
																		break;
																	case 5:		// Scheduled
																		echo 'upcoming';
																		break;
																}
															?>
															"><?= $match->score; ?></div>
															
															<div class="match-wrap">
																<!--<img src="./img/defaults/25x25.jpg" class="clan1img">-->
																<div class="home-team"><?= $match->team_name; ?></div>
																<span class="vs">vs.</span>
																<div class="opponent-team">
																	<?= $match->opponent_name; ?>
																</div>
																<div class="clear"></div>
															</div>
															<div class="date"><?= $match->game_name; ?> - <?= date("F d, Y, H:i a",strtotime($match->match_date)); ?> </div>
															<div class="clear"></div>
														</div>
													</a>
												</li>
												
											<?php } ?>
											
										</ul>
									</div>
								</div>
								<div class="widget">
									<div class="title-wrapper">
										<h3 class="widget-title"> Calendar</h3>
										<div class="clear"></div>
									</div>
									<div class="wcontainer">
										<ul class="review">
											<?php foreach ($this->events as $event) { ?>
												<li>
													<div class="info">
														<a href="#"><?= $event->title; ?></a><br>
														<i class="icon-calendar"></i> <?= date("F d, Y, H:i a",strtotime($match->match_date)); ?><br>
													</div>
													<div class="clear"></div>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
								<div class="widget">
								<div class="widget">
									<div class="title-wrapper">
										<h3 class="widget-title">Find us on facebook!</h3>
										<div class="clear"></div>
									</div>
									<div class="wcontainer">
										<div class="textwidget">
											<div id="fb-root"></div>
											<script>(function(d, s, id) {
											  var js, fjs = d.getElementsByTagName(s)[0];
											  if (d.getElementById(id)) return;
											  js = d.createElement(s); js.id = id;
											  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3";
											  fjs.parentNode.insertBefore(js, fjs);
											}(document, 'script', 'facebook-jssdk'));</script>

											<div class="fb-page" data-href="https://www.facebook.com/CraKza" data-width="330" data-height="290" data-hide-cover="true" data-show-facepile="true" data-show-posts="false"></div>
										
											<!--<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fthemeforest&width=330&height=290&colorscheme=light&show_faces=true&header=true&stream=false&show_border=true&appId=178829182171244" style="border:none; overflow:hidden; width:100%; height:290px;" allowtransparency="true" frameborder="0" scrolling="no"></iframe>-->
										</div>
									</div>
								</div>
							</div>
							<!-- Sidebar -->
						</div>
					</div>
				</div>
			</div>
		</div>
