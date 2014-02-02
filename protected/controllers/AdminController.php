<?php

class AdminController extends CommonCompetitionController
{
	public function actions()
	{
		return array();
	}

	public function filters() {
		$filters = parent::filters();
		// @TODO Rechte
		return $filters;
	}

	public function actionGroupEdit() {
		$errors = array();
		$oks    = array();

		if (AntiXSS::isTokenSet("save")) {

		}


		$this->render('groupEdit', array(
			"errors"           => $errors,
			"oks"              => $oks
		));

	}

	public function actionUsers()
	{
		$users = User::model()->findAll();
		$this->render('users', array(
			'users' => $users,
		));
	}

	public function actionUserEdit($user_id)
	{
		$errors = array();
		$oks    = array();

		$user             = User::model()->findByPk($user_id);
		$all_competitions = Competition::model()->findAll();

		if (AntiXSS::isTokenSet("save")) {

		}


		$this->render('userEdit', array(
			"errors"           => $errors,
			"oks"              => $oks,
			"user"             => $user,
			"all_competitions" => $all_competitions,
		));
	}

	public function actionUserNew()
	{
		$errors = array();
		$oks    = array();

		if (AntiXSS::isTokenSet("create")) {
			if ($_REQUEST["person_existierend"] != "") {
			} elseif ($_REQUEST["username"] != "") {
				if ($_REQUEST["password-1"] != $_REQUEST["password-2"]) $errors[] = "Zwei verschiedene Passwörter wurden angegeben.";
				else {
					$user           = new User();
					$user->username = $_REQUEST["username"];
					$user->password = password_hash($_REQUEST["password-1"], PASSWORD_DEFAULT);
					$user->sysadmin = 0;
					$user->save();
					$oks[] = "Der Nutzer wurde angelegt";
				}
			}
		}

		$this->render('userNew', array(
			"errors" => $errors,
			"oks"    => $oks
		));
	}

	public function actionIndex()
	{
		$this->render('index');
	}


} 