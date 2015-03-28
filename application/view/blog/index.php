<div class="container">
    <h1>BlogController/index</h1>
    <div class="box">

        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

        <div>
		
			<!--<?= $this->test ?>-->
		
			<?php foreach ($this->blog_posts as $blog_post) { ?>
				
					<h3><?= $blog_post->title; ?></h3>
					
					<?= date("F d, Y",strtotime($blog_post->created_on)); ?>
					<br /><br />
					
					<div>
						<?= $blog_post->description; ?>
					</div>
			
				<div style="background-color:red; height:10px;">
					
				</div>
			<?php } ?>
		
            
        </div>
    </div>
</div>
