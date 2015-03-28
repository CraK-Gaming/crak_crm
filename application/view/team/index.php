<div class="container">
    <h1>MatchesController/index</h1>
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

        <div>
		
			<?php foreach ($this->teams as $team) { ?>
				
					<h3><?= $team->team_id; ?></h3>
			<?php } ?>

        </div>
    </div>
</div>
