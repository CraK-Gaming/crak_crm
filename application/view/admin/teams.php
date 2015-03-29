<div class="container">
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

		Teams
		
		<?php if ($this->teams) { ?>
            <table border='1' width='100%'>
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Game</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->teams as $team) { ?>
                        <tr>
							<td><a href="<?= Config::get('URL') . 'Admin/EditTeam/' . $team->team_id; ?>"><?= $team->team_name; ?></a></td>
							<td><?= $team->game_name; ?></td>
                            <td> 
								<a href="<?= Config::get('URL') . 'Admin/DeleteTeam/' . $team->team_id; ?>">Delete</a>
							</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div>No Teams Yet</div>
            <?php } ?>
    </div>
</div>
