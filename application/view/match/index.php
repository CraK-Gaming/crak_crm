<div class="container">
    <h1>MatchesController/index</h1>
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

        <div>
		
			<?php foreach ($this->matches as $match) { ?>
				
					<h3><?= $match->match_id; ?></h3>
			<?php } ?>

        </div>
    </div>
</div>
