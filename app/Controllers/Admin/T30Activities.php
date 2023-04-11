<?php  namespace App\Controllers\Admin;


use App\Models\Admin\T01ProjectModel;

use App\Models\Admin\T00JeniModel;

use App\Models\Admin\T02UserModel;
use App\Entities\Admin\T30Activity;

class T30Activities extends \App\Controllers\GoBaseController { 

	use \CodeIgniter\API\ResponseTrait;

    protected static $primaryModelName = 'App\Models\Admin\T30ActivityModel';

    protected static $singularObjectNameCc = 'activity';
    protected static $singularObjectName = 'Activity';
    protected static $pluralObjectName = 'Activity';
    protected static $controllerSlug = 't30-activities';

    protected static $viewPath = 'admin/t30ActivityViews/';

    protected $indexRoute = 'activityList';

    

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        $this->viewData['pageTitle'] = lang('T30Activities.moduleTitle');
        parent::initController($request, $response, $logger);
                 $this->viewData['usingSweetAlert'] = true;

         if (session('errorMessage')) {
            $this->session->setFlashData('sweet-error', session('errorMessage'));
         }
         if (session('successMessage')) {
            $this->session->setFlashData('sweet-success', session('successMessage'));
         }
    }

    public function index() {
        
        $this->viewData['usingClientSideDataTable'] = true;
        
		 $this->viewData['activityList'] = $this->model->findAllWithAllRelations('*');

		$this->viewData['pageSubTitle'] = lang('Basic.global.ManageAllRecords', [lang('T30Activities.activity')]);
        parent::index();

    }

    public function add() {
        
        

        $requestMethod = $this->request->getMethod();

        if ($requestMethod === 'post') :

            $nullIfEmpty = true; // !(phpversion() >= '8.1');

            $postData = $this->request->getPost();
			$sanitizedData = $this->sanitized($postData, $nullIfEmpty);


            $noException = true;
            $successfulResult = false; // for now
            

				if ($this->canValidate()) :
					try {
						$successfulResult = $this->model->skipValidation(true)->save($sanitizedData);
					} catch (\Exception $e) {
						$noException = false;
						$this->dealWithException($e);
					}
				else:
					$this->viewData['errorMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('T30Activities.activity'))]);
						$this->session->setFlashdata('formErrors', $this->model->errors());
				endif;
            
            $thenRedirect = true;  // Change this to false if you want your user to stay on the form after submission
            
            if ($noException && $successfulResult) :

                $id = $this->model->db->insertID();

                $message = lang('Basic.global.saveSuccess', [mb_strtolower(lang('T30Activities.activity'))]).'.';
                $message .= anchor(route_to('editActivity', $id), lang('Basic.global.continueEditing').'?');
                $message = ucfirst(str_replace("'", "\'", $message));

                if ($thenRedirect) :
                    if (!empty($this->indexRoute)) :
                        return redirect()->to(route_to($this->indexRoute))->with('sweet-success', $message);
                    else:
                        return $this->redirect2listView('sweet-success', $message);
                    endif;
                else:
                    $this->session->setFlashData('sweet-success', $message);
                endif;

            endif; // $noException && $successfulResult

        endif; // ($requestMethod === 'post')

        $this->viewData['t30Activity'] = isset($sanitizedData) ? new T30Activity($sanitizedData) : new T30Activity();
		$this->viewData['jenisList'] = $this->getJenisListItems();
		$this->viewData['projectList'] = $this->getProjectListItems();
		$this->viewData['userList'] = $this->getUserListItems();

        $this->viewData['formAction'] = route_to('createActivity');

        $this->viewData['boxTitle'] = lang('Basic.global.addNew').' '.lang('T30Activities.activity').' '.lang('Basic.global.addNewSuffix');
        

        return $this->displayForm(__METHOD__);
    } // end function add()

    public function edit($requestedId = null) {
        
        if ($requestedId == null) :
            return $this->redirect2listView();
        endif;
        $id = filter_var($requestedId, FILTER_SANITIZE_URL);
        $t30Activity = $this->model->find($id);

        if ($t30Activity == false) :
            $message = lang('Basic.global.notFoundWithIdErr', [mb_strtolower(lang('T30Activities.activity')), $id]);
            return $this->redirect2listView('sweet-error', $message);
        endif;

        $requestMethod = $this->request->getMethod();

        if ($requestMethod === 'post') :

            $nullIfEmpty = true; // !(phpversion() >= '8.1');
        
            $postData = $this->request->getPost();
            			$sanitizedData = $this->sanitized($postData, $nullIfEmpty);


            
            $noException = true;
            $successfulResult = false; // for now
            
            

            	if ($this->canValidate()) :
            	    try {
            	        $successfulResult = $this->model->skipValidation(true)->update($id, $sanitizedData);
            	    } catch (\Exception $e) {
            	        $noException = false;
            	        $this->dealWithException($e);
            	    }
            	else:
            	    $this->viewData['warningMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('T30Activities.activity'))]);
            	    $this->session->setFlashdata('formErrors', $this->model->errors());
            	
            	endif;
            	
            	$t30Activity->fill($sanitizedData);

            	$thenRedirect = true;
            
            if ($noException && $successfulResult) :
                $id = $t30Activity->id ?? $id;
                $message = lang('Basic.global.updateSuccess', [mb_strtolower(lang('T30Activities.activity'))]).'.';
                $message .= anchor(route_to('editActivity', $id), lang('Basic.global.continueEditing').'?');
                $message = ucfirst(str_replace("'", "\'", $message));

                if ($thenRedirect) :
                    if (!empty($this->indexRoute)) :
                        return redirect()->to(route_to($this->indexRoute))->with('sweet-success', $message);
                    else:
                        return $this->redirect2listView('sweet-success', $message);
                    endif;
                else:
                    $this->session->setFlashData('sweet-success', $message);
                endif;
        
            endif; // $noException && $successfulResult
        endif; // ($requestMethod === 'post')

        $this->viewData['t30Activity'] = $t30Activity;
		$this->viewData['jenisList'] = $this->getJenisListItems();
		$this->viewData['projectList'] = $this->getProjectListItems();
		$this->viewData['userList'] = $this->getUserListItems();

        $this->viewData['formAction'] = route_to('updateActivity', $id);

        $this->viewData['boxTitle'] = lang('Basic.global.edit2').' '.lang('T30Activities.activity').' '.lang('Basic.global.edit3');
        
        
        return $this->displayForm(__METHOD__, $id);
    } // end function edit(...)
    
    

    public function allItemsSelect() {
        if ($this->request->isAJAX()) {
            $onlyActiveOnes = true;
            $reqVal = $this->request->getPost('val') ?? 'id';
            $menu = $this->model->getAllForMenu($reqVal.', deskripsi', 'deskripsi', $onlyActiveOnes, false);
            $nonItem = new \stdClass;
            $nonItem->id = '';
            $nonItem->deskripsi = '- '.lang('Basic.global.None').' -';
            array_unshift($menu , $nonItem);

            $newTokenHash = csrf_hash();
            $csrfTokenName = csrf_token();
            $data = [
                'menu' => $menu,
                $csrfTokenName => $newTokenHash
            ];
            return $this->respond($data);
        } else {
            return $this->failUnauthorized('Invalid request', 403);
        }
    }
    
    public function menuItems() {
        if ($this->request->isAJAX()) {
            $searchStr = goSanitize($this->request->getPost('searchTerm'))[0];
            $reqId = goSanitize($this->request->getPost('id'))[0];
            $reqText = goSanitize($this->request->getPost('text'))[0];
            $onlyActiveOnes = false;
            $columns2select = [$reqId ?? 'id', $reqText ?? 'deskripsi'];
            $onlyActiveOnes = false;
            $menu = $this->model->getSelect2MenuItems($columns2select, $columns2select[1], $onlyActiveOnes, $searchStr);
            $nonItem = new \stdClass;
            $nonItem->id = '';
            $nonItem->text = '- '.lang('Basic.global.None').' -';
            array_unshift($menu , $nonItem);

            $newTokenHash = csrf_hash();
            $csrfTokenName = csrf_token();
            $data = [
                'menu' => $menu,
                $csrfTokenName => $newTokenHash
            ];
            return $this->respond($data);
        } else {
            return $this->failUnauthorized('Invalid request', 403);
        }
    }
        

	protected function getUserListItems() { 
	$t02UserModel = model('App\Models\Admin\T02UserModel');
			$onlyActiveOnes = true;
			$data = $t02UserModel->getAllForMenu('id, nama','nama', $onlyActiveOnes );

		return $data;
	}


	protected function getProjectListItems() { 
	$t01ProjectModel = model('App\Models\Admin\T01ProjectModel');
			$onlyActiveOnes = true;
			$data = $t01ProjectModel->getAllForMenu('id, nama','nama', $onlyActiveOnes );

		return $data;
	}


	protected function getJenisListItems() { 
	$t00JeniModel = model('App\Models\Admin\T00JeniModel');
			$onlyActiveOnes = true;
			$data = $t00JeniModel->getAllForMenu('id, nama','nama', $onlyActiveOnes );

		return $data;
	}

}
