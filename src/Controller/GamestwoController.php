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
 * Gamestwo Controller
 *
 * @property \App\Model\Table\GamestwoTable $Gamestwo
 */
class GamestwoController extends AppController {

    public $Games = null;
    public $Gamesone = null;
    public $Gamesthree = null;
    public $Gamesfour = null;
    public $Activecodes = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Gamesone = TableRegistry::get('Gamesone');
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
        $gamestwo = $this->paginate($this->Gamestwo);

        $this->set(compact('gamestwo'));
        $this->set('_serialize', ['gamestwo']);
    }

    /**
     * View method
     *
     * @param string|null $id Gamestwo id.
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

        $gamestwo = $this->Gamestwo->get($id, [
            'contain' => ['Games']
        ]);

        $this->set('gamestwo', $gamestwo);
        $this->set('_serialize', ['gamestwo']);
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

        $gamestwo = $this->Gamestwo->newEntity();
        $MGame = $this->request->session()->read('game');
        $idQury = $MGame['id'];

        $queryGamestwo = $this->Gamestwo->find('all', [
            'conditions' => ['Gamestwo.game_id' => $idQury],
            'order' => ['Gamestwo.game2_number ASC']
        ]);

        $arrGamestwo = $queryGamestwo->toArray();
        if ($this->request->is('post')) {

            $count = 0;
            $game2num = 0;
            for ($i = 1; $i <= 9; $i++) {
//game2-1///////////////////
                $gamestwo = $this->Gamestwo->get($arrGamestwo[$game2num]['id']);

                $gamenameTH = $this->request->data['game2_nameTH' . $i];
                $gamenameEN = $this->request->data['game2_nameEN' . $i];

////////////////////////////////
                $filenameimg = $this->request->data['game2_image' . $i]['name'];
                $filenamevoiceTH = $this->request->data['game2_voiceTH' . $i]['name'];
                $filenamevoiceEN = $this->request->data['game2_voiceEN' . $i]['name'];
                $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);
                $extvoiceTH = substr(strtolower(strrchr($filenamevoiceTH, '.')), 1);
                $extvoiceEN = substr(strtolower(strrchr($filenamevoiceEN, '.')), 1);

                $urlimg = 'MiniGame2/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                $urlvoiceTH = 'MiniGame2/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                $urlvoiceEN = 'MiniGame2/' . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;

                $uploadpath = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame2' . DS;


                $uploadfileimg = $uploadpath . $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                $uploadfilevoiceTH = $uploadpath . $MGame['game_nameEN'] . $i . '-' . $gamenameEN . "-voiceTH." . $extvoiceTH;
                $uploadfilevoiceEN = $uploadpath . $MGame['game_nameEN'] . $i . '-' . $gamenameEN . "-voiceEN." . $extvoiceEN;


                if (in_array($extimg, $this->arr_ext_img) && in_array($extvoiceTH, $this->arr_ext_voice)) {

                    if (move_uploaded_file($this->request->data['game2_image' . $i]['tmp_name'], $uploadfileimg)) {
                        move_uploaded_file($this->request->data['game2_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH);
                        move_uploaded_file($this->request->data['game2_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN);

                        $gamestwo->game2_nameTH = $gamenameTH;
                        $gamestwo->game2_nameEN = $gamenameEN;

                        $gamestwo->game2_voiceTH_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceTH." . $extvoiceTH;
                        $gamestwo->game2_voiceEN_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-voiceEN." . $extvoiceEN;
                        $gamestwo->game2_image_name = $MGame['game_nameEN'] . '-' . $i . $gamenameEN . "-image." . $extimg;
                        $gamestwo->game2_size = $this->request->data['game2_size' . $i];
                        $gamestwo->game_id = $MGame['id'];

                        $gamestwo->created = date("Y-m-d:H:i:s");
                        $gamestwo->updated = date("Y-m-d:H:i:s");

                        $gamestwo->game2_voiceTH_path = $urlvoiceTH;
                        $gamestwo->game2_voiceEN_path = $urlvoiceEN;
                        $gamestwo->game2_image_path = $urlimg;
                        $gamestwo->game2_complete_status = 1;

//game2-2///////////////
                        $game2num = $game2num + 1;
                        $gamestwo_2 = $this->Gamestwo->get($arrGamestwo[$game2num]['id']);
                        $game2num = $game2num + 1;

                        $gamenameTH_2 = $this->request->data['game2_2_nameTH' . $i];
                        $gamenameEN_2 = $this->request->data['game2_2_nameEN' . $i];

////////////////////////////////
                        $filenameimg_2 = $this->request->data['game2_2_image' . $i]['name'];
                        $filenamevoiceTH_2 = $this->request->data['game2_2_voiceTH' . $i]['name'];
                        $filenamevoiceEN_2 = $this->request->data['game2_2_voiceEN' . $i]['name'];
                        $extimg_2 = substr(strtolower(strrchr($filenameimg_2, '.')), 1);
                        $extvoiceTH_2 = substr(strtolower(strrchr($filenamevoiceTH_2, '.')), 1);
                        $extvoiceEN_2 = substr(strtolower(strrchr($filenamevoiceEN_2, '.')), 1);

                        $urlimg_2 = 'MiniGame2/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-image." . $extimg_2;
                        $urlvoiceTH_2 = 'MiniGame2/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceTH." . $extvoiceTH_2;
                        $urlvoiceEN_2 = 'MiniGame2/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceEN." . $extvoiceEN_2;


                        $uploadpath_2 = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame2' . DS;

                        $uploadfileimg_2 = $uploadpath_2 . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-image." . $extimg_2;
                        $uploadfilevoiceTH_2 = $uploadpath_2 . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceTH." . $extvoiceTH_2;
                        $uploadfilevoiceEN_2 = $uploadpath_2 . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceEN." . $extvoiceEN_2;

                        if (in_array($extimg_2, $this->arr_ext_img) && in_array($extvoiceTH_2, $this->arr_ext_voice)) {

                            if (move_uploaded_file($this->request->data['game2_2_image' . $i]['tmp_name'], $uploadfileimg_2)) {
                                move_uploaded_file($this->request->data['game2_2_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH_2);
                                move_uploaded_file($this->request->data['game2_2_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN_2);

                                $gamestwo_2->game2_nameTH = $gamenameTH_2;
                                $gamestwo_2->game2_nameEN = $gamenameEN_2;

                                $gamestwo_2->game2_voiceTH_name = $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceTH." . $extvoiceTH_2;
                                $gamestwo_2->game2_voiceEN_name = $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceEN." . $extvoiceEN_2;
                                $gamestwo_2->game2_image_name = $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-image." . $extimg_2;
                                $gamestwo_2->game2_size = $this->request->data['game2_2_size' . $i];
                                $gamestwo_2->game_id = $MGame['id'];

                                $gamestwo_2->created = date("Y-m-d:H:i:s");
                                $gamestwo_2->updated = date("Y-m-d:H:i:s");

                                $gamestwo_2->game2_voiceTH_path = $urlvoiceTH_2;
                                $gamestwo_2->game2_voiceEN_path = $urlvoiceEN_2;
                                $gamestwo_2->game2_image_path = $urlimg_2;
                                $gamestwo_2->game2_complete_status = 1;

                                if ($this->Gamestwo->save($gamestwo)) {
                                    $this->Gamestwo->save($gamestwo_2);
                                }
                                $this->Flash->success(_('The game has been saved.'));
                                $count++;
                            } else {
                                $this->Flash->error(_('The game could not be saved. Please, try again.'));
                            }
                        }
                    } else {
                        $this->Flash->error(_('กรุณาเลือกไฟล์ ให้ถูกประเภท '));
                    }
                    $this->Flash->error(__('The gamestwo could not be saved. Please, try again.'));
                }
            }
            if ($count == 9) {

                return $this->redirect('/gamesthree/add');
            }
        }
        $games = $this->Gamestwo->Games->find('list', ['limit' => 200]);
        $this->set(compact('gamestwo', 'games'));
        $this->set('_serialize', ['gamestwo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gamestwo id.
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

                $idroop = $this->request->data['1id' . $i];

                $gamestwo = $this->Gamestwo->get($idroop, [
                    'contain' => []
                ]);
                //game2-1///////////////////

                $gamenameTH = $this->request->data['game2_nameTH' . $i];
                $gamenameEN = $this->request->data['game2_nameEN' . $i];

                ////////////////////////////////
                $filenameimg = $this->request->data['game2_image' . $i]['name'];
                $filenamevoiceTH = $this->request->data['game2_voiceTH' . $i]['name'];
                $filenamevoiceEN = $this->request->data['game2_voiceEN' . $i]['name'];
//                $uploadpath = 'uploadfile/';



                $uploadpath = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame2' . DS;

                if ($filenameimg != "") {

                    $delfile = $MGame->game_path . $gamestwo->game2_image_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);
//                    $urlimg = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
                    $urlimg = 'MiniGame2/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
                    $uploadfileimg = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;

                    move_uploaded_file($this->request->data['game2_image' . $i]['tmp_name'], $uploadfileimg);
                    $gamestwo->game2_image_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-image." . $extimg;
                    $gamestwo->game2_image_path = $urlimg;
                }

                if ($filenamevoiceTH != "") {

                    $delfile = $MGame->game_path . $gamestwo->game2_voiceTH_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extvoiceTH = substr(strtolower(strrchr($filenamevoiceTH, '.')), 1);
//                    $urlvoiceTH = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;
                    $urlvoiceTH = 'MiniGame2/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;

                    $uploadfilevoiceTH = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;

                    move_uploaded_file($this->request->data['game2_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH);
                    $gamestwo->game2_voiceTH_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceTH." . $extvoiceTH;
                    $gamestwo->game2_voiceTH_path = $urlvoiceTH;
                }

                if ($filenamevoiceEN != "") {

                    $delfile = $MGame->game_path . $gamestwo->game2_voiceEN_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extvoiceEN = substr(strtolower(strrchr($filenamevoiceEN, '.')), 1);
//                    $urlvoiceEN = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;
                    $urlvoiceEN = 'MiniGame2/' . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;

                    $uploadfilevoiceEN = $uploadpath . $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;

                    move_uploaded_file($this->request->data['game2_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN);
                    $gamestwo->game2_voiceEN_name = $MGame['game_nameEN'] . '-' . $gamenameEN . $i . "-voiceEN." . $extvoiceEN;
                    $gamestwo->game2_voiceEN_path = $urlvoiceEN;
                }

                $gamestwo->game2_nameTH = $gamenameTH;
                $gamestwo->game2_nameEN = $gamenameEN;
                $gamestwo->game2_complete_status = 1;

                //game2-2///////////////
                $idroop2 = $this->request->data['2id' . $i];

                $gamestwo_2 = $this->Gamestwo->get($idroop2, [
                    'contain' => []
                ]);

                $gamenameTH_2 = $this->request->data['game2_2_nameTH' . $i];
                $gamenameEN_2 = $this->request->data['game2_2_nameEN' . $i];

                ////////////////////////////////
                $filenameimg_2 = $this->request->data['game2_2_image' . $i]['name'];
                $filenamevoiceTH_2 = $this->request->data['game2_2_voiceTH' . $i]['name'];
                $filenamevoiceEN_2 = $this->request->data['game2_2_voiceEN' . $i]['name'];
//                $uploadpath_2 = 'uploadfile/';



                $uploadpath_2 = 'uploadfile' . DS . $MGame->game_nameEN . DS . 'MiniGame2' . DS;

                if ($filenameimg_2 != "") {

                    $delfile = $MGame->game_path . $gamestwo_2->game2_image_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extimg_2 = substr(strtolower(strrchr($filenameimg_2, '.')), 1);
//                    $urlimg_2 = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-image." . $extimg_2;
                    $urlimg_2 = Router::url('/', true) . 'uploadfile/' . $MGame->game_nameEN . '/MiniGame2/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-image." . $extimg_2;

                    $uploadfileimg_2 = $uploadpath_2 . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-image." . $extimg_2;

                    move_uploaded_file($this->request->data['game2_2_image' . $i]['tmp_name'], $uploadfileimg_2);
                    $gamestwo_2->game2_image_name = $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-image." . $extimg_2;
                    $gamestwo_2->game2_image_path = $urlimg_2;
                }

                if ($filenamevoiceTH_2 != "") {

                    $delfile = $MGame->game_path . $gamestwo_2->game2_voiceTH_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extvoiceTH_2 = substr(strtolower(strrchr($filenamevoiceTH_2, '.')), 1);
//                    $urlvoiceTH_2 = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceTH." . $extvoiceTH_2;
                    $urlvoiceTH_2 = Router::url('/', true) . 'uploadfile/' . $MGame->game_nameEN . '/MiniGame2/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceTH." . $extvoiceTH_2;

                    $uploadfilevoiceTH_2 = $uploadpath_2 . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceTH." . $extvoiceTH_2;

                    move_uploaded_file($this->request->data['game2_2_voiceTH' . $i]['tmp_name'], $uploadfilevoiceTH_2);
                    $gamestwo_2->game2_voiceTH_name = $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceTH." . $extvoiceTH_2;
                    $gamestwo_2->game2_voiceTH_path = $urlvoiceTH_2;
                }

                if ($filenamevoiceEN_2 != "") {

                    $delfile = $MGame->game_path . $gamestwo_2->game2_voiceEN_path;
                    $file = new File(WWW_ROOT . $delfile, false, 0777);
                    $file->delete();

                    $extvoiceEN_2 = substr(strtolower(strrchr($filenamevoiceEN_2, '.')), 1);
//                    $urlvoiceEN_2 = Router::url('/', true) . 'uploadfile/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceEN." . $extvoiceEN_2;
                    $urlvoiceEN_2 = Router::url('/', true) . 'uploadfile/' . $MGame->game_nameEN . '/MiniGame2/' . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceEN." . $extvoiceEN_2;

                    $uploadfilevoiceEN_2 = $uploadpath_2 . $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceEN." . $extvoiceEN_2;

                    move_uploaded_file($this->request->data['game2_2_voiceEN' . $i]['tmp_name'], $uploadfilevoiceEN_2);
                    $gamestwo_2->game2_voiceEN_name = $MGame['game_nameEN'] . '-' . $gamenameEN_2 . $i . "-voiceEN." . $extvoiceEN_2;
                    $gamestwo_2->game2_voiceEN_path = $urlvoiceEN_2;
                }

                $gamestwo_2->game2_nameTH = $gamenameTH_2;
                $gamestwo_2->game2_nameEN = $gamenameEN_2;
                $gamestwo_2->game2_complete_status = 1;

                /////////////////

                if ($this->Gamestwo->save($gamestwo)) {
                    $this->Gamestwo->save($gamestwo_2);

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

                    if ($countgameone == 9 && $countgamethree == 9 && $countgamefour == 20) {
                        $game = $this->Games->get($idQury);
                        $game->game_complete_status = 1;
                        $this->Games->save($game);
                    }
                }

                return $this->redirect('/games/listEditPage');
            }
        }
        $where = [];
        array_push($where, ['Gamestwo.game_id' => $idQury]);

        $gamestwo = $this->Gamestwo->find('all', array('order' => 'Gamestwo.game2_number ASC'))
                ->where($where);

        $where2 = [];
        array_push($where2, ['Gamestwo.game_id' => $idQury, 'Gamestwo.game2_size' => 'l']);

        $gamestwoL = $this->Gamestwo->find('all', array('order' => 'Gamestwo.game2_number ASC'))
                ->where($where2);

        $where3 = [];
        array_push($where3, ['Gamestwo.game_id' => $idQury, 'Gamestwo.game2_size' => 's']);

        $gamestwoS = $this->Gamestwo->find('all', array('order' => 'Gamestwo.game2_number ASC'))
                ->where($where3);

        $this->set(compact('gamestwo', 'gamestwoL', 'gamestwoS'));
        $this->set('_serialize', ['gamestwo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gamestwo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $gamestwo = $this->Gamestwo->get($id);
        if ($this->Gamestwo->delete($gamestwo)) {
            $this->Flash->success(__('The gamestwo has been deleted.'));
        } else {
            $this->Flash->error(__('The gamestwo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
