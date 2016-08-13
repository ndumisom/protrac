<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'posts',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'posts',
                'action' => 'visitors'
            )
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('index', 'view', 'visitors');
    }

    public function isAuthorized($user) {

        if ($this->action === 'add') {
            return true;
        }


        if (in_array($this->action, array('edit', 'delete'))) {
            $postId = (int) $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

}
