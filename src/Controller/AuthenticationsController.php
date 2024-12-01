<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Authentication;
use Cake\Utility\Text;

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

    public function login()
    {
        $this->request->allowMethod(['post']);

        if ($this->request->is('post')) {
            $httpResponse = $this->response;

            $username = $this->request->getData('username');
            $password = $this->request->getData('password');
            $newAuthToken = Text::uuid();

            $userTable = $this->fetchTable('users');
            $user = $userTable->find()->where(['Users.username' => $username, 'Users.password' => md5($password)])->first();

            if ($user) {
                $authTable = $this->fetchTable('authentications');

                $existentAuth = $authTable->find()->where(['Authentications.fk_id_user' => $user['id_user']])->first();
                
                if ($existentAuth) {
                    $statement = $authTable->updateQuery()
                        ->set(['Authentications.token' => Text::uuid()])
                        ->where(['Authentications.id_auth' => $existentAuth['id_auth']])
                        ->execute();

                    $rowsAffected = $statement->rowCount();

                    if (!empty($rowsAffected)) {
                        $this->request->getSession()->write('User.username', $user->username);
                        $this->request->getSession()->write('User.email', $user->email);
                        $this->request->getSession()->write('User.token', $newAuthToken);

                        $response = [
                            'status' => 'success',
                            'message' => 'Login realizado com sucesso!',
                        ];
                    } else {
                        $httpResponse = $httpResponse->withStatus(500);
                        $response = [
                            'status' => 'error',
                            'message' => 'Erro ao tentar realizar o login!'
                        ];
                    }
                } else {
                    $authentication = new Authentication(['fk_id_user' => $user['id_user'], 'token' => $newAuthToken]);

                    if ($authTable->save($authentication)) {
                        $this->request->getSession()->write('User.username', $user->username);
                        $this->request->getSession()->write('User.email', $user->email);
                        $this->request->getSession()->write('User.token', $newAuthToken);

                        $response = [
                            'status' => 'success',
                            'message' => 'Login realizado com sucesso!'
                        ];
                    } else {
                        $httpResponse = $httpResponse->withStatus(500);
                        $response = [
                            'status' => 'error',
                            'message' => 'Erro ao tentar realizar o login!'
                        ];
                    };
                }
            } else {
                $httpResponse = $httpResponse->withStatus(403);
                $response = [
                    'status' => 'error',
                    'message' => 'Usuario ou senha invalidos'
                ];
            }

            $httpResponse = $httpResponse->withType('json');

            return $httpResponse->withStringBody(json_encode($response));;
        }
    }

    public function logout(){
        $this->getRequest()->getSession()->destroy();
        return $this->redirect('/');
    }
}
