<?php
App::uses('AppController', 'Controller');
/**
 * Folders Controller
 *
 * @property Folder $Folder
 */
class FoldersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		
		$this->paginate = array(
			'conditions' => array(
				'Folder.user_id' => $this->Auth->user('id')),
			'limit' =>
				1000
		);
		
		$this->Folder->recursive = 0;
		$this->set('folders', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Folder->exists($id)) {
			throw new NotFoundException(__('Invalid Folder'));
		}
		$options = array('conditions' => array('Folder.' . $this->Folder->primaryKey => $id));
		$this->set('folder', $this->Folder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Folder']['user_id'] = $this->Auth->user('id');
			$this->Folder->create();
			if ($this->Folder->save($this->request->data)) {
				$this->Session->setFlash(__('The Folder has been saved'));
				$this->redirect(array('controller' => 'bookmarks', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Folder could not be saved. Please, try again.'));
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
		if (!$this->Folder->exists($id)) {
			throw new NotFoundException(__('Invalid Folder'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Folder->save($this->request->data)) {
				$this->Session->setFlash(__('The Folder has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Folder could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Folder.' . $this->Folder->primaryKey => $id));
			$this->request->data = $this->Folder->find('first', $options);
		}
		$users = $this->Folder->User->find('list');
		$bookmarks = $this->Folder->Bookmark->find('list');
		$this->set(compact('users', 'bookmarks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Folder->id = $id;
		if (!$this->Folder->exists()) {
			throw new NotFoundException(__('Invalid Folder'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Folder->delete()) {
			$this->Session->setFlash(__('Folder deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Folder was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Folder->recursive = 0;
		$this->set('folders', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Folder->exists($id)) {
			throw new NotFoundException(__('Invalid Folder'));
		}
		$options = array('conditions' => array('Folder.' . $this->Folder->primaryKey => $id));
		$this->set('Folder', $this->Folder->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Folder->create();
			if ($this->Folder->save($this->request->data)) {
				$this->Session->setFlash(__('The Folder has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Folder could not be saved. Please, try again.'));
			}
		}
		$users = $this->Folder->User->find('list');
		$users[''] = '--- No User ---';
		$bookmarks = $this->Folder->Bookmark->find('list');
		$this->set(compact('users', 'bookmarks'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Folder->exists($id)) {
			throw new NotFoundException(__('Invalid Folder'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Folder->save($this->request->data)) {
				$this->Session->setFlash(__('The Folder has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Folder could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Folder.' . $this->Folder->primaryKey => $id));
			$this->request->data = $this->Folder->find('first', $options);
		}
		$users = $this->Folder->User->find('list');
		$users[''] = '--- No User ---';
		$bookmarks = $this->Folder->Bookmark->find('list');
		$this->set(compact('users', 'bookmarks'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Folder->id = $id;
		if (!$this->Folder->exists()) {
			throw new NotFoundException(__('Invalid Folder'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Folder->delete()) {
			$this->Session->setFlash(__('Folder deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Folder was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
