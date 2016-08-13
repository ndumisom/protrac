<?php
App::uses('AppController', 'Controller');
App::uses('Sanitize', 'Utility');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$id=$this->Auth->user('id');
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

		
     public function listUsers() {

		$conditions = array();
		//Transform POST into GET
		if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
			$filter_url['controller'] = $this->request->params['controller'];
			$filter_url['action'] = $this->request->params['action'];
			// We need to overwrite the page every time we change the parameters
			$filter_url['page'] = 1;

			// for each filter we will add a GET parameter for the generated url
			foreach($this->data['Filter'] as $name => $value){
				if($value){
					// You might want to sanitize the $value here
					// or even do a urlencode to be sure
					$filter_url[$name] = urlencode($value);
				}
			}	
			// now that we have generated an url with GET parameters, 
			// we'll redirect to that page
			return $this->redirect($filter_url);
		} else {
			// Inspect all the named parameters to apply the filters
			foreach($this->params['named'] as $param_name => $value){
				// Don't apply the default named parameters used for pagination
				if(!in_array($param_name, array('page','sort','direction','limit'))){
					// You may use a switch here to make special filters
					// like "between dates", "greater than", etc
					if($param_name == "search"){
						$conditions['OR'] = array(
							array('User.username LIKE' => '%' . $value . '%'),
    						array('User.email LIKE' => '%' . $value . '%')
						);
					} else {
						$conditions['User.'.$param_name] = $value;
					}					
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		$this->User->recursive = 0;
		$this->paginate = array(
			'limit' => 8,
			'conditions' => $conditions
		);
		$this->set('users', $this->paginate());

		// get the possible values for the filters and 
		// pass them to the view
		$genres = $this->User->find('list');
		$directors = $this->User->find('list');
		$this->set(compact('users', 'usersjd'));

		// Pass the search parameter to highlight the text
		$this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");
}

	function search() {
		$conditions = array();
		//Transform POST into GET
		if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
			$filter_url['controller'] = $this->request->params['controller'];
			$filter_url['action'] = $this->request->params['action'];
			// We need to overwrite the page every time we change the parameters
			$filter_url['page'] = 1;

			// for each filter we will add a GET parameter for the generated url
			foreach($this->data['Filter'] as $name => $value){
				if($value){
					// You might want to sanitize the $value here
					// or even do a urlencode to be sure
					$filter_url[$name] = urlencode($value);
				}
			}	
			// now that we have generated an url with GET parameters, 
			// we'll redirect to that page
			return $this->redirect($filter_url);
		} else {
			// Inspect all the named parameters to apply the filters
			foreach($this->params['named'] as $param_name => $value){
				// Don't apply the default named parameters used for pagination
				if(!in_array($param_name, array('page','sort','direction','limit'))){
					// You may use a switch here to make special filters
					// like "between dates", "greater than", etc
					if($param_name == "search"){
						$conditions['OR'] = array(
							array('User.username LIKE' => '%' . $value . '%'),
    						array('User.email LIKE' => '%' . $value . '%')
						);
					} else {
						$conditions['User.'.$param_name] = $value;
					}					
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
		$this->User->recursive = 0;
		$this->paginate = array(
			'limit' => 8,
			'conditions' => $conditions
		);
		$this->set('users', $this->paginate());

		// get the possible values for the filters and 
		// pass them to the view
		$genres = $this->User->find('list');
		$directors = $this->User->find('list');
		$this->set(compact('users', 'usersjd'));

		// Pass the search parameter to highlight the text
		$this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Registered succesful.'));

				if ($this->Auth->login()) {
            	$id=$this->Auth->user('id');
                return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'view/'.$id)));
            }
			} else {
				$this->Session->setFlash(__('Didn\'t registered succesful. Please, try again.', null), 
                            'default', 
                             array('class' => 'error-message'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Edited succesful.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', null), 
                            'default', 
                             array('class' => 'error-message'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		    $this->set('user', $this->User->find('first', $options));
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.', null), 
                            'default', 
                             array('class' => 'error-message'));
		}
		return $this->redirect($this->Auth->logout($this->Auth->redirect(array('controller' => 'Posts', 'action' => 'visitors'))));
	}

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
            	$id=$this->Auth->user('id');
                return $this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'view/'.$id)));
            }
            else{
            $this->Session->setFlash(__('Invalid username or password, try again.', null), 
                            'default', 
                             array('class' => 'error-message'));
           }
        }
    }

    public function logout() {
        //return $this->redirect($this->Auth->logout());
        return $this->redirect($this->Auth->logout($this->Auth->redirect(array('controller' => 'Posts', 'action' => 'visitors'))));
    }
}
