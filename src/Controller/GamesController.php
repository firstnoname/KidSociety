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
 * Games Controller
 *
 * @property \App\Model\Table\GamesTable $Games
 */
class GamesController extends AppController {

    public $Gamesone = null;
    public $Gamestwo = null;
    public $Gamesthree = null;
    public $Gamesfour = null;
    public $Activecodes = null;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Gamesone = TableRegistry::get('Gamesone');
        $this->Gamestwo = TableRegistry::get('Gamestwo');
        $this->Gamesthree = TableRegistry::get('Gamesthree');
        $this->Gamesfour = TableRegistry::get('Gamesfour');
        $this->Activecodes = TableRegistry::get('Activecodes');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {

        $loginuser = $this->request->session()->read('user');
//        $this->request->session()->destroy();
        $this->request->session()->delete('where');
//        $this->request->session()->write('uqser', $loginuser);
        if ($loginuser[0]['status'] == 1) {
            $status1 = '';
            $status2 = 'style="display:none"';
        } else if ($loginuser[0]['status'] == 2) {
            $status1 = 'style="display:none"';
            $status2 = '';
        } else {
            return $this->redirect('/accounts/login');
        }


//        $games = $this->paginate($this->Games, array('order' => 'Games.created ASC'));
        $games = $this->Games->find('all', array('order' => 'Games.created ASC'));
        $this->request->session()->delete('where');
        $this->set(compact('games', 'status1', 'status2', $this->paginate($games)));
        $this->set('_serialize', ['games']);
    }

    /**
     * View method
     *
     * @param string|null $id Game id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $game = $this->Games->get($id, [
            'contain' => []
        ]);

        $this->set('game', $game);
        $this->set('_serialize', ['game']);
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
        //  $game = $this->Games->newEntity();
        $game = "";
        if ($this->request->is('post')) {

            $filenameimg = $this->request->data['game_image']['name'];
            $filenamevoice = $this->request->data['game_voice']['name'];
            $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);
            $extvoice = substr(strtolower(strrchr($filenamevoice, '.')), 1);
            ////// new folder
            new Folder(WWW_ROOT . 'uploadfile' . DS . $this->request->getData('game_nameEN'), true, 0755);
            new Folder(WWW_ROOT . 'uploadfile' . DS . $this->request->getData('game_nameEN') . DS . 'MiniGame1', true, 0755);
            new Folder(WWW_ROOT . 'uploadfile' . DS . $this->request->getData('game_nameEN') . DS . 'MiniGame2', true, 0755);
            new Folder(WWW_ROOT . 'uploadfile' . DS . $this->request->getData('game_nameEN') . DS . 'MiniGame3', true, 0755);
            new Folder(WWW_ROOT . 'uploadfile' . DS . $this->request->getData('game_nameEN') . DS . 'MiniGame4', true, 0755);
//////

            $urlimg = 'uploadfile/' . $this->request->getData('game_nameEN') . '/' . $this->request->getData('game_nameEN') . "-image." . $extimg;
            $urlvoice = 'uploadfile/' . $this->request->getData('game_nameEN') . '/' . $this->request->getData('game_nameEN') . "-voice." . $extvoice;
            $uploadpath = 'uploadfile/' . $this->request->getData('game_nameEN') . '/';

            $uploadfileimg = $uploadpath . $this->request->getData('game_nameEN') . "-image." . $extimg;
            $uploadfilevoice = $uploadpath . $this->request->getData('game_nameEN') . "-voice." . $extvoice;

            if (move_uploaded_file($this->request->data['game_image']['tmp_name'], $uploadfileimg)) {
                move_uploaded_file($this->request->data['game_voice']['tmp_name'], $uploadfilevoice);
                $game = $this->Games->newEntity();
                $game->game_nameTH = $this->request->getData('game_nameTH');
                $game->game_nameEN = $this->request->getData('game_nameEN');
                $game->game_path = $uploadpath;

                $game->game_image_name = $this->request->getData('game_nameEN') . "-image." . $extimg;
                $game->game_voice_name = $this->request->getData('game_nameEN') . "-voice." . $extvoice;
                $game->created = date("Y-m-d:H:i:s");
                $game->updated = date("Y-m-d:H:i:s");
                $game->game_image_path = $urlimg;
                $game->game_voice_path = $urlvoice;
                $game->game_complete_status = 0;

                if ($this->Games->save($game)) {
                    $this->Flash->success(_('The game has been saved.'));
                    $this->request->session()->write('game', $game);

                    for ($i = 1; $i <= 9; $i++) {
                        $gamesone = $this->Gamesone->newEntity();
                        $gamesone->game1_number = $i;
                        $gamesone->game_id = $game->id;
                        $gamesone->game1_complete_status = 0;
                        $this->Gamesone->save($gamesone);
                    }

                    $game2num = 0;
                    for ($i = 1; $i <= 9; $i++) {
                        $gamestwo = $this->Gamestwo->newEntity();
                        $game2num = $game2num + 1;
                        $gamestwo->game2_number = $game2num;
                        $gamestwo->game_id = $game->id;
                        $gamestwo->game2_size = 's';
                        $gamestwo->game_complete_status = 0;
                        $this->Gamestwo->save($gamestwo);

                        $gamestwo2 = $this->Gamestwo->newEntity();
                        $game2num = $game2num + 1;
                        $gamestwo2->game2_number = $game2num;
                        $gamestwo2->game_id = $game->id;
                        $gamestwo2->game2_size = 'l';
                        $gamestwo2->game_complete_status = 0;
                        $this->Gamestwo->save($gamestwo2);
                    }

                    for ($i = 1; $i <= 9; $i++) {
                        $gamesthree = $this->Gamesthree->newEntity();
                        $gamesthree->game3_number = $i;
                        $gamesthree->game_id = $game->id;
                        $gamesthree->game_complete_status = 0;
                        $this->Gamesthree->save($gamesthree);
                    }

                    $arrcolor = array(1 => 'เหลือง', 2 => 'ม่วง', 3 => 'น้ำเงิน', 4 => 'ชมพู', 5 => 'แดง', 6 => 'ขาว', 7 => 'ส้ม', 8 => 'เขียว', 9 => 'น้ำตาล', 10 => 'ดำ');
                    $nextnum = 1;
                    for ($i = 1; $i <= 10; $i++) {
                        for ($j = 1; $j <= 2; $j++) {
                            $gamesfour = $this->Gamesfour->newEntity();
                            $gamesfour->game4_number = $nextnum;
                            $gamesfour->game_id = $game->id;
                            $gamesfour->game4_color = $arrcolor[$i];
                            $gamesfour->game_complete_status = 0;
                            $this->Gamesfour->save($gamesfour);
                            $nextnum++;
                        }
                    }

                    return $this->redirect('/gamesone/add');
                } else {
                    $this->Flash->error(_('The game could not be saved. Please, try again.'));
                }
            }
        }

        $this->set(compact('game'));
        $this->set('_serialize', ['game']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Game id.
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

        $game = $this->Games->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $filenameimg = $this->request->data['game_image']['name'];
            $filenamevoice = $this->request->data['game_voice']['name'];
//            $uploadpath = 'uploadfile/';
            $nameEN = $this->request->getData('game_nameEN');
            if ($nameEN != '') {
                $uploadpath = 'uploadfile/' . $this->request->getData('game_nameEN') . '/';
                rename($game->game_path, $uploadpath);
                $game->game_path = $uploadpath;
                $game->game_image_path = $uploadpath . $game->game_image_name;
                $game->game_voice_path = $uploadpath . $game->game_voice_name;
            }

            if ($filenameimg != "") {

                $delfile = $game->game_image_path;
                $file = new File(WWW_ROOT . $delfile, false, 0777);
                $file->delete();

                $extimg = substr(strtolower(strrchr($filenameimg, '.')), 1);
//                $urlimg = Router::url('/', true) . 'uploadfile/' . $this->request->getData('game_nameEN') . "-image." . $extimg;
                $urlimg = $this->request->getData('game_nameEN') . '/' . $this->request->getData('game_nameEN') . "-image." . $extimg;
//                $uploadfileimg = $uploadpath . $this->request->getData('game_nameEN') . "-image." . $extimg;
                $uploadfileimg = $uploadpath . $this->request->getData('game_nameEN') . "-image." . $extimg;

                move_uploaded_file($this->request->data['game_image']['tmp_name'], $uploadfileimg);

                $game->game_image_name = $this->request->getData('game_nameEN') . "-image." . $extimg;
                $game->game_image_path = $urlimg;
            }

            if ($filenamevoice != "") {

                $delfile = $game->game_voice_path;
                $file = new File(WWW_ROOT . $delfile, false, 0777);
                $file->delete();

                $extvoice = substr(strtolower(strrchr($filenamevoice, '.')), 1);
//                $urlvoice = Router::url('/', true) . 'uploadfile/' . $this->request->getData('game_nameEN') . "-voice." . $extvoice;
                $urlvoice = $this->request->getData('game_nameEN') . '/' . $this->request->getData('game_nameEN') . "-voice." . $extvoice;

//                $uploadfilevoice = $uploadpath . $this->request->getData('game_nameEN') . "-voice." . $extvoice;
                $uploadfilevoice = $uploadpath . $this->request->getData('game_nameEN') . "-voice." . $extvoice;

                move_uploaded_file($this->request->data['game_voice']['tmp_name'], $uploadfilevoice);

                $game->game_voice_name = $this->request->getData('game_nameEN') . "-voice." . $extvoice;
                $game->game_voice_path = $urlvoice;
            }

            $game->game_nameTH = $this->request->getData('game_nameTH');
            $game->game_nameEN = $this->request->getData('game_nameEN');

            if ($this->Games->save($game)) {
                $this->Flash->success(_('The game has been saved.'));

                return $this->redirect('/games/ListEditPage');
            } else {
                $this->Flash->error(_('The game could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('game'));
        $this->set('_serialize', ['game']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Game id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
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

        $this->request->allowMethod(['post', 'delete']);
        $game = $this->Games->get($id);

//        $deletepath = 'uploadfile/'.$game->game_nameEN;

        $this->Gamesone->deleteAll(array('Gamesone.game_id' => $game->id), false);

        $this->Gamestwo->deleteAll(array('Gamestwo.game_id' => $game->id), false);

        $this->Gamesthree->deleteAll(array('Gamesthree.game_id' => $game->id), false);

        $this->Gamesfour->deleteAll(array('Gamesfour.game_id' => $game->id), false);

//        $this->Activatecodes->deleteAll(array('Activatecodes.game_id' => $game->id), false);

        $delfile = $game->game_path;
        $folder = new Folder(WWW_ROOT . $delfile, false, 0777);
        $folder->delete();

        if ($this->Games->delete($game)) {
            $this->Flash->success(__('The game has been deleted.'));
        } else {
            $this->Flash->error(__('The game could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function downloadresult($id = null) {
        
    }

    public function ListEditPage($id = null) {
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

//        $where = [];
        if ($id == null) {
            $editGame = $this->request->session()->read('editgame');
            $id = $editGame['id'];
        }
//        $this->request->session()->destroy('editgame');
        $games = $this->Games->get($id, [
            'contain' => []
        ]);

        $this->request->session()->write('editgame', $games);
        $this->set(compact('games'));
        $this->set('_serialize', ['games']);
    }

    public function download($id = null) {

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

        $ac_code = $this->request->getData('ac_code');

        $queryaccode = $this->Activecodes->find('all', [
            'conditions' => ['Activecodes.ac_code' => $ac_code]
        ]);

        $arractivecode = $queryaccode->toArray();

        if ($arractivecode == null) {
            $this->Flash->error(_('ไม่พบรหัส หรือ มีผู้ใช้อื่นใช้รหัสนี้แล้ว'));
            return $this->redirect('/games/downloadresult');
        }

        $activecode = $this->Activecodes->get($arractivecode[0]['id']);
        if ($activecode->code_status == 1) {
            $activecode->code_status = 2;
            $activecode->account_id = $loginuser[0]['id'];
            $this->Activecodes->save($activecode);
        } else if ($activecode->code_status == 2 && $activecode->account_id != $loginuser[0]['id']) {
            $this->Flash->error(_('ไม่พบรหัส หรือ มีผู้ใช้อื่นใช้รหัสนี้แล้ว'));
            return $this->redirect('/games/downloadresult');
        }

        $game = $this->Games->get($activecode->game_id);
//        $game = $qureygame->toArray();
//        
        ////////////// mini 1//////////////////
        $queryone = $this->Gamesone->find('all', [
            'conditions' => ['Gamesone.game_id' => $game->id],
            'order' => ['Gamesone.game1_number ASC']
        ]);
        $gamesone = $queryone->toArray();


        $count = 0;
        $countVe = 0;
        $countVt = 1;
        $minigames1 = [];
        $dir = new Folder(WWW_ROOT . 'uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame1');
        $imgfiles = $dir->find('.*\.jpg');
        $mp3files = $dir->find('.*\.mp3');
        foreach ($gamesone as $gameone) {


            $one['game1_nameTH'] = $gameone['game1_nameTH'];
            $one['game1_nameEN'] = $gameone['game1_nameEN'];
            $one['game1_image_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame1' . DS . $imgfiles[$count]));
            $one['game1_voiceEN_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame1' . DS . $mp3files[$countVe]));
            $one['game1_voiceTH_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame1' . DS . $mp3files[$countVt]));

            array_push($minigames1, $one);
            $count++;
            $countVt += 2;
            $countVe += 2;
        }
/////////////////////////////   mini 2  ///////////////////////////////
        $querytwo = $this->Gamestwo->find('all', [
            'conditions' => ['Gamestwo.game_id' => $game->id],
            'order' => ['Gamestwo.game2_number ASC']
        ]);
        $gamestwo = $querytwo->toArray();

        $count2 = 0;
        $countVe2 = 0;
        $countVt2 = 1;
        $minigames2 = [];
        $dir2 = new Folder(WWW_ROOT . 'uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame2');
        $imgfiles2 = $dir2->find('.*\.jpg');
        $mp3files2 = $dir2->find('.*\.mp3');
        foreach ($gamestwo as $gametwo) {


            $two['game2_nameTH'] = $gametwo['game2_nameTH'];
            $two['game2_nameEN'] = $gametwo['game2_nameEN'];
            $two['game2_size'] = $gametwo['game2_size'];
            $two['game2_image_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame2' . DS . $imgfiles2[$count2]));
            $two['game2_voiceEN_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame2' . DS . $mp3files2[$countVe2]));
            $two['game2_voiceTH_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame2' . DS . $mp3files2[$countVt2]));

            array_push($minigames2, $two);
            $count2++;
            $countVt2 += 2;
            $countVe2 += 2;
        }
        /////////////////////////////   mini 3  ///////////////////////////////
        $querythree = $this->Gamesthree->find('all', [
            'conditions' => ['Gamesthree.game_id' => $game->id],
            'order' => ['Gamesthree.game3_number ASC']
        ]);
        $gamesthree = $querythree->toArray();

        $count3 = 0;
        $countVe3 = 0;
        $countVt3 = 1;
        $minigames3 = [];
        $dir3 = new Folder(WWW_ROOT . 'uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame3');
        $imgfiles3 = $dir3->find('.*\.jpg');
        $mp3files3 = $dir3->find('.*\.mp3');
        foreach ($gamesthree as $gamethree) {


            $three['game3_nameTH'] = $gamethree['game3_nameTH'];
            $three['game3_nameEN'] = $gamethree['game3_nameEN'];
            $three['game3_duration'] = $gamethree['game3_duration'];
            $three['game3_image_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame3' . DS . $imgfiles3[$count3]));
            $three['game3_voiceEN_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame3' . DS . $mp3files3[$countVe3]));
            $three['game3_voiceTH_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame3' . DS . $mp3files3[$countVt3]));

            array_push($minigames3, $three);
            $count3++;
            $countVt3 += 2;
            $countVe3 += 2;
        }
        /////////////////////////////   mini 4  ///////////////////////////////
        $queryfour = $this->Gamesfour->find('all', [
            'conditions' => ['Gamesfour.game_id' => $game->id],
            'order' => ['Gamesfour.game4_number ASC']
        ]);
        $gamesfour = $queryfour->toArray();

        $count4 = 0;
        $countVe4 = 0;
        $countVt4 = 1;
        $minigames4 = [];
        $dir4 = new Folder(WWW_ROOT . 'uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame4');
        $imgfiles4 = $dir4->find('.*\.jpg');
        $mp3files4 = $dir4->find('.*\.mp3');
        foreach ($gamesfour as $gamefour) {


            $four['game4_nameTH'] = $gamefour['game4_nameTH'];
            $four['game4_nameEN'] = $gamefour['game4_nameEN'];
            $four['game4_color'] = $gamefour['game4_color'];
            $four['game4_image_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame4' . DS . $imgfiles4[$count4]));
            $four['game4_voiceEN_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame4' . DS . $mp3files4[$countVe4]));
            $four['game4_voiceTH_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . 'MiniGame4' . DS . $mp3files4[$countVt4]));

            array_push($minigames4, $four);
            $count4++;
            $countVt4 += 2;
            $countVe4 += 2;
        }

        //////////////////Big game ///////////////////
        $dirbig = new Folder(WWW_ROOT . 'uploadfile' . DS . $game['game_nameEN']);
        $imgfilesbig = $dirbig->find('.*\.jpg');
        $mp3filesbig = $dirbig->find('.*\.mp3');

        $Biggames['game_nameTH'] = $game['game_nameTH'];
        $Biggames['game_nameEN'] = $game['game_nameEN'];
        $Biggames['game_image_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . $imgfilesbig[0]));
        $Biggames['game_voice_name'] = base64_encode(file_get_contents('uploadfile' . DS . $game['game_nameEN'] . DS . $mp3filesbig[0]));
        $Biggames['Minigame1'] = $minigames1;
        $Biggames['Minigame2'] = $minigames2;
        $Biggames['Minigame3'] = $minigames3;
        $Biggames['Minigame4'] = $minigames4;

        $json = json_encode($Biggames);

        $file = new File(APP . DS . 'jsonfile' . DS . $game['game_nameEN'] . '.json', true, 0777);
        $file->write($json);

        $this->response->file('jsonfile' . DS . $game['game_nameEN'] . '.json', array('download' => true, 'name' => $game['game_nameEN'] . '.json'));
        //$delfile = new File(APP . DS . 'jsonfile' . DS . $games['game_nameEN']);
        // $delfile->delete();
        $this->autoRender = false;
//        return $this->redirect('/games/downloadresult');
    }

}
