<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Authentications Controller
 *
 * @property \App\Model\Table\AuthenticationsTable $Authentications
 */
class AuthenticationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Authentications->find();
        $authentications = $this->paginate($query);

        $this->set(compact('authentications'));
    }

    /**
     * View method
     *
     * @param string|null $id Authentication id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $authentication = $this->Authentications->get($id, contain: []);
        $this->set(compact('authentication'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $authentication = $this->Authentications->newEmptyEntity();
        if ($this->request->is('post')) {
            $authentication = $this->Authentications->patchEntity($authentication, $this->request->getData());
            if ($this->Authentications->save($authentication)) {
                $this->Flash->success(__('The authentication has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The authentication could not be saved. Please, try again.'));
        }
        $this->set(compact('authentication'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Authentication id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $authentication = $this->Authentications->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $authentication = $this->Authentications->patchEntity($authentication, $this->request->getData());
            if ($this->Authentications->save($authentication)) {
                $this->Flash->success(__('The authentication has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The authentication could not be saved. Please, try again.'));
        }
        $this->set(compact('authentication'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Authentication id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $authentication = $this->Authentications->get($id);
        if ($this->Authentications->delete($authentication)) {
            $this->Flash->success(__('The authentication has been deleted.'));
        } else {
            $this->Flash->error(__('The authentication could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
