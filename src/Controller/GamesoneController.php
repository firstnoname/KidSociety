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
 * Gamesone Controller
 *
 * @property \App\Model\Table\GamesoneTable $Gamesone
 */
class GamesoneController extends AppController {

    public $Games = null;
    public $Gamestwo = null;
    public $Gamesthree = null;
    public $Gamesfour = null;
    public $Activecodes = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Gamestwo = TableRegistry::get('Gamestwo');
        $this->Gamesthree = TableRegistry::get('Gamesthree');
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
        $this->paginate = [
            'contain' => ['Games']
        ];
        $gamesone = $this->paginate($this->Gamesone);

        $this->set(compact('gamesone'));
        $this->set('_serialize', ['gamesone']);
    }

    /**
     * View method
     *
     * @param string|null $id Gamesone id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $gamesone = $this->Gamesone->get($id, [
            'contain' => ['Games']
        ]);

        $this->set('gamesone', $gamesone);
        $this->set('_serialize', ['gamesone']);
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

        $gameone = $this->Gamesone->newEntity();
        $MGame = $this->request->session()->read('game');
        $idQury = $MGame['id'];

        $queryGamesone = $this->Gamesone->find('all', [
            'conditions' => ['Gamesone.game_id' => $idQury],
            'order' => ['Gamesone.game1_number ASC']
        ]);

        $arrGamesone = $queryGamesone->toArray();

        if ($this->request->is('post')) {

            $count = 0;
            for ($i = 1; $i <= 9; $i++) {
                $gamesone = $this->Gamesone->get($arrGamesone[$i - 1]['id']);

                $gamenameTH = $this->request->data['game1_nameTH' . $i];
                $gamenameEN = $this->request->data['game1_nameEN' . $i];

                ////////////////////////////////
                $filenameimg = $this->request->data['game1_image' . $i]['name'];
                $filenamevoiceTH = $this->request->data['game1_voiceTH' . $i]['name'];
                $filenamevoiceEN = $this->request->data['game1_voiceEN' . $i]['name'];
                $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);
                $extvoiceTH = substr(strtolower(strrchr($filenamevoiceTH, '.')), 1);
                $extvoiceEN = substr(strtolower(strrchr($filenamevoiceEN, '.')), 1);

                $urlimg = 'MiniGame1/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                $urlvoiceTH = 'MiniGame1/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                $urlvoiceEN = 'MiniGame1/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;

                $uploadpath = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame1' . DS;

                $uploadfileimg = $uploadpath . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                $uploadfilevoiceTH = $uploadpath . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                $uploadfilevoiceEN = $uploadpath . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;

                if (move_uploaded_file($this->request->data['game1_image' . $i]['tmp_name'], $uploadfileimg)) {
                    move_uploaded_file($this->request->data['game1_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH);
                    move_uploaded_file($this->request->data['game1_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN);

                    $gamesone->game1_nameTH = $gamenameTH;
                    $gamesone->game1_nameEN = $gamenameEN;

                    $gamesone->game1_voiceTH_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                    $gamesone->game1_voiceEN_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;
                    $gamesone->game1_image_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                    $gamesone->game_id = $MGame['id'];

                    $gamesone->created = date("Y-m-d:H:i:s");
                    $gamesone->updated = date("Y-m-d:H:i:s");

                    $gamesone->game1_voiceTH_path = $urlvoiceTH;
                    $gamesone->game1_voiceEN_path = $urlvoiceEN;
                    $gamesone->game1_image_path = $urlimg;
                    $gamesone->game1_complete_status = 1;
                    if ($this->Gamesone->save($gamesone)) {
                        $this->Flash->success(_('The game has been saved.'));
                        $count++;
                    } else {
                        $this->Flash->error(_('The game could not be saved. Please, try again.'));
                    }
                }
            }

            if ($count == 9) {
                return $this->redirect('/gamestwo/add');
            }
        }
        $games = $this->Gamesone->Games->find('list', ['limit' => 200]);
        $this->set(compact('gameone', 'games'));
        $this->set('_serialize', ['gamesone']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gamesone id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
//        $gamesone = $this->Gamesone->get($id, [
//            'contain' => []
//        ]);
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

                $gamesone = $this->Gamesone->get($idroop, [
                    'contain' => []
                ]);

                $gamenameTH = $this->request->data['game1_nameTH' . $i];
                $gamenameEN = $this->request->data['game1_nameEN' . $i];

                ////////////////////////////////
                $filenameimg = $this->request->data['game1_image' . $i]['name'];
                $filenamevoiceTH = $this->request->data['game1_voiceTH' . $i]['name'];
                $filenamevoiceEN = $this->request->data['game1_voiceEN' . $i]['name'];
//                $uploadpath = 'uploadfile/';
                $uploadpath = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame1' . DS;

                if ($filenameimg != "") {

                    $delfile = $MGame->game_path . $gamesone->game1_image_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();
                    
                    $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);
//                    $urlimg = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
                    $urlimg = 'MiniGame1/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
//                    $uploadfileimg = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
                    $uploadfileimg = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;

                    move_uploaded_file($this->request->data['game1_image' . $i]['tmp_name'], $uploadfileimg);
                    $gamesone->game1_image_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
                    $gamesone->game1_image_path = $urlimg;
                }

                if ($filenamevoiceTH != "") {

                    $delfile = $MGame->game_path . $gamesone->game1_voiceTH_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extvoiceTH = substr(strtolower(strrchr($filenamevoiceTH, '.')), 1);
//                    $urlvoiceTH = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;
                    $urlvoiceTH = 'MiniGame1/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;

//                    $uploadfilevoiceTH = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;

                    $uploadfilevoiceTH = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;

                    move_uploaded_file($this->request->data['game1_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH);
                    $gamesone->game1_voiceTH_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;
                    $gamesone->game1_voiceTH_path = $urlvoiceTH;
                }

                if ($filenamevoiceEN != "") {

                    $delfile = $MGame->game_path . $gamesone->game1_voiceEN_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extvoiceEN = substr(strtolower(strrchr($filenamevoiceEN, '.')), 1);
//                    $urlvoiceEN = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;
                    $urlvoiceEN = 'MiniGame1/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;

//                    $uploadfilevoiceEN = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;
                    $uploadfilevoiceEN = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;

                    move_uploaded_file($this->request->data['game1_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN);
                    $gamesone->game1_voiceEN_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;
                    $gamesone->game1_voiceEN_path = $urlvoiceEN;
                }

                $gamesone->game1_nameTH = $gamenameTH;
                $gamesone->game1_nameEN = $gamenameEN;
                $gamesone->game1_complete_status = 1;

                if ($this->Gamesone->save($gamesone)) {
                    $this->Flash->success(_('The game has been saved.'));
                    $count++;
                } else {
                    $this->Flash->error(_('The game could not be saved. Please, try again.'));
                }

                if ($count == 9) {
                    $completestatus = $MGame['game_complete_status'];
                    if ($completestatus == 0) {

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

                        $queryGamesthree = $this->Gamesthree->find('all', [
                            'conditions' => ['Gamesthree.game_id' => $idQury]
                        ]);

                        $arrGamesthree = $queryGamesthree->toArray();

                        $countgamethree = 0;
                        for ($i = 0; $i < 9; $i++) {

                            if ($arrGamesthree[$i]['game3_complete_status'] == 1) {

                                $countgamethree = $countgamethree + 1;
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

                        if ($countgametwo == 18 && $countgamethree == 9 && $countgamefour == 20) {
                            $game = $this->Games->get($idQury);
                            $game->game_complete_status = 1;
                            $this->Games->save($game);
                        }
                    }

                    return $this->redirect('/games/listEditPage');
                }
            }
        }

        $where = [];
        array_push($where, ['Gamesone.game_id' => $idQury]);

        $gamesone = $this->Gamesone->find('all', array('order' => 'Gamesone.game1_number ASC'))
                ->where($where);

        $this->set(compact('gamesone'));
        $this->set('_serialize', ['gamesone']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gamesone id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $gamesone = $this->Gamesone->get($id);
        if ($this->Gamesone->delete($gamesone)) {
            $this->Flash->success(__('The gamesone has been deleted.'));
        } else {
            $this->Flash->error(__('The gamesone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
