<?php

class TeamController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
	
    public function index()
    {
		$this->View->render('team/index', array(
            'teams' => TeamModel::getAllTeamsWithMembers()
			)
        );
    }
}
