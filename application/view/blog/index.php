<div class="container normal-page sliderhome">
			<div class="row">
				<div class="span12">
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
													<li>
														<a href="#game-2" title="Battlefield 4">BF4</a>
														<div class="clear"></div>
													</li>
													<li>
														<a href="#game-1" title="Counter Strike: Global Offensive">CS:GO</a>
														<div class="clear"></div>
													</li>
													<li>
														<a href="#game-3" title="Dota 2">Dota 2</a>
														<div class="clear"></div>
													</li>
													<li>
														<a href="#game-4" title="League of Legends">LoL</a>
														<div class="clear"></div>
													</li>
												</ul>
												<div class="clear"></div>
											</li>
											<li class="clanwar-item game-1 game-2  game-4"> <!-- Hierdie verwys na die href bo -->
												<a href="#" title="Pro league semifinal">
													<div class="wrap">
														<div class="upcoming">TEST</div>
														<div class="match-wrap">
															<img src="./img/defaults/25x25.jpg" class="clan1img">
															<!--<div class="home-team"></div>-->
															<span class="vs">vs.</span>
															<div class="opponent-team">
																Aliance
															</div>
															<div class="clear"></div>
														</div>
														<div class="date">CS:GO - March 1, 2015, 9:12 pm</div>
														<div class="clear"></div>
													</div>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="widget">
									<div class="title-wrapper">
										<h3 class="widget-title">Find us on facebook!</h3>
										<div class="clear"></div>
									</div>
									<div class="wcontainer">
										<div class="textwidget">
											<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fthemeforest&width=330&height=290&colorscheme=light&show_faces=true&header=true&stream=false&show_border=true&appId=178829182171244" style="border:none; overflow:hidden; width:100%; height:290px;" allowtransparency="true" frameborder="0" scrolling="no"></iframe>
										</div>
									</div>
								</div>
								<div class="widget">
									<div class="title-wrapper">
										<h3 class="widget-title"> Calendar</h3>
										<div class="clear"></div>
									</div>
									<div class="wcontainer">
										<ul class="review">
											<li>
												<div class="info">
													<a href="#">Eget ultrices mauris rhoncus non</a><br>
													<i class="icon-calendar"></i> May 4, 2013<br>
												</div>
												<div class="clear"></div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- Sidebar -->
						</div>
					</div>
				</div>
			</div>
		</div>

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <div>
		
			<!--<?= $this->test ?>-->
		
			<?php foreach ($this->blog_posts as $blog_post) { ?>
				
					<h3><?= $blog_post->title; ?></h3>
					
					<?= date("d M",strtotime($blog_post->created_on)); ?>
					<br /><br />
					
					<div>
						<?= $blog_post->description; ?>
					</div>
					
					Author: <a href=''><?= $blog_post->user_name ?></a>
			
				<div style="background-color:red; height:10px;">
					
				</div>
			<?php } ?>
		
            
        </div>
    </div>
</div>
</div>