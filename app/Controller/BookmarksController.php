<?php
App::uses('AppController', 'Controller');

/**
 * Bookmarks Controller
 *
 * @property Bookmark $Bookmark
 */
class BookmarksController extends AppController {
	
	public $components = array('Website','Search.Prg');
	public $presetVars = true;
	
	public function beforeFilter() {
		parent::beforeFilter();
	}

/**
 * index method
 *
 * @return void
 */
	public function index($action = null) {
		
		$options = array(
			'conditions' => array(
				'Bookmark.user_id' => $this->Auth->user('id'),
				),
			'contain' => array('Folder','OfflineWebsite'),
			'limit' => 1000
		);
		
		if (!empty($action)) {
			if ($action == 'liked') {
				$options['conditions']['Bookmark.is_liked'] = 1;
			}
		} else if (isset($this->request->named['folder']) && !empty($this->request->named['folder'])) {
			// show bookmarks within folder
			$folder = $this->request->named['folder'];
			$options['conditions']['Folder.name'] = $folder;
			$options['conditions']['Bookmark.is_read'] = 0;
			
		} else {
			$options['conditions']['Bookmark.is_read'] = 0;
		}
		
		$this->paginate = $options;
    
		$this->Bookmark->recursive = 0;
		
		$folders = $this->Bookmark->Folder->find('list',array(
			'conditions' => array(
				'Folder.user_id' => $this->Auth->user('id')
		)));
		
		$this->set('bookmarks', $this->paginate());
		$this->set('folders', $folders);
	}
	
	public function find() {
		if ($this->request->is('post')) {
			$this->Prg->commonProcess();
		} else if (!empty($this->request->named)) {
			$this->Prg->commonProcess();
			$this->paginate = array('conditions' => $this->Bookmark->parseCriteria($this->passedArgs));
			$folders = $this->Bookmark->Folder->find('list',array(
				'conditions' => array(
					'Folder.user_id' => $this->Auth->user('id')
			)));
			$this->set('bookmarks', $this->paginate());
			$this->set('folders', $folders);
			$this->render('index');
		}
	}
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bookmark->exists($id)) {
			throw new NotFoundException(__('Invalid bookmark'));
		}
		$options = array('conditions' => array('Bookmark.' . $this->Bookmark->primaryKey => $id));
		$this->set('bookmark', $this->Bookmark->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {die(print_r($this->request->data,true));
		
		if ($this->request->is('post')) {
			$this->request->data['Bookmark']['user_id'] = $this->Auth->user('id');
			$website = $this->Website->getWebsite($this->request->data['Bookmark']['url']);
			$this->request->data['OfflineWebsite'] = array(
				'html_content' => $website->getHtmlContent(),
			);
			
			if (empty($this->request->data['Bookmark']['title'])) {
				$this->request->data['Bookmark']['title'] = $website->getTitle();
			}
			
		} else if (isset($_GET['url']) && !empty($_GET['url'])) {
			$get = true;
			$website = $this->Website->getWebsite($_GET['url']);
			$this->request->data['Bookmark'] = array(
				'user_id'	=> $this->Auth->user('id'),
				'title'		=> $website->getTitle(),
				'url'			=> $website->getUrl(),
			);
			$this->request->data['OfflineWebsite'] = array(
				'html_content' => $website->getHtmlContent(),
			);
		}
		
		if(isset($this->request->data) && !empty($this->request->data)) {
			$this->Bookmark->create();
			if ($this->Bookmark->save($this->request->data)) {
				$this->request->data['OfflineWebsite']['bookmark_id'] = $this->Bookmark->id;
				$this->Bookmark->OfflineWebsite->save($this->request->data);
				
				if ($get) {
					$this->layout = 'ajax';
					$this->render('added');
				} else {
					$this->Session->setFlash(__('The bookmark has been saved'));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				$error = __('The bookmark could not be saved. Please, try again.');
				if ($get) {
					$this->layout = 'ajax';
					$this->set('error', $error);
					$this->render('added');
				}
				$this->Session->setFlash($error);
			}
		}
		
		$folders = array_merge(
			array('' => __('--- No Folder ---')),
			$this->Bookmark->Folder->find('list',array(
				'conditions' => array(
					'Folder.user_id' => $this->Auth->user('id')
			)))
		);
		
		$this->set('folders', $folders);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bookmark->exists($id)) {
			throw new NotFoundException(__('Invalid bookmark'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Bookmark->save($this->request->data)) {
				$this->Session->setFlash(__('The bookmark has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bookmark.' . $this->Bookmark->primaryKey => $id));
			$this->request->data = $this->Bookmark->find('first', $options);
		}
		
		$folders = array_merge(
			array('' => __('--- No Folder ---')),
			$this->Bookmark->Folder->find('list',array(
				'conditions' => array(
					'Folder.user_id' => $this->Auth->user('id')
			)))
		);
		
		$this->set(compact('folders'));
	}
	
	public function archive($id = null) {
		$this->Bookmark->id = $id;
		if (!$this->Bookmark->exists()) {
			throw new NotFoundException(__('Invalid bookmark'));
		}
		$this->request->onlyAllow('post', 'archive');
		if ($this->Bookmark->saveField('is_read',1)) {
			$this->Session->setFlash(__('Bookmark archived'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Bookmark was not archived'));
		$this->redirect(array('action' => 'index'));
	}

	public function like($id = null) {
		$this->Bookmark->id = $id;
		if (!$this->Bookmark->exists()) {
			throw new NotFoundException(__('Invalid bookmark'));
		}
		$this->request->onlyAllow('post', 'like');
		if ($this->Bookmark->saveField('is_liked',1)) {
			$this->Session->setFlash(__('Bookmark liked'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Bookmark was not liked'));
		$this->redirect(array('action' => 'index'));
	}
	
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bookmark->id = $id;
		if (!$this->Bookmark->exists()) {
			throw new NotFoundException(__('Invalid bookmark'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bookmark->delete()) {
			$this->Session->setFlash(__('Bookmark deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Bookmark was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Bookmark->recursive = 0;
		$this->set('bookmarks', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Bookmark->exists($id)) {
			throw new NotFoundException(__('Invalid bookmark'));
		}
		$options = array('conditions' => array('Bookmark.' . $this->Bookmark->primaryKey => $id));
		$this->set('bookmark', $this->Bookmark->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Bookmark->create();
			if ($this->Bookmark->save($this->request->data)) {
				$this->Session->setFlash(__('The bookmark has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.'));
			}
		}
		$users = $this->Bookmark->User->find('list');
		$tags = $this->Bookmark->Tag->find('list');
		$this->set(compact('users', 'tags'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Bookmark->exists($id)) {
			throw new NotFoundException(__('Invalid bookmark'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Bookmark->save($this->request->data)) {
				$this->Session->setFlash(__('The bookmark has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bookmark could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bookmark.' . $this->Bookmark->primaryKey => $id));
			$this->request->data = $this->Bookmark->find('first', $options);
		}
		$users = $this->Bookmark->User->find('list');
		$tags = $this->Bookmark->Tag->find('list');
		$this->set(compact('users', 'tags'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Bookmark->id = $id;
		if (!$this->Bookmark->exists()) {
			throw new NotFoundException(__('Invalid bookmark'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bookmark->delete()) {
			$this->Session->setFlash(__('Bookmark deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Bookmark was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
