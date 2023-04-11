<?php

namespace App\Controllers;

class Home extends BaseController {

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
		$this->viewData['currentModule'] = 'Dashboard';
		parent::initController($request, $response, $logger);
		$this->viewData['currentLocale'] = $this->request->getLocale();
		helper(['text', 'auth']);
	}

	/**
	* Index Page for this controller.
	*
	* @return string
	*/
	public function index() {

		$this->viewData['pageTitle'] = 'Activity App';
		$this->viewData['pageSubTitle'] = lang('Basic.global.Dashboard');

		$t00JeniModel = model('App\Models\Admin\T00JeniModel');

		$t01ProjectModel = model('App\Models\Admin\T01ProjectModel');

		$t02UserModel = model('App\Models\Admin\T02UserModel');

		$t03StatusModel = model('App\Models\Admin\T03StatusModel');

		$t30ActivityModel = model('App\Models\Admin\T30ActivityModel');

		$t31ActivitydModel = model('App\Models\Admin\T31ActivitydModel');

		$this->viewData['totalNrOfJenis'] = $t00JeniModel->getCount();

		// $this->viewData['jenisList'] = $t00JeniModel->findAll(5);

		$this->viewData['totalNrOfProject'] = $t01ProjectModel->getCount();

		// $this->viewData['projectList'] = $t01ProjectModel->findAll(5);

		$this->viewData['totalNrOfUser'] = $t02UserModel->getCount();

		// $this->viewData['userList'] = $t02UserModel->findAll(5);

		$this->viewData['totalNrOfStatus'] = $t03StatusModel->getCount();

		// $this->viewData['statusList'] = $t03StatusModel->findAll(5);

		$this->viewData['totalNrOfActivity'] = $t30ActivityModel->getCount();

		// $this->viewData['activityList'] = $t30ActivityModel->findAll(5);

		$this->viewData['totalNrOfDetailActivity'] = $t31ActivitydModel->getCount();

		// $this->viewData['detailActivityList'] = $t31ActivitydModel->findAll(5);

		return view('dashboardHome', $this->viewData);
	}
}