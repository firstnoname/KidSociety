<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 */
class AccountsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $loginuser = $this->request->session()->read('user');
        
        if ($loginuser[0]['status'] == 1) {
            $status1 = '';
            $status2 = 'style="display:none"';
        } else if ($loginuser[0]['status'] == 2){
            $status1 = 'style="display:none"';
            $status2 = '';
        } else {
            return $this->redirect(['action' => 'login']);
        }
        
        $this->set(compact('account','status1','status2'));
        $this->set('_serialize', ['accounts']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Account id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loginuser = $this->request->session()->read('user');
        if ($loginuser[0]['status'] == 1) {
            $status1 = '';
            $status2 = 'style="display:none"';
        } else if ($loginuser[0]['status'] == 2){
            $status1 = 'style="display:none"';
            $status2 = '';
        } else {
            return $this->redirect('/accounts/login');
        }
        
        $account = $this->Accounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $this->set(compact('account'));
        $this->set('_serialize', ['account']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Account id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $loginuser = $this->request->session()->read('user');
        if ($loginuser[0]['status'] == 1) {
            $status1 = '';
            $status2 = 'style="display:none"';
        } else if ($loginuser[0]['status'] == 2){
            $status1 = 'style="display:none"';
            $status2 = '';
        } else {
            return $this->redirect('/accounts/login');
        }
        
        $this->request->allowMethod(['post', 'delete']);
        $account = $this->Accounts->get($id);
        if ($this->Accounts->delete($account)) {
            $this->Flash->success(__('The account has been deleted.'));
        } else {
            $this->Flash->error(__('The account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function register() {
        $account = $this->Accounts->newEntity();
        if ($this->request->is('post')) {
            $account = $this->Accounts->patchEntity($account, $this->request->getData());
            $account->status = '2';
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        //  $types = $this->Accounts->Types->find('list', ['limit' => 200]);
        //  $jobs = $this->Accounts->Jobs->find('list', ['limit' => 200]);
        $types = ['1' => 'Tester', '2' => 'Trainer'];
        $jobs = ['1' => 'Analyst', '2' => 'Designer', '3' => 'Programmer', '4' => 'Tester', '5' => 'Others', '6' => 'None'];
        $this->set(compact('account', 'types', 'jobs'));
        $this->set('_serialize', ['account']);
    }
    
    public function login() {

        if ($this->request->is('post')) {


            $where = [];
            array_push($where, ['Accounts.username ' => $this->request->getData('username'), 'Accounts.password ' => $this->request->getData('password')]);
            $query = $this->Accounts->find('all', ['conditions' => [$where]]);
            $user = $query->toArray();

            if (sizeof($user) > 0) {
                $this->request->session()->delete('loginstatus');               
              
                if($user[0]['status']==1){
                     $loginstatus="Admin    ";
                }else if($user[0]['status']==2){
                     $loginstatus =  "User    ";
                }

                $this->request->session()->write('loginstatus', $loginstatus);
                $this->request->session()->write('user', $user);
                return $this->redirect('/Games/index');
            }
        }
    }

    public function logout() {

        $this->request->session()->destroy();
        $this->redirect(['controller' => 'Accounts', 'action' => 'login']);
    }
    
    public function testadd($id = null)
    {
        
        
    }
    
    
}
