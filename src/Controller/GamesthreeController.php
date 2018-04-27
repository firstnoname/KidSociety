<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Log\Log;
use Cake\Routing\Router;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\I18n\I18n;

/**
 * Gamesthree Controller
 *
 * @property \App\Model\Table\GamesthreeTable $Gamesthree
 */
class GamesthreeController extends AppController {

    public $Games = null;
    public $Gamesone = null;
    public $Gamestwo = null;
    public $Gamesfour = null;
    public $Activecodes = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Gamesone = TableRegistry::get('Gamesone');
        $this->Gamestwo = TableRegistry::get('Gamestwo');
        $this->Gamesfour = TableRegistry::get('Gamesfour');
        $this->Activecodes = TableRegistry::get('Activecodes');
        $this->Games = TableRegistry::get('Games');
    }

    public $arr_ext_img = array('jpg', 'png');
    public $arr_ext_voice = array('mp3', 'wav');

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $loginuser = $this->request->session()->read('user');
        if ($loginuser[0]['status'] == 1) {
            $status1 = '';
            $status2 = 'style="display:none"';
        } else if ($loginuser[0]['status'] == 2) {
            $status1 = 'style="display:none"';
            $status2 = '';
        } else {
            return $this->redirect('/accounts/login');
        }

        $this->paginate = [
            'contain' => ['Games']
        ];
        $gamesthree = $this->paginate($this->Gamesthree);

        $this->set(compact('gamesthree'));
        $this->set('_serialize', ['gamesthree']);
    }

    /**
     * View method
     *
     * @param string|null $id Gamesthree id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $loginuser = $this->request->session()->read('user');
        if ($loginuser[0]['status'] == 1) {
            $status1 = '';
            $status2 = 'style="display:none"';
        } else if ($loginuser[0]['status'] == 2) {
            $status1 = 'style="display:none"';
            $status2 = '';
        } else {
            return $this->redirect('/accounts/login');
        }

        $gamesthree = $this->Gamesthree->get($id, [
            'contain' => ['Games']
        ]);

        $this->set('gamesthree', $gamesthree);
        $this->set('_serialize', ['gamesthree']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $loginuser = $this->request->session()->read('user');
        if ($loginuser[0]['status'] == 1) {
            $status1 = '';
            $status2 = 'style="display:none"';
        } else if ($loginuser[0]['status'] == 2) {
            $status1 = 'style="display:none"';
            $status2 = '';
        } else {
            return $this->redirect('/accounts/login');
        }

        $gamesthree = $this->Gamesthree->newEntity();
        $MGame = $this->request->session()->read('game');
        $idQury = $MGame['id'];

        $queryGamesthree = $this->Gamesthree->find('all', [
            'conditions' => ['Gamesthree.game_id' => $idQury],
            'order' => ['Gamesthree.game3_number ASC']
        ]);

        $arrGamesthree = $queryGamesthree->toArray();
        if ($this->request->is('post')) {

            $count = 0;
            for ($i = 1; $i <= 9; $i++) {
                $gamesthree = $this->Gamesthree->get($arrGamesthree[$i - 1]['id']);

                $gamenameTH = $this->request->data['game3_nameTH' . $i];
                $gamenameEN = $this->request->data['game3_nameEN' . $i];

                ///////////////////////////////
                $filenameimg = $this->request->data['game3_image' . $i]['name'];
                $filenamevoiceTH = $this->request->data['game3_voiceTH' . $i]['name'];
                $filenamevoiceEN = $this->request->data['game3_voiceEN' . $i]['name'];
                $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);
                $extvoiceTH = substr(strtolower(strrchr($filenamevoiceTH, '.')), 1);
                $extvoiceEN = substr(strtolower(strrchr($filenamevoiceEN, '.')), 1);

                $urlimg = 'MiniGame3/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                $urlvoiceTH = 'MiniGame3/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                $urlvoiceEN = 'MiniGame3/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;

                $uploadpath = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame3' . DS;

                $uploadfileimg = $uploadpath . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                $uploadfilevoiceTH = $uploadpath . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                $uploadfilevoiceEN = $uploadpath . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;

                if (move_uploaded_file($this->request->data['game3_image' . $i]['tmp_name'], $uploadfileimg)) {
                    move_uploaded_file($this->request->data['game3_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH);
                    move_uploaded_file($this->request->data['game3_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN);

                    $gamesthree->game3_nameTH = $gamenameTH;
                    $gamesthree->game3_nameEN = $gamenameEN;

                    $gamesthree->game3_voiceTH_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                    $gamesthree->game3_voiceEN_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;
                    $gamesthree->game3_image_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                    $gamesthree->game_id = $MGame['id'];

                    $gamesthree->created = date("Y-m-d:H:i:s");
                    $gamesthree->updated = date("Y-m-d:H:i:s");
                    $gamesthree->game3_duration = $this->request->data['game3_duration' . $i];
                    $gamesthree->game3_voiceTH_path = $urlvoiceTH;
                    $gamesthree->game3_voiceEN_path = $urlvoiceEN;
                    $gamesthree->game3_image_path = $urlimg;
                    $gamesthree->game3_complete_status = 1;
                    if ($this->Gamesthree->save($gamesthree)) {
                        $this->Flash->success(_('The game has been saved.'));
                        $count++;
                    } else {
                        $this->Flash->error(_('The game could not be saved. Please, try again.'));
                    }
                }
            }

            if ($count == 9) {
                return $this->redirect('/gamesfour/add');
            }
        }
        $games = $this->Gamesthree->Games->find('list', ['limit' => 200]);
        $this->set(compact('gamesthree', 'games', 'durations'));
        $this->set('_serialize', ['gamesthree']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gamesthree id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $loginuser = $this->request->session()->read('user');
        if ($loginuser[0]['status'] == 1) {
            $status1 = '';
            $status2 = 'style="display:none"';
        } else if ($loginuser[0]['status'] == 2) {
            $status1 = 'style="display:none"';
            $status2 = '';
        } else {
            return $this->redirect('/accounts/login');
        }

        $MGame = $this->request->session()->read('editgame');
        $idQury = $MGame['id'];

        if ($this->request->is(['patch', 'post', 'put'])) {

            $count = 0;
            for ($i = 1; $i <= 9; $i++) {

                $idroop = $this->request->data['id' . $i];

                $gamesthree = $this->Gamesthree->get($idroop, [
                    'contain' => []
                ]);

                $gamenameTH = $this->request->data['game3_nameTH' . $i];
                $gamenameEN = $this->request->data['game3_nameEN' . $i];

                ///////////////////////
                $filenameimg = $this->request->data['game3_image' . $i]['name'];
                $filenamevoiceTH = $this->request->data['game3_voiceTH' . $i]['name'];
                $filenamevoiceEN = $this->request->data['game3_voiceEN' . $i]['name'];
//                $uploadpath = 'uploadfile/';
                $uploadpath = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame3' . DS;

                if ($filenameimg != "") {

                    $delfile = $MGame->game_path . $gamesthree->game3_image_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);
//                    $urlimg = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
                    $urlimg = 'MiniGame3/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;

                    $uploadfileimg = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;

                    move_uploaded_file($this->request->data['game3_image' . $i]['tmp_name'], $uploadfileimg);
                    $gamesthree->game3_image_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
                    $gamesthree->game3_image_path = $urlimg;
                }

                if ($filenamevoiceTH != "") {

                    $delfile = $MGame->game_path . $gamesthree->game3_voiceTH_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extvoiceTH = substr(strtolower(strrchr($filenamevoiceTH, '.')), 1);
//                    $urlvoiceTH = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;
                    $urlvoiceTH = 'MiniGame3/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;

                    $uploadfilevoiceTH = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;

                    move_uploaded_file($this->request->data['game3_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH);
                    $gamesthree->game3_voiceTH_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;
                    $gamesthree->game3_voiceTH_path = $urlvoiceTH;
                }

                if ($filenamevoiceEN != "") {

                    $delfile = $MGame->game_path . $gamesthree->game3_voiceEN_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extvoiceEN = substr(strtolower(strrchr($filenamevoiceEN, '.')), 1);
//                    $urlvoiceEN = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;
                    $urlvoiceEN = 'MiniGame3/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;

                    $uploadfilevoiceEN = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;
                    
                    move_uploaded_file($this->request->data['game3_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN);
                    $gamesthree->game3_voiceEN_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;
                    $gamesthree->game3_voiceEN_path = $urlvoiceEN;
                }

                $gamesthree->game3_nameTH = $gamenameTH;
                $gamesthree->game3_nameEN = $gamenameEN;
                $gamesthree->game3_complete_status = 1;

                $gamesthree->game3_duration = $this->request->data['game3_duration' . $i];

                if ($this->Gamesthree->save($gamesthree)) {
                    $this->Flash->success(_('The game has been saved.'));
                    $count++;
                } else {
                    $this->Flash->error(_('The game could not be saved. Please, try again.'));
                }
            }

            if ($count == 9) {

                $completestatus = $MGame['game_complete_status'];
                if ($completestatus == 0) {

                    $queryGamesone = $this->Gamesone->find('all', [
                        'conditions' => ['Gamesone.game_id' => $idQury]
                    ]);

                    $arrGamesone = $queryGamesone->toArray();

                    $countgameone = 0;
                    for ($i = 0; $i < 9; $i++) {

                        if ($arrGamesone[$i]['game1_complete_status'] == 1) {

                            $countgameone = $countgameone + 1;
                        }
                    }

                    $queryGamestwo = $this->Gamestwo->find('all', [
                        'conditions' => ['Gamestwo.game_id' => $idQury]
                    ]);

                    $arrGamestwo = $queryGamestwo->toArray();

                    $countgametwo = 0;
                    for ($i = 0; $i < 18; $i++) {

                        if ($arrGamestwo[$i]['game2_complete_status'] == 1) {

                            $countgametwo = $countgametwo + 1;
                        }
                    }

                    $queryGamesfour = $this->Gamesfour->find('all', [
                        'conditions' => ['Gamesfour.game_id' => $idQury]
                    ]);

                    $arrGamesfour = $queryGamesfour->toArray();

                    $countgamefour = 0;
                    for ($i = 0; $i < 20; $i++) {

                        if ($arrGamesfour[$i]['game4_complete_status'] == 1) {

                            $countgamefour = $countgamefour + 1;
                        }
                    }

                    if ($countgameone == 9 && $countgametwo == 18 && $countgamefour == 20) {
                        $game = $this->Games->get($idQury);
                        $game->game_complete_status = 1;
                        $this->Games->save($game);
                    }
                }

                return $this->redirect('/games/listEditPage');
            }
        }


        $where = [];
        array_push($where, ['Gamesthree.game_id' => $idQury]);

        $gamesthree = $this->Gamesthree->find('all', array('order' => 'Gamesthree.game3_number ASC'))
                ->where($where);

        $this->set(compact('gamesthree'));
        $this->set('_serialize', ['gamesthree']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gamesthree id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $gamesthree = $this->Gamesthree->get($id);
        if ($this->Gamesthree->delete($gamesthree)) {
            $this->Flash->success(__('The gamesthree has been deleted.'));
        } else {
            $this->Flash->error(__('The gamesthree could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
