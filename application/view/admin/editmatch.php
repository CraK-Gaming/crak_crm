<div class="container">
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

		<h1>Edit Match</h1>
		
        <?php if ($this->match) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>admin/editMatchSave">
			
                <input type="hidden" name="match_id" value="<?php echo htmlentities($this->match->match_id); ?>" />
				
				Team: 
				<select name="team_id">
					 <?php foreach($this->teams as $team) { ?>
						<option 
							value="<?= $team->team_id; ?>"
							<?php
								if ($this->match->team_id == $team->team_id)
								{
									echo " selected='selected'";
								}
							?>
						>
							<?= $team->team_name; ?>
						</option>
					 <?php } ?>
				</select>
				<br /><br />
				
				Opponent:
				<select name="opponent_id">
					 <?php foreach($this->opponents as $opponent) { ?>
						<option 
							value="<?= $opponent->opponent_id; ?>"
							<?php
								if ($this->match->opponent_id == $opponent->opponent_id)
								{
									echo " selected='selected'";
								}
							?>
						>
							<?= $opponent->name; ?>
						</option>
					 <?php } ?>
				</select>
				<br /><br />
				
				Date: <input type="text" name="match_date" value="<?php echo htmlentities($this->match->match_date); ?>" /><br /><br />
				
				Tournament: <select name="tournament_id">
					 <?php foreach($this->tournaments as $tournament) { ?>
						<option 
							value="<?= $tournament->tournament_id; ?>"
							<?php
								if ($this->match->tournament_id == $tournament->tournament_id)
								{
									echo " selected='selected'";
								}
							?>
						>
							<?= $tournament->name; ?>
						</option>
					 <?php } ?>
				</select>
				<br /><br />
				
				Score: <input type="text" name="score" value="<?php echo htmlentities($this->match->score); ?>" /><br /><br />
				
				Status: <select name="match_status_id">
					 <?php foreach($this->matchStatuses as $matchStatus) { ?>
						<option 
							value="<?= $matchStatus->match_status_id; ?>"
							<?php
								if ($this->match->match_status_id == $matchStatus->match_status_id)
								{
									echo " selected='selected'";
								}
							?>
						>
							<?= $matchStatus->status; ?>
						</option>
					 <?php } ?>
				</select>
				<br /><br />
				
				Description: <textarea name="description"><?php echo htmlentities($this->match->match_description); ?></textarea><br /><br />
				
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This match does not exist.</p>
        <?php } ?>
    </div>
</div>
