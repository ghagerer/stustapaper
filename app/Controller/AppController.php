<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
		'DebugKit.Toolbar',
		'Session',
		'Auth' => array('authorize' => array('Controller')),
	);
	
	public function beforeFilter() {
		//$this->Auth->allow('index', 'view');
		$this->set('authUser', $this->Auth->user());
		$this->Auth->loginRedirect = array('controller' => 'bookmarks', 'action' => 'index', 'admin'=>(($this->Auth->user('role')==='admin')?1:0));
		//die(print_r($this->Auth->loginRedirect));
	}
	
	public function beforeRender() {
		if($this->request->is('ajax')) {
			Configure::write('debug', 0);
			if ($this->RequestHandler->prefers() == 'json') {
				die(json_encode($this->viewVars));
			} else {
				$this->layout = 'ajax';
			}
		} 
	}
	
	public function isAuthorized($user) {
		
		if (!isset($user['role'])) {
			return false;
		}
		
		$role = $user['role'];
		$controller = $this->request->params['controller'];
		$action = $this->request->params['action'];
		
		switch ($user['role']) {
			
			case 'admin':
				return true;
			
			case 'user': switch ($controller) {
				case 'bookmarks':					return in_array($action,array('add','index','edit','delete','view','archive','like','added','find','share'));
				case 'folders':						return in_array($action,array('add','index','edit','delete','view'));
				case 'offline_websites':	return in_array($action,array('view'));
				case 'users':	return in_array($action,array('login','logout'));
			}
			//die('<pre>'.print_r($this,true).'</pre>');
		}
		

		return false;
	}
	
}
