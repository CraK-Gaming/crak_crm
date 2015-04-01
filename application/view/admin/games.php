<div class="container">
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

		Games
		
		<a href='../AddGame/'>Add New Game</a>
		
		<?php if ($this->games) { ?>
            <table border='1' width='100%'>
                <thead>
                <tr>
                    <td>Name</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($this->games as $game) { ?>
                        <tr>
							<td><a href="<?= Config::get('URL') . 'Admin/EditGame/' . $game->game_id; ?>"><?= $game->name; ?></a></td>
                            <td> 
								<a href="<?= Config::get('URL') . 'Admin/DeleteGame/' . $game->game_id; ?>">Delete</a>
							</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                <div>No Games Yet</div>
            <?php } ?>
    </div>
</div>
