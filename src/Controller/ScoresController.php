<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Scores Controller
 *
 * @property \App\Model\Table\ScoresTable $Scores
 */
class ScoresController extends AppController
{
    
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
    public function index()
    {
        
        //Check post.
        if($this->request->is('post')){
            //return "Hello from index";
            //pr('1111');
            //echo json_encode("Hello from index");
            
            $game_id = $this->request->data['searchfrom'];
//            pr($game_id);
            $queryscore = $this->Scores->find('all',
                ['conditions' => ['game_id' => $game_id]]);
            
            $scores = $queryscore->toArray();
//             pr($scores);
            
            
            
        }else{
            echo "Check post is false";
            $scores = $this->paginate($this->Scores);
        }
        
        
               
        $query = $this->Games->find('list',
                ['valueField'=>'game_nameTH']);
        $searchfrom = $query->toArray();
//        pr($searchfrom);

        $this->set(compact('scores','searchfrom'));
        $this->set('_serialize', ['scores']);
        
        
        
    }

    /**
     * View method
     *
     * @param string|null $id Score id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $score = $this->Scores->get($id, [
            'contain' => []
        ]);

        $this->set('score', $score);
        $this->set('_serialize', ['score']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $score = $this->Scores->newEntity();
        if ($this->request->is('post')) {
            $score = $this->Scores->patchEntity($score, $this->request->getData());
            if ($this->Scores->save($score)) {
                $this->Flash->success(__('The score has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The score could not be saved. Please, try again.'));
        }
        $this->set(compact('score'));
        $this->set('_serialize', ['score']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Score id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $score = $this->Scores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $score = $this->Scores->patchEntity($score, $this->request->getData());
            if ($this->Scores->save($score)) {
                $this->Flash->success(__('The score has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The score could not be saved. Please, try again.'));
        }
        $this->set(compact('score'));
        $this->set('_serialize', ['score']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Score id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $score = $this->Scores->get($id);
        if ($this->Scores->delete($score)) {
            $this->Flash->success(__('The score has been deleted.'));
        } else {
            $this->Flash->error(__('The score could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //Method score_report.
    public function scoreReport(){

        if($this->request->is('post')){

            $graphNum = $this->request->data['graphform'];

            if ($graphNum == '1') {
            
            }else if($graphNum == '2'){
                //graphNum = อายุ
    
            }else{
                
            }
        }//end check post.
        
        

        $graph = ['1' => 'ทั่วไป', '2' => 'อายุ', '3' => 'รายได้'];
        $this->set(compact('graph'));
        $this->set('_serialize', ['scores']);


    }
}
