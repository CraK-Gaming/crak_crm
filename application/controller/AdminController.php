<?php

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->View->render('admin/index');
    }
	
	// Games
	
	public function games()
	{
		 $this->View->render('admin/games', array(
			'games' => GameModel::getGames()
		));
	}
	
	public function editGame($game_id)
    {
		$this->View->render('admin/editgame', array(
            'game' => GameModel::getGame($game_id)
        ));
    }
	
	public function addGame()
	{
		$this->View->render('admin/addgame');
	}
	
	public function addGameSave()
    {
        GameModel::addGame(
			Request::post('game_name')
		);
        Redirect::to('admin/games');
    }
	
	public function editGameSave()
    {
        GameModel::updateGame(
			Request::post('game_id'), 
			Request::post('game_name')
		);
        Redirect::to('admin/games');
    }
	
	public function deleteGame($game_id)
	{
		GameModel::deleteGame($game_id);
		Redirect::to('admin/games');
	}
	
	// Teams
	
	public function teams()
    {
        $this->View->render('admin/teams', array(
			'teams' => TeamModel::getAllTeams()
		));
    }
	
	public function editTeam($team_id)
    {
		$this->View->render('admin/editteam', array(
            'team' => TeamModel::getTeam($team_id),
			'games' => GameModel::getGames()
        ));
    }
	
	public function deleteTeam($team_id)
	{
		TeamModel::deleteTeam($team_id);
		Redirect::to('admin/teams');
	}
	
	public function editTeamSave()
    {
        TeamModel::updateTeam(
			Request::post('team_id'), 
			Request::post('team_name'),
			Request::post('game_id')
		);
        Redirect::to('admin/teams');
    }
	
	// Matches
	
	public function matches()
    {
        $this->View->render('admin/matches', array(
			'matches' => MatchModel::getAllMatches()
		));
    }
	
	public function editMatch($match_id)
    {
		$this->View->render('admin/editmatch', array(
            'match' => MatchModel::getMatch($match_id),
			'teams' => TeamModel::getAllTeams(),
			'opponents' => OpponentModel::getAllOpponents(),
			'tournaments' => TournamentModel::getAllTournaments(),
			'matchStatuses' => MatchStatusModel::getAllMatchStatuses()
        ));
    }
	
	public function editMatchSave()
    {
        MatchModel::updateMatch(
			Request::post('match_id'), 
			Request::post('team_id'), 
			Request::post('opponent_id'), 
			Request::post('match_date'), 
			Request::post('tournament_id'), 
			Request::post('score'), 
			Request::post('match_status_id'), 
			Request::post('description')
		);
        Redirect::to('admin/matches');
	
    }
	
	// Events
	
	// Blog
	
	
}
