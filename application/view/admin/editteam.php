<div class="container">
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

		<h1>Edit Team</h1>
		
        <?php if ($this->team) { ?>
            <form method="post" action="<?php echo Config::get('URL'); ?>admin/editTeamSave">
			
                <input type="hidden" name="team_id" value="<?php echo htmlentities($this->team->team_id); ?>" />
                
				Name: <input type="text" name="team_name" value="<?php echo htmlentities($this->team->team_name); ?>" /><br /><br />
				Game: 
				<select name="game_id">
					 <?php foreach($this->games as $game) { ?>
						<option 
							value="<?= $game->game_id; ?>"
							<?php
								if ($this->team->game_id == $game->game_id)
								{
									echo " selected='selected'";
								}
							?>
						>
							<?= $game->name; ?>
						</option>
					 <?php } ?>
				</select>
				
				
                <input type="submit" value='Change' />
            </form>
        <?php } else { ?>
            <p>This team does not exist.</p>
        <?php } ?>
    </div>
</div>
