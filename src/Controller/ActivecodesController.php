<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Activecodes Controller
 *
 * @property \App\Model\Table\ActivecodesTable $Activecodes
 */
class ActivecodesController extends AppController {

    public $Games = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Games = TableRegistry::get('Games');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id = null) {
        
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
        $game = $this->Games->get($id);
        
        $where = [];
        if ($this->request->is(['post'])) {
            
            $this->request->session()->delete('where');
            $searchfrom = $this->request->getData('searchfrom');
            $game_id = $this->request->getData('game_id');
            $game = $this->Games->get($game_id);

            if ($searchfrom == 1) {

                array_push($where, ['Activecodes.game_id' => $game->id]);
                
            } else if ($searchfrom == 2) {

                array_push($where, ['Activecodes.game_id' => $game->id, 'Activecodes.code_status' => 1]);
                
            } else if ($searchfrom == 3) {

                array_push($where, ['Activecodes.game_id' => $game->id, 'Activecodes.code_status' => 2]);
                
            }

            $this->request->session()->write('where', $where);
            
        }
        
        if($this->request->session()->read('where') == null){
            array_push($where, ['Activecodes.game_id' => $game->id]);
            $this->request->session()->write('where', $where);
        }
        
        $activecodes = $this->paginate($this->Activecodes->find('all',array('contain' => 'Accounts', 'order' => 'Activecodes.code_status ASC'))
                        ->where($this->request->session()->read('where')), array('limit' => 20));
       
        $searchfrom = ['1' => 'ทั้งหมด', '2' => 'รหัสที่ยังไม่ได้ใช้งาน', '3' => 'รหัสที่ใช้งานแล้ว'];
        $this->set(compact('activecodes', 'game', 'searchfrom'));
        $this->set('_serialize', ['activecodes']);
    }

    /**
     * View method
     *
     * @param string|null $id Activecode id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $activecode = $this->Activecodes->get($id, [
            'contain' => ['Games', 'Accounts']
        ]);

        $this->set('activecode', $activecode);
        $this->set('_serialize', ['activecode']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null) {
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
        
        $game = $this->Games->get($id);
        if ($this->request->is('post')) {
            $ac_num = $this->request->getData('ac_num');
            $game_id = $this->request->getData('game_id');
            for ($i = 1; $i <= $ac_num; $i++) {

                $activecode = $this->Activecodes->newEntity();

                $activecode->ac_code = '1234567891234567';
                $activecode->code_status = 1;
                $activecode->game_id = $game_id;
                $this->Activecodes->save($activecode);
                $subaccode = substr($activecode->id, 0, 16);
                $activecode->ac_code = $subaccode;
                $this->Activecodes->save($activecode);
            }

            return $this->redirect(['action' => 'index', $game->id]);
        }
//        $game_id = $game->id;
        $activecode = $this->Activecodes->newEntity();
        $this->set(compact('activecode', 'game'));
        $this->set('_serialize', ['activecode']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Activecode id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $activecode = $this->Activecodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activecode = $this->Activecodes->patchEntity($activecode, $this->request->getData());
            if ($this->Activecodes->save($activecode)) {
                $this->Flash->success(__('The activecode has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activecode could not be saved. Please, try again.'));
        }
        $games = $this->Activecodes->Games->find('list', ['limit' => 200]);
        $accounts = $this->Activecodes->Accounts->find('list', ['limit' => 200]);
        $this->set(compact('activecode', 'games', 'accounts'));
        $this->set('_serialize', ['activecode']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Activecode id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $activecode = $this->Activecodes->get($id);
        if ($this->Activecodes->delete($activecode)) {
            $this->Flash->success(__('The activecode has been deleted.'));
        } else {
            $this->Flash->error(__('The activecode could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
