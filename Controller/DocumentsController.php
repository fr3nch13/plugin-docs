<?php

App::uses('DocsAppController', 'Docs.Controller');

class DocumentsController extends DocsAppController 
{
	public function index() 
	{
		$this->Prg->commonProcess();
		
		$conditions = array(
			'Document.active' => true,
		);
		
		$this->Document->recursive = 0;
		$this->paginate['order'] = array('Document.created' => 'desc');
		$this->paginate['conditions'] = $this->Document->conditions($conditions, $this->passedArgs); 
		$this->set('documents', $this->paginate());
	}
	
	public function admin_index()
	{
		$this->Prg->commonProcess();
		
		$conditions = array(
		);
		
		$this->Document->recursive = 0;
		$this->paginate['order'] = array('Document.created' => 'desc');
		$this->paginate['conditions'] = $this->Document->conditions($conditions, $this->passedArgs); 
		$this->set('documents', $this->paginate());
	}
	
//
	public function admin_add() 
	{
		
		if($this->request->is('post') || $this->request->is('put')) 
		{
			if($this->Document->save($this->request->data)) 
			{
				$this->Session->setFlash(__('The %s has been added', __('Document')));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('The %s was not added. Please, try again.', __('Document')));
			}
		}
		$this->set('document_states', $this->Document->DocumentState->find('list') );
	}

//
	public function admin_edit($id = null) 
	{
		$this->Document->id = $id;
		if (!$this->Document->exists())
		{
			throw new NotFoundException(__('Invalid %s', __('Document')));
		}
		
		if($this->request->is('post') || $this->request->is('put')) 
		{
			if ($this->Document->save($this->request->data))
			{
				$this->Session->setFlash(__('The %s has been updated', __('Document')));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('The %s could not be updated. Please, try again.', __('Document')));
			}
		}
		else
		{
			$this->request->data = $this->Document->read(null, $this->Document->id);
		}
		$this->set('document_states', $this->Document->DocumentState->find('list') );
	}

//
	public function admin_toggle($field = null, $id = null)
	{
	/*
	 * Toggle an object's boolean settings (like active)
	 */
		if ($this->Document->toggleRecord($id, $field))
		{
			$this->Session->setFlash(__('The %s has been updated.', __('Document')));
		}
		else
		{
			$this->Session->setFlash($this->Document->modelError);
		}
		
		return $this->redirect($this->referer());
	}

//
	public function admin_delete($id = null) 
	{
		$this->Document->id = $id;
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Invalid %s', __('Document')));
		}
		if ($this->Document->delete()) {
			$this->Session->setFlash(__('%s deleted', __('Document')));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('%s was not deleted', __('Document')));
		return $this->redirect(array('action' => 'index'));
	}
}