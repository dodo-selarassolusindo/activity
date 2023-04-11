<?php  namespace App\Controllers\Admin;


use App\Models\Admin\T30ActivityModel;

use App\Models\Admin\T03StatusModel;
use App\Entities\Admin\T31Activityd;

class T31Activityds extends \App\Controllers\GoBaseController { 

	use \CodeIgniter\API\ResponseTrait;

    protected static $primaryModelName = 'App\Models\Admin\T31ActivitydModel';

    protected static $singularObjectNameCc = 'detailActivity';
    protected static $singularObjectName = 'Detail Activity';
    protected static $pluralObjectName = 'Detail Activity';
    protected static $controllerSlug = 't31-activityds';

    protected static $viewPath = 'admin/t31ActivitydViews/';

    protected $indexRoute = 'detailActivityList';

    

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger) {
        $this->viewData['pageTitle'] = lang('T31Activityds.moduleTitle');
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
        
		 $this->viewData['detailActivityList'] = $this->model->findAllWithAllRelations('*');

		$this->viewData['pageSubTitle'] = lang('Basic.global.ManageAllRecords', [lang('T31Activityds.detailActivity')]);
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
					$this->viewData['errorMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('T31Activityds.detailActivity'))]);
						$this->session->setFlashdata('formErrors', $this->model->errors());
				endif;
            
            $thenRedirect = true;  // Change this to false if you want your user to stay on the form after submission
            
            if ($noException && $successfulResult) :

                $id = $this->model->db->insertID();

                $message = lang('Basic.global.saveSuccess', [mb_strtolower(lang('T31Activityds.detailActivity'))]).'.';
                $message .= anchor(route_to('editDetailActivity', $id), lang('Basic.global.continueEditing').'?');
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

        $this->viewData['t31Activityd'] = isset($sanitizedData) ? new T31Activityd($sanitizedData) : new T31Activityd();
		$this->viewData['activityList'] = $this->getActivityListItems();
		$this->viewData['statusList'] = $this->getStatusListItems();

        $this->viewData['formAction'] = route_to('createDetailActivity');

        $this->viewData['boxTitle'] = lang('Basic.global.addNew').' '.lang('T31Activityds.detailActivity').' '.lang('Basic.global.addNewSuffix');
        

        return $this->displayForm(__METHOD__);
    } // end function add()

    public function edit($requestedId = null) {
        
        if ($requestedId == null) :
            return $this->redirect2listView();
        endif;
        $id = filter_var($requestedId, FILTER_SANITIZE_URL);
        $t31Activityd = $this->model->find($id);

        if ($t31Activityd == false) :
            $message = lang('Basic.global.notFoundWithIdErr', [mb_strtolower(lang('T31Activityds.detailActivity')), $id]);
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
            	    $this->viewData['warningMessage'] = lang('Basic.global.formErr1', [mb_strtolower(lang('T31Activityds.detailActivity'))]);
            	    $this->session->setFlashdata('formErrors', $this->model->errors());
            	
            	endif;
            	
            	$t31Activityd->fill($sanitizedData);

            	$thenRedirect = true;
            
            if ($noException && $successfulResult) :
                $id = $t31Activityd->id ?? $id;
                $message = lang('Basic.global.updateSuccess', [mb_strtolower(lang('T31Activityds.detailActivity'))]).'.';
                $message .= anchor(route_to('editDetailActivity', $id), lang('Basic.global.continueEditing').'?');
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

        $this->viewData['t31Activityd'] = $t31Activityd;
		$this->viewData['activityList'] = $this->getActivityListItems();
		$this->viewData['statusList'] = $this->getStatusListItems();

        $this->viewData['formAction'] = route_to('updateDetailActivity', $id);

        $this->viewData['boxTitle'] = lang('Basic.global.edit2').' '.lang('T31Activityds.detailActivity').' '.lang('Basic.global.edit3');
        
        
        return $this->displayForm(__METHOD__, $id);
    } // end function edit(...)
    
    

    public function allItemsSelect() {
        if ($this->request->isAJAX()) {
            $onlyActiveOnes = true;
            $reqVal = $this->request->getPost('val') ?? 'id';
            $menu = $this->model->getAllForMenu($reqVal.', status', 'status', $onlyActiveOnes, false);
            $nonItem = new \stdClass;
            $nonItem->id = '';
            $nonItem->status = '- '.lang('Basic.global.None').' -';
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
            $columns2select = [$reqId ?? 'id', $reqText ?? 'status'];
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
        

	protected function getStatusListItems() { 
	$t03StatusModel = model('App\Models\Admin\T03StatusModel');
			$onlyActiveOnes = true;
			$data = $t03StatusModel->getAllForMenu('id, nama','nama', $onlyActiveOnes );

		return $data;
	}


	protected function getActivityListItems() { 
	$t30ActivityModel = model('App\Models\Admin\T30ActivityModel');
			$onlyActiveOnes = true;
			$data = $t30ActivityModel->getAllForMenu('id, deskripsi','deskripsi', $onlyActiveOnes );

		return $data;
	}

}
