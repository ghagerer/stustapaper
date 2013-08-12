<?php
App::uses('AppController', 'Controller');
/**
 * OfflineWebsites Controller
 *
 * @property OfflineWebsite $OfflineWebsite
 */
class OfflineWebsitesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->OfflineWebsite->recursive = 0;
		$this->set('offlineWebsites', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OfflineWebsite->exists($id)) {
			throw new NotFoundException(__('Invalid offline website'));
		}
		$this->layout = 'plain';
		$options = array('conditions' => array('OfflineWebsite.' . $this->OfflineWebsite->primaryKey => $id));
		$this->set('offlineWebsite', $this->OfflineWebsite->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OfflineWebsite->create();
			if ($this->OfflineWebsite->save($this->request->data)) {
				$this->Session->setFlash(__('The offline website has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offline website could not be saved. Please, try again.'));
			}
		}
		$bookmarks = $this->OfflineWebsite->Bookmark->find('list');
		$this->set(compact('bookmarks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->OfflineWebsite->exists($id)) {
			throw new NotFoundException(__('Invalid offline website'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OfflineWebsite->save($this->request->data)) {
				$this->Session->setFlash(__('The offline website has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offline website could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OfflineWebsite.' . $this->OfflineWebsite->primaryKey => $id));
			$this->request->data = $this->OfflineWebsite->find('first', $options);
		}
		$bookmarks = $this->OfflineWebsite->Bookmark->find('list');
		$this->set(compact('bookmarks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->OfflineWebsite->id = $id;
		if (!$this->OfflineWebsite->exists()) {
			throw new NotFoundException(__('Invalid offline website'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OfflineWebsite->delete()) {
			$this->Session->setFlash(__('Offline website deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Offline website was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->OfflineWebsite->recursive = 0;
		$this->set('offlineWebsites', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OfflineWebsite->exists($id)) {
			throw new NotFoundException(__('Invalid offline website'));
		}
		$options = array('conditions' => array('OfflineWebsite.' . $this->OfflineWebsite->primaryKey => $id));
		$this->set('offlineWebsite', $this->OfflineWebsite->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OfflineWebsite->create();
			if ($this->OfflineWebsite->save($this->request->data)) {
				$this->Session->setFlash(__('The offline website has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offline website could not be saved. Please, try again.'));
			}
		}
		$bookmarks = $this->OfflineWebsite->Bookmark->find('list');
		$this->set(compact('bookmarks'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->OfflineWebsite->exists($id)) {
			throw new NotFoundException(__('Invalid offline website'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OfflineWebsite->save($this->request->data)) {
				$this->Session->setFlash(__('The offline website has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The offline website could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OfflineWebsite.' . $this->OfflineWebsite->primaryKey => $id));
			$this->request->data = $this->OfflineWebsite->find('first', $options);
		}
		$bookmarks = $this->OfflineWebsite->Bookmark->find('list');
		$this->set(compact('bookmarks'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->OfflineWebsite->id = $id;
		if (!$this->OfflineWebsite->exists()) {
			throw new NotFoundException(__('Invalid offline website'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OfflineWebsite->delete()) {
			$this->Session->setFlash(__('Offline website deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Offline website was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
