<?php
App::uses('AppController', 'Controller');
/**
 * DocumentStates Controller
 *
 * @property DocumentStates $DocumentState
 */
class DocumentStatesController extends AppController 
{

	public function admin_index() 
	{
		$this->Prg->commonProcess();
		
		$conditions = array(
		);
		
		$this->DocumentState->recursive = -1;
		$this->paginate['order'] = array('DocumentState.name' => 'asc');
		$this->paginate['conditions'] = $this->DocumentState->conditions($conditions, $this->passedArgs); 
		$this->set('document_states', $this->paginate());
	}
	
	public function admin_add() 
	{
		if ($this->request->is('post'))
		{
			$this->DocumentState->create();
			
			if ($this->DocumentState->saveAssociated($this->request->data))
			{
				$this->Session->setFlash(__('The %s has been saved', __('Document State')));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('The %s could not be saved. Please, try again.', __('Document State')));
			}
		}
	}
	
	public function admin_edit($id = null) 
	{
		$this->DocumentState->id = $id;
		if (!$this->DocumentState->exists()) 
		{
			throw new NotFoundException(__('Invalid %s', __('Document State')));
		}
		if ($this->request->is('post') || $this->request->is('put')) 
		{
			if ($this->DocumentState->saveAssociated($this->request->data)) 
			{
				$this->Session->setFlash(__('The %s has been saved', __('Document State')));
				return $this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('The %s could not be saved. Please, try again.', __('Document State')));
			}
		}
		else
		{
			$this->request->data = $this->DocumentState->read(null, $id);
		}
	}

//
	public function admin_delete($id = null) 
	{
		$this->DocumentState->id = $id;
		if (!$this->DocumentState->exists()) 
		{
			throw new NotFoundException(__('Invalid %s', __('Document State')));
		}

		if ($this->DocumentState->delete()) 
		{
			$this->Session->setFlash(__('%s deleted', __('Document State')));
			return $this->redirect($this->referer());
		}
		
		$this->Session->setFlash(__('%s was not deleted', __('Document State')));
		return $this->redirect($this->referer());
	}
}
