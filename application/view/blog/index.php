<div class="page normal-page container">
	

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