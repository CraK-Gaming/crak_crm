<div class="container">
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

        <div>
		
			<?php 
			$lastTeamId = 0;
			
			foreach ($this->teams as $team) 
			{ 
				if ($lastTeamId != $team->team_id)
				{
					?>
						<h1>Team <?= $team->team_name; ?> (<?= $team->game_name; ?>)</h1>
					<?php
				}
				
				$lastTeamId = $team->team_id;
			?>
				
				Name: <?= $team->user_name; ?><br />
				Status: <?= $team->team_member_status_name; ?><br />
				
				<br /><br />
			<?php 
			} 
			?>

        </div>
    </div>
</div>
