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
 * Gamesfour Controller
 *
 * @property \App\Model\Table\GamesfourTable $Gamesfour
 */
class GamesfourController extends AppController {

    public $Games = null;
    public $Gamesone = null;
    public $Gamestwo = null;
    public $Gamesthree = null;
    public $Activecodes = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Gamesone = TableRegistry::get('Gamesone');
        $this->Gamestwo = TableRegistry::get('Gamestwo');
        $this->Gamesthree = TableRegistry::get('Gamesthree');
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
        $gamesfour = $this->paginate($this->Gamesfour);

        $this->set(compact('gamesfour'));
        $this->set('_serialize', ['gamesfour']);
    }

    /**
     * View method
     *
     * @param string|null $id Gamesfour id.
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

        $gamesfour = $this->Gamesfour->get($id, [
            'contain' => ['Games']
        ]);

        $this->set('gamesfour', $gamesfour);
        $this->set('_serialize', ['gamesfour']);
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

        $gamesfour = $this->Gamesfour->newEntity();
        $MGame = $this->request->session()->read('game');
        $idQury = $MGame['id'];

        $queryGamesfour = $this->Gamesfour->find('all', [
            'conditions' => ['Gamesfour.game_id' => $idQury],
            'order' => ['Gamesfour.game4_number ASC']
        ]);

        $arrGamesfour = $queryGamesfour->toArray();

        if ($this->request->is('post')) {

            $count = 0;
            $game4num = 0;
            for ($i = 1; $i <= 10; $i++) {
                $gamesfour = $this->Gamesfour->get($arrGamesfour[$game4num]['id']);

                $gamenameTH = $this->request->data['game4_nameTH' . $i];
                $gamenameEN = $this->request->data['game4_nameEN' . $i];

                $filenameimg = $this->request->data['game4_image' . $i]['name'];
                $filenamevoiceTH = $this->request->data['game4_voiceTH' . $i]['name'];
                $filenamevoiceEN = $this->request->data['game4_voiceEN' . $i]['name'];

                $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);
                $extvoiceTH = substr(strtolower(strrchr($filenamevoiceTH, '.')), 1);
                $extvoiceEN = substr(strtolower(strrchr($filenamevoiceEN, '.')), 1);

                $urlimg = 'MiniGame4/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                $urlvoiceTH = 'MiniGame4/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                $urlvoiceEN = 'MiniGame4/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;


                $uploadpath = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame4' . DS;

                $uploadfileimg = $uploadpath . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                $uploadfilevoiceTH = $uploadpath . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                $uploadfilevoiceEN = $uploadpath . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;

                    if (move_uploaded_file($this->request->data['game4_image' . $i]['tmp_name'], $uploadfileimg)) {
                        move_uploaded_file($this->request->data['game4_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH);
                        move_uploaded_file($this->request->data['game4_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN);

                        $game4num = $game4num + 1;
                        $gamesfour->game4_nameTH = $gamenameTH;
                        $gamesfour->game4_nameEN = $gamenameEN;

                        $gamesfour->game4_voiceTH_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                        $gamesfour->game4_voiceEN_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;
                        $gamesfour->game4_image_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                        $gamesfour->game_id = $MGame['id'];

                        $gamesfour->created = date("Y-m-d:H:i:s");
                        $gamesfour->updated = date("Y-m-d:H:i:s");
                        $gamesfour->game4_color = $this->request->data['game4_color' . $i];
                        $gamesfour->game4_voiceTH_path = $urlvoiceTH;
                        $gamesfour->game4_voiceEN_path = $urlvoiceEN;
                        $gamesfour->game4_image_path = $urlimg;
                        $gamesfour->game4_complete_status = 1;

                        /////////games 4 - 2

                        $gamesfour_2 = $this->Gamesfour->get($arrGamesfour[$game4num]['id']);

                        $gamenameTH_2 = $this->request->data['game4_2_nameTH' . $i];
                        $gamenameEN_2 = $this->request->data['game4_2_nameEN' . $i];

                        $filenameimg_2 = $this->request->data['game4_2_image' . $i]['name'];
                        $filenamevoiceTH_2 = $this->request->data['game4_2_voiceTH' . $i]['name'];
                        $filenamevoiceEN_2 = $this->request->data['game4_2_voiceEN' . $i]['name'];
                        $extimg_2 = substr(strtolower(strrchr($filenameimg_2, '.')), 1);
                        $extvoiceTH_2 = substr(strtolower(strrchr($filenamevoiceTH_2, '.')), 1);
                        $extvoiceEN_2 = substr(strtolower(strrchr($filenamevoiceEN_2, '.')), 1);

                        $urlimg_2 = 'MiniGame4/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-image." . $extimg;
                        $urlvoiceTH_2 = 'MiniGame4/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceTH." . $extvoiceTH;
                        $urlvoiceEN_2 = 'MiniGame4/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceEN." . $extvoiceEN;


                        $uploadpath_2 = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame4' . DS;

                        $uploadfileimg_2 = $uploadpath_2 . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-image." . $extimg_2;
                        $uploadfilevoiceTH_2 = $uploadpath_2 . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceTH." . $extvoiceTH_2;
                        $uploadfilevoiceEN_2 = $uploadpath_2 . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceEN." . $extvoiceEN_2;

                            if (move_uploaded_file($this->request->data['game4_2_image' . $i]['tmp_name'], $uploadfileimg_2)) {
                                move_uploaded_file($this->request->data['game4_2_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH_2);
                                move_uploaded_file($this->request->data['game4_2_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN_2);

                                $game4num = $game4num + 1;
                                $gamesfour_2->game4_nameTH = $gamenameTH_2;
                                $gamesfour_2->game4_nameEN = $gamenameEN_2;

                                $gamesfour_2->game4_voiceTH_name = $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceTH." . $extvoiceTH_2;
                                $gamesfour_2->game4_voiceEN_name = $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceEN." . $extvoiceEN_2;
                                $gamesfour_2->game4_image_name = $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-image." . $extimg_2;
                                $gamesfour_2->game_id = $MGame['id'];

                                $gamesfour_2->created = date("Y-m-d:H:i:s");
                                $gamesfour_2->updated = date("Y-m-d:H:i:s");
                                $gamesfour_2->game4_color = $this->request->data['game4_2_color' . $i];
                                $gamesfour_2->game4_voiceTH_path = $urlvoiceTH_2;
                                $gamesfour_2->game4_voiceEN_path = $urlvoiceEN_2;
                                $gamesfour_2->game4_image_path = $urlimg_2;
                                $gamesfour_2->game4_complete_status = 1;

                                if ($this->Gamesfour->save($gamesfour)) {
                                    $this->Gamesfour->save($gamesfour_2);

                                    $game = $this->Games->get($MGame['id']);
                                    $game->game_complete_status = 1;
                                    $this->Games->save($game);

                                    $this->Flash->success(_('The game has been saved.'));
                                    $count++;
                                } else {
                                    $this->Flash->error(_('The game could not be saved. Please, try again.'));
                                }
                            }
                    }
            }
            if ($count == 10) {
                return $this->redirect('/games/index');
            }

            $this->Flash->error(__('The gamesfour could not be saved. Please, try again.'));
        }


        $games = $this->Gamesfour->Games->find('list', ['limit' => 200]);
        $this->set(compact('gamesfour', 'games'));
        $this->set('_serialize', ['gamesfour']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gamesfour id.
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
            for ($i = 1; $i <= 20; $i++) {
                $idroop = $this->request->data['id' . $i];

                $gamesfour = $this->Gamesfour->get($idroop, [
                    'contain' => []
                ]);

                $gamenameTH = $this->request->data['game4_nameTH' . $i];
                $gamenameEN = $this->request->data['game4_nameEN' . $i];

                $filenameimg = $this->request->data['game4_image' . $i]['name'];
                $filenamevoiceTH = $this->request->data['game4_voiceTH' . $i]['name'];
                $filenamevoiceEN = $this->request->data['game4_voiceEN' . $i]['name'];
//                $uploadpath = 'uploadfile/';

                $uploadpath = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame4' . DS;

                if ($filenameimg != "") {

                    $delfile = $MGame->game_path . $gamesfour->game4_image_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);
//                    $urlimg = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
                    $urlimg = 'MiniGame4/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;

                    $uploadfileimg = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;

                    if (in_array($extimg, $this->arr_ext_img)) {
                        move_uploaded_file($this->request->data['game4_image' . $i]['tmp_name'], $uploadfileimg);
                        $gamesfour->game4_image_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
                        $gamesfour->game4_image_path = $urlimg;
                    } else {
                        $this->Flash->error(_('กรุณาเลือกไฟล์ ให้ถูกประเภท '));
                    }
                }

                if ($filenamevoiceTH != "") {

                    $delfile = $MGame->game_path . $gamesfour->game4_voiceTH_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extvoiceTH = substr(strtolower(strrchr($filenamevoiceTH, '.')), 1);
//                    $urlvoiceTH = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;
                    $urlvoiceTH = 'MiniGame4/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;

                    $uploadfilevoiceTH = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;

                    if (in_array($extvoiceTH, $this->arr_ext_voice)) {
                        move_uploaded_file($this->request->data['game4_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH);
                        $gamesfour->game4_voiceTH_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;
                        $gamesfour->game4_voiceTH_path = $urlvoiceTH;
                    } else {
                        $this->Flash->error(_('กรุณาเลือกไฟล์ ให้ถูกประเภท '));
                    }
                }

                if ($filenamevoiceEN != "") {

                    $delfile = $MGame->game_path . $gamesfour->game4_voiceEN_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extvoiceEN = substr(strtolower(strrchr($filenamevoiceEN, '.')), 1);
//                    $urlvoiceEN = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;
                    $urlvoiceEN = 'MiniGame4/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;

                    $uploadfilevoiceEN = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;

                    if (in_array($extvoiceEN, $this->arr_ext_voice)) {
                        move_uploaded_file($this->request->data['game4_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN);
                        $gamesfour->game4_voiceEN_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;
                        $gamesfour->game4_voiceEN_path = $urlvoiceEN;
                    } else {
                        $this->Flash->error(_('กรุณาเลือกไฟล์ ให้ถูกประเภท '));
                    }
                }

                $gamesfour->game4_nameTH = $gamenameTH;
                $gamesfour->game4_nameEN = $gamenameEN;
                $gamesfour->game4_complete_status = 1;

                if ($this->Gamesfour->save($gamesfour)) {
                    $this->Flash->success(_('The game has been saved.'));
                    $count++;
                } else {
                    $this->Flash->error(_('The game could not be saved. Please, try again.'));
                }
            }

            if ($count == 20) {

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

                    if ($countgameone == 9 && $countgametwo == 18 && $countgamethree == 9) {
                        $game = $this->Games->get($idQury);
                        $game->game_complete_status = 1;
                        $this->Games->save($game);
                    }
                }

                return $this->redirect('/games/listEditPage');
            }
        }

        $where = [];
        array_push($where, ['Gamesfour.game_id' => $idQury]);

        $gamesfour = $this->Gamesfour->find('all', array('order' => 'Gamesfour.game4_number ASC'))
                ->where($where);

        $this->set(compact('gamesfour'));
        $this->set('_serialize', ['gamesfour']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gamesfour id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $gamesfour = $this->Gamesfour->get($id);
        if ($this->Gamesfour->delete($gamesfour)) {
            $this->Flash->success(__('The gamesfour has been deleted.'));
        } else {
            $this->Flash->error(__('The gamesfour could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
