<?php

namespace App\Controller;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 *
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AddtasksController extends AppController {

    public function moreinfo($taskid = null, $propertiesid = null, $id = null) {
        $this->Properties = TableRegistry::get('Properties');
        $this->Addtasks = TableRegistry::get('Addtasks');
        $this->Addtaskinfos = TableRegistry::get('Addtaskinfos');
        $this->Tasks = TableRegistry::get('Tasks');

        $filldetail = $this->Tasks->find('all', [
                    'conditions' => ['AND' => ['Tasks.name LIKE' => '%' . 'repairs needed' . '%'], ['Tasks.id' => $taskid]]
                ])->first();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $checktask = $this->Addtasks->find('all', ['conditions' => ['AND' => ['Addtasks.properties_id' => $propertiesid, 'Addtasks.task_id' => $taskid]]]);
            $checktask = $checktask->toArray();
            if (!empty($checktask)) {
                $addtask = $this->Addtasks->get($checktask[0]['id']);
                $addtask = $this->Addtasks->patchEntity($addtask, $this->request->getData());
                $addtask->comments = $this->request->getData('comments');
                $addtask->how_many = $this->request->getData('how_many');
                $this->Addtasks->save($addtask);
            }
            $data = $this->request->getData();
            if ($data['file'][0]['error'] == 4) {
                
            } else {
                $mm_dir = new Folder(WWW_ROOT . 'task_dir', true, 0755);
                for ($i = 0; $i < count($data['file']); $i++) {
//                     if($data['file'][$i]['name']!=''){
                    $validextensions = array("jpeg", "jpg", "png");
                    $ext = explode('.', basename($data['file'][$i]['name']));
                    $file_extension = end($ext);
                    $unique = md5(uniqid());
                    $target_path = $mm_dir->pwd() . DS . $unique . $data['file'][$i]['name'];
                    move_uploaded_file($data['file'][$i]['tmp_name'], $target_path);
//                         $j = $j + 1;
                    $addtaskinfos = $this->Addtaskinfos->newEntity();
                    $addtaskinfos = $this->Addtaskinfos->patchEntity($addtaskinfos, $this->request->getData());
                    $addtaskinfos->addtasks_id = $id;
                    $addtaskinfos->image = $unique . $data['file'][$i]['name'];
                    $this->Addtaskinfos->save($addtaskinfos);

//                        }else{
//                            $this->Flash->error(__('Unable to add More Info.'));
//                        }
                    $this->Flash->success(__('More Info has been saved.'));
                }
            }
        }
        $checktasks = $this->Addtasks->find('all', ['conditions' => ['AND' => ['Addtasks.properties_id' => $propertiesid, 'Addtasks.task_id' => $taskid]]]);
        $checktask = $checktasks->first();

        $image = $this->Addtaskinfos->find('all', ['conditions' => ['Addtaskinfos.addtasks_id' => $id]])->toArray();
        $this->set(compact('checktask', 'image', 'filldetail'));
    }

    public function viewmoreinfo($taskid = null, $propertiesid = null, $id = null) {

        $this->Properties = TableRegistry::get('Properties');
        $this->Addtasks = TableRegistry::get('Addtasks');
        $this->Addtaskinfos = TableRegistry::get('Addtaskinfos');
        if ($this->request->is(['patch', 'post', 'put'])) {

            $checktask = $this->Addtasks->find('all', ['conditions' => ['AND' => ['Addtasks.properties_id' => $propertiesid, 'Addtasks.task_id' => $taskid]]]);
            $checktask = $checktask->toArray();
            if (!empty($checktask)) {
                $addtask = $this->Addtasks->get($checktask[0]['id']);
                $addtask = $this->Addtasks->patchEntity($addtask, $this->request->getData());
                $addtask->comments = $this->request->getData('comments');
                $addtask->how_many = $this->request->getData('how_many');
                $this->Addtasks->save($addtask);
            }


            $data = $this->request->getData();
            $mm_dir = new Folder(WWW_ROOT . 'task_dir', true, 0755);
            for ($i = 0; $i < count($data['file']); $i++) {
//                     if($data['file'][$i]['name']!=''){
                $validextensions = array("jpeg", "jpg", "png");
                $ext = explode('.', basename($data['file'][$i]['name']));
                $file_extension = end($ext);
                $unique = md5(uniqid());
                $target_path = $mm_dir->pwd() . DS . $unique . $data['file'][$i]['name'];
                move_uploaded_file($data['file'][$i]['tmp_name'], $target_path);
//                         $j = $j + 1;
                $addtaskinfos = $this->Addtaskinfos->newEntity();
                $addtaskinfos = $this->Addtaskinfos->patchEntity($addtaskinfos, $this->request->getData());
                $addtaskinfos->addtasks_id = $id;
                $addtaskinfos->image = $unique . $data['file'][$i]['name'];
                if ($this->Addtaskinfos->save($addtaskinfos)) {
                    $this->Flash->success(__('More Info has been saved.'));
                } else {
                    $this->Flash->error(__('Unable to add More Info.'));
                }
            }
        }
        $checktasks = $this->Addtasks->find('all', ['conditions' => ['AND' => ['Addtasks.properties_id' => $propertiesid, 'Addtasks.task_id' => $taskid]]]);
        $checktask = $checktasks->first();

        $image = $this->Addtaskinfos->find('all', ['conditions' => ['Addtaskinfos.addtasks_id' => $id]])->toArray();
        $this->set(compact('checktask', 'image'));
    }

    public function taskdetails($id = null) {
        $this->Properties = TableRegistry::get('Properties');
        $this->Addtasks = TableRegistry::get('Addtasks');
        $this->Users = TableRegistry::get('Users');
        $this->Buildings = TableRegistry::get('Buildings');
        $this->Floors = TableRegistry::get('Floors');
        $this->Apartments = TableRegistry::get('Apartments');
        $this->Rooms = TableRegistry::get('Rooms');
        $this->Stages = TableRegistry::get('Stages');
        $this->Tasks = TableRegistry::get('Tasks');
        $propertys = $this->Properties->find('all')->where(['Properties.id' => $id]);
        $property = $propertys->toArray();
        $query = $this->Buildings->find('list')
                ->where(['Buildings.properties_id' => $id]);
        $building = $query->toArray();
        $subcontractor = $this->Users->find('all', [
                    'conditions' => ['Users.role' => 'subcontractor'],
                ])->toArray();
        $stage = $this->Stages->find('all')->toArray();
        $tasks = $this->Tasks->find('all', [ 'contain' => ['Addtasks']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $dat = $this->request->getData();
            $flash = 0;
            foreach ($dat['radio'] as $index => $data) {
                if (isset($data['change'])) {
                    if ($data['change'] == '1') {
                        if ($data['subid'] == '') {
                            $flash = 1;
                        } else {
                            $checktask = $this->Addtasks->find('all', ['conditions' => ['AND' => ['Addtasks.properties_id' => $id, 'Addtasks.task_id' => $data['taskid']]]]);
                            $checktask = $checktask->toArray();
                            if (!empty($checktask)) {

                                $addtask = $this->Addtasks->get($checktask[0]['id']);
                                $addtask = $this->Addtasks->patchEntity($addtask, $this->request->getData());
                                $addtask->properties_id = $id;
                                $addtask->buildings_id = $this->request->getData('buildid');
                                $addtask->floors_id = $this->request->getData('floorid');
                                $addtask->apartments_id = $this->request->getData('apartid');
                                $addtask->rooms_id = $this->request->getData('roomid');
                                $addtask->task_id = $data['taskid'];
                                $addtask->users_id = $data['subid'];
                                $savedata = $this->Addtasks->save($addtask);
                                //     echo "<pre>";print_r($addtask);echo"</pre>"; exit;
                                $user = $this->Addtasks->find('all', [
                                            'conditions' => ['Addtasks.id' => $savedata->id],
                                            'contain' => ['Users']
                                        ])->first();
                                $passkey = uniqid();
                                $url = Router::Url(['controller' => 'addtasks', 'action' => 'taskemail'], true) . '/' . $passkey . '/' . $user->task_id;
                                $timeout = time() + DAY;
                                $this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['id' => $user->users_id]);
                                $this->userstatus($url, $user);
                            } else {
                                $addtask = $this->Addtasks->newEntity();
                                $addtask = $this->Addtasks->patchEntity($addtask, $this->request->getData());
                                $addtask->properties_id = $id;
                                $addtask->buildings_id = $this->request->getData('buildid');
                                $addtask->floors_id = $this->request->getData('floorid');
                                $addtask->apartments_id = $this->request->getData('apartid');
                                $addtask->rooms_id = $this->request->getData('roomid');
                                $addtask->task_id = $data['taskid'];
                                $addtask->users_id = $data['subid'];
                                $this->Addtasks->save($addtask);
                                $useremails = $this->Addtasks->find('all', [
                                            'conditions' => ['AND' => ['Addtasks.users_id' => $data['subid'], 'Addtasks.task_id' => $data['taskid']]],
                                            'contain' => 'Users'
                                        ])->first();
                                //       echo "<pre>";print_r($useremails);echo"</pre>"; exit;
                                $user = $useremails;
                                $passkey = uniqid();
                                $url = Router::Url(['controller' => 'addtasks', 'action' => 'taskemail'], true) . '/' . $passkey . '/' . $user->task_id;
                                $timeout = time() + DAY;
                                $this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['id' => $user->id]);
                                $this->userstatus($url, $user);
                            }
                        }
                    } else {
                        $checktask = $this->Addtasks->find('all', ['conditions' => ['AND' => ['Addtasks.properties_id' => $id, 'Addtasks.task_id' => $data['taskid']]]]);
                        $checktask = $checktask->toArray();
                        if (!empty($checktask)) {
                            $addtask = $this->Addtasks->get($checktask[0]['id']);
                            if ($this->Addtasks->delete($addtask)) {
                                $this->Flash->success(__('The property has been saved.'));
                            } else {
                                $this->Flash->error(__('The property could not be saved. Please, try again.'));
                            }
                        }
                    }
                    if ($index == count($dat['radio']) - 1) {
                        $this->Flash->success(__('You can update more info and history.'));
                    }
                }
            }
            if ($flash == 1) {
                $this->Flash->error(__('Select Sub Contractor'));
            }
            return $this->redirect([ 'controller' => 'addtasks', 'action' => 'taskdetails/' . $id]);
        }
        $this->paginate = [
            'limit' => 20,
        ];
        $task = $this->paginate($tasks);
        $this->set(compact('property', 'building', 'task', 'subcontractor', 'stage'));
    }

    private function userstatus($url, $user) {
        $email = new Email();
        $email->template('taskemail');
        $email->emailFormat('both');
        $email->from('no-reply@babita.gangtask.com');
        $email->to($user->user->email, $user->user->name);
        $email->subject('assigned a task');
        $email->viewVars(['url' => $url, 'username' => $user->name]);
        if ($email->send()) {
            $this->Flash->success(__('Email sent successfully to all the concerned users'));
        } else {
            $this->Flash->error(__('Error sending email: ') . $email->smtpError);
        }
    }

    public function updatestatus() {
        $sta = $this->request->getData('status');
        $taskdata = $this->request->getData('data');
        $updatetask = $this->Addtasks->find('all', [
                    'conditions' => ['Addtasks.properties_id' => $taskdata]
                ])->first();
        $query = $this->Addtasks->query();
        $query->update()
        ->set(['mailstatus' => $sta])
        ->where(['id' => $updatetask->id])
        ->execute();
        if($query){
            $request['status'] = true;
        }else{
            $request['status'] = false;
        }
            echo json_encode($request);
            exit;
        
    }

    public function taskemail($passkey = null, $task_id = null) {
        $this->viewBuilder()->setLayout('start');

        if ($passkey) {
            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $user = $query->first();
            //       echo "<pre>"; print_r($user); echo"</pre>"; exit;
            $task = $this->Addtasks->find('all', [
                        'conditions' => ['AND' => ['Addtasks.users_id' => $user->id, 'Addtasks.task_id' => $task_id]],
                        'contain' => ['Users', 'Tasks', 'Properties']
                    ])->first();

            $this->set(compact('task'));
        } else {
            $this->redirect('/');
        }
    }

    public function history($taskid = null, $propertiesid = null, $id = null) {
        $this->Addtaskinfos = TableRegistry::get('Addtaskinfos');
        $taskdetail = $this->Addtasks->find('all', ['conditions' => ['Addtasks.id' => $id]])->contain(['Tasks', 'Users', 'Addtaskinfos'])->toArray();

        $this->set(compact('taskdetail'));
    }

    public function seachbuilding() {
        $data = $this->request->getData();
        $this->Buildings = TableRegistry::get('Buildings');
        $query = $this->Buildings->find('list')
                ->where(['Buildings.properties_id' => $data['propertyid']]);
        $building = $query->toArray();
//        print_r($floor) ;
//        exit;
        $request['data'] = $building;

        echo json_encode($request);
        exit;
    }

    public function addtasklist() {

        $this->Properties = TableRegistry::get('Properties');
        $this->Addtasks = TableRegistry::get('Addtasks');
        $this->Users = TableRegistry::get('Users');
        $this->Buildings = TableRegistry::get('Buildings');
        $this->Floors = TableRegistry::get('Floors');
        $this->Apartments = TableRegistry::get('Apartments');
        $this->Rooms = TableRegistry::get('Rooms');
        $this->Stages = TableRegistry::get('Stages');
        $this->Tasks = TableRegistry::get('Tasks');
        $taskdetails = $this->Addtasks->find('all')->contain(['Tasks', 'Users', 'Addtaskinfos', 'Properties', 'Stages']);
//                ->toArray();
        $propertys = $this->Properties->find('all');
        $property = $propertys->toArray();

        if ($this->request->is(['patch', 'post', 'put'])) {
//        echo "<pre>";
//        print_r($this->request->getData());
//        echo "</pre>";      
            $conditions = [];
            if ($this->request->getData('propertyid')) {
                $conditions['Addtasks.properties_id'] = $this->request->getData('propertyid');
            }
            if ($this->request->getData('buildid')) {
                $conditions['Addtasks.buildings_id'] = $this->request->getData('buildid');
            }
            if ($this->request->getData('floorid')) {
                $conditions['Addtasks.floors_id'] = $this->request->getData('floorid');
            }
            if ($this->request->getData('apartid')) {
                $conditions['Addtasks.apartments_id'] = $this->request->getData('apartid');
            }
            if ($this->request->getData('roomid')) {
                $conditions['Addtasks.rooms_id'] = $this->request->getData('roomid');
            }

            $taskdetails = $this->Addtasks->find('all')->where($conditions)->contain(['Tasks', 'Users', 'Addtaskinfos', 'Properties', 'Stages']);
//                    ->toArray();
            if (empty($taskdetails)) {
                $taskdetails = $this->Addtasks->newEntity();
            }
        }
        $this->paginate = [
            'limit' => 10,
        ];

        $taskdetails = $this->paginate($taskdetails);
//             echo "<pre>";
//            print_r($taskdetails);
//            echo "</pre>";
        $this->set(compact('taskdetails', 'property', 'building', 'task', 'subcontractor', 'stage'));

        // $this->set(compact('taskdetails'));
    }

    public function subcontractorview($id = null) {
        $query = $this->Addtasks->find('all')
                ->where(['Addtasks.users_id' => $id])
                ->order(['Addtasks.created' => 'DESC'])
                ->contain(['Properties', 'Tasks']);
        //     echo "<pre>"; echo print_r($query); echo "</pre>"; exit;
        $addtask = $this->paginate($query);

        $this->set(compact('addtask'));
    }

    public function subcontractorstatus($id = null, $user_id = null, $propertyid, $status = null) {
        $add = $this->Addtasks->find('all', ['conditions' => [ 'AND' => ['Addtasks.users_id' => $user_id, 'Addtasks.task_id' => $id, 'Addtasks.properties_id' => $propertyid]]]);
        $add = $add->first()->toArray();
        $add = $this->Addtasks->get($add['id']);
        $add = $this->Addtasks->patchEntity($add, $this->request->getData());
        $add['subcontstatus'] = $status;
        if ($this->Addtasks->save($add)) {
            $this->Flash->success(__('The detail is updated.'));
        } else {
            $this->Flash->error(__('The detail could not be updated. Please, try again.'));
        }
        return $this->redirect(['controller' => 'addtasks', 'action' => 'subcontractorview', $user_id]);
    }

    public function addnotes($id = null, $user_id = null) {
        $addtask = $this->Addtasks->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->request->getData('subcontnotes') != '') {
                $addtask = $this->Addtasks->patchEntity($addtask, $this->request->getData());
                $addtask['subcontnotes'] = $this->request->getData('subcontnotes');
                if ($this->Addtasks->save($addtask)) {
                    $this->Flash->success(__('The detail is updated.'));
                } else {
                    $this->Flash->error(__('The detail could not be updated. Please, try again.'));
                }
            }
            return $this->redirect(['action' => 'subcontractorview/' . $user_id]);
        }
        $this->set(compact('addtask'));
    }

    public function addimages($id = null, $user_id = null) {
        $this->Images = TableRegistry::get('Images');
        $addtask = $this->Addtasks->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            //  print_r($this->request->getData()); exit;

            $data = $this->request->getData();
            if ($data['file'][0]['tmp_name']) {
                //   echo $data; exit;
                $j = 0;
                $mm_dir = new Folder(WWW_ROOT . 'upload_dir', true, 0755);
                for ($i = 0; $i < count($data['file']); $i++) {
                    $validextensions = array("jpeg", "jpg", "png");
                    $ext = explode('.', basename($data['file'][$i]['name']));
                    $file_extension = end($ext);
                    $unique = md5(uniqid());
                    $target_path = $mm_dir->pwd() . DS . $unique . $data['file'][$i]['name'];
                    move_uploaded_file($data['file'][$i]['tmp_name'], $target_path);
                    $j = $j + 1;
                    $images = $this->Images->newEntity();
                    $images = $this->Images->patchEntity($images, $this->request->getData());
                    $images->addtask_id = $id;
                    $images->user_id = $user_id;
                    $images->image = $unique . $data['file'][$i]['name'];
                    $this->Images->save($images);
                }
                return $this->redirect(['action' => 'subcontractorview/' . $user_id]);
            } else {
                $this->Flash->error(__('Choose file to submit'));
            }
        }
        $image = $this->Images->find('all', ['conditions' => ['Images.addtask_id' => $id]])->toArray();

        $this->set(compact('addtask', 'image'));
    }

}
