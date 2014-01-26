<?php

class AdminController extends Controller {
	public function actions()
	{
		return array(
		);
	}

	public function actionAdjucators()
	{
		$errors = array();
		$oks = array();

		if (AntiXSS::isTokenSet("create")) {
			if ($_REQUEST["person_existierend"] != "") {
			} elseif ($_REQUEST["username"] != "") {
				if ($_REQUEST["password-1"] != $_REQUEST["password-2"]) $errors[] = "Zwei verschiedene Passwörter wurden angegeben.";
				else {
					$user = new User();
					$user->username = $_REQUEST["username"];
					$user->password = password_hash($_REQUEST["password-1"], PASSWORD_DEFAULT);
					$user->sysadmin = 0;
					$user->save();
					$oks[] = "Der Nutzer wurde angelegt";
				}
			}
		}

		$this->render('adjucators', array(
			"errors" => $errors,
			"oks" => $oks
		));
	}

	public function actionIndex()
	{
		$this->render('index');
	}


} 