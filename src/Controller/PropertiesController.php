<?php

namespace App\Controller;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 *
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $this->paginate = [
            'order'=>['Properties.created'=>'DESC']
        ];
        $properties = $this->paginate($this->Properties);
//        if ($this->request->is(array('post', 'put'))) {
//            //    echo "<pre>"; echo print_r($this->request->getData()) ; echo "</pre>"; exit; 
//            if ($this->request->getData('q')) {
//                $string = $this->request->getData('q');
//                $properties = $this->paginate($this->Properties->find('all', [
//                            'conditions' => ['Properties.jobsitename LIKE' => '%' . $string . '%'],
//                            'order' => ['Properties.created' => 'DESC']
//                ]));
//            }
//        }
        $this->set(compact('properties'));  
    }
    public function officeuserview() {
        $this->paginate = [
            'order'=>['Properties.created'=>'DESC']
        ];
        $properties = $this->paginate($this->Properties);

        $this->set(compact('properties'));  
    }
    
    public function billingterms(){
        $this->Staticpages = TableRegistry::get('Staticpages');
        $billing = $this->Staticpages->find('all');
        $response['data'] = $billing;
        echo json_encode($response);
        exit;        
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->Buildings = TableRegistry::get('Buildings');
        $this->Tasks = TableRegistry::get('Tasks');
        $this->Floors = TableRegistry::get('Floors');
        $this->Apartments = TableRegistry::get('Apartments');
        $this->Rooms = TableRegistry::get('Rooms');
        $this->Addtasks = TableRegistry::get('Addtasks');
        

        $property = $this->Properties->get($id, [
            'contain' => [
                'Buildings' => [
                    'Floors' => [
                        'Apartments' => [
                            'Rooms'
                        ]
                    ]
                ]
            ] 
        ]);
//        $addtask = $this->Addtasks->find('all',[
//            'conditions' => ['Addtasks.properties_id' => $property->id ]
//        ]);
        $addtask = $this->Addtasks->find('all',[
            'conditions' => ['Addtasks.properties_id' => $property->id],
            'contain' => 'Tasks'
        ])->toArray();
        //     echo "<pre>"; echo print_r($addtask); echo "</pre>"; exit;
             
       $this->set(compact('property', 'addtask'));
    }

    public function listApartmentmanager($id = null) {
        $query = $this->Properties->find('all')
                ->where(['Properties.apartmanagerid' => $id])
                ->order(['Properties.created' => 'DESC']);
        $properties = $this->paginate($query);
        $this->set(compact('properties'));
    }
   public function approvedstatus() {
        $data = $this->request->getData();
             $properties = $this->Properties->get($data['id']);
            $properties = $this->Properties->patchEntity($properties,$data);
                $properties['approval_status'] = $data['approved_status'];
                $properties=$this->Properties->save($properties);
                 $properties = $properties->toArray();
                    $request['data'] = $properties;

        echo json_encode($request);
        exit;
    }
    public function addNotes($id = null, $user_id = null) {
        $this->Properties = TableRegistry::get('Properties');
        $this->Images = TableRegistry::get('Images');

        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->request->getData('apartmentnotes') != '') {
                $properties = $this->Properties->get($id);
                $properties = $this->Properties->patchEntity($properties, $this->request->getData());
                $properties['apartmentnotes'] = $this->request->getData('apartmentnotes');
                $this->Properties->save($properties);
            }
            $data = $this->request->getData();

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
                $images->properties_id = $id;
                $images->user_id = $user_id;
                $images->image = $unique . $data['file'][$i]['name'];
                $this->Images->save($images);
            }

            return $this->redirect([ 'controller' => 'properties', 'action' => 'listApartmentmanager/' . $user_id]);
        }
        $image = $this->Images->find('all', ['conditions' => ['Images.properties_id' => $id]])->toArray();

        $properties = $this->Properties->find('all', ['conditions' => ['Properties.id' => $id]])->first();
        $this->set(compact('properties', 'image'));
//         exit;
    }

    public function addImagesapartmentmanager() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            // Prior to 3.4.0 $this->request->data() was used.
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user['role'] = "generalcontractor";
            $mm_dir = new Folder(WWW_ROOT . 'upload_dir', true, 0755);
            $target_path = $mm_dir->pwd() . DS . $this->request->getData('image.name');
            move_uploaded_file($this->request->getData('image.tmp_name'), $target_path);
            $user->image = $this->request->getData('image.name');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('General contractor has been saved.'));
                return $this->redirect(['controller' => 'users', 'action' => 'list_general_contractor']);
            }
            $this->Flash->error(__('Unable to add general contractor.'));
        }
        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        //       $this->Buildings = TableRegistry::get('Buildings');
        $this->Users = TableRegistry::get('Users');
        $property = $this->Properties->newEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->getData('values'));
            if($this->request->getData('values.name_id') && $this->request->getData('values.gen_id')){
            $property["apartmanagerid"] = $this->request->getData('values.name_id');
            $property["genmanagerid"] = $this->request->getData('values.gen_id');
            // debug($property); exit;
            if ($this->Properties->save($property)) {
                //    $this->Flash->success(__('The details have been saved.'));
                $request['data'] = $property;
                $request['status'] = true;
          
            }
            }else{
                $request['msg'] = "Please fill all the details first";
                $request['status'] = false;
            }
            echo json_encode($request);
            exit;
        }
        $apartmanager = $this->Users->find('all', [
                    'conditions' => ['Users.role' => 'apartmentmanager'],
                ])->toArray();
        $generalcont = $this->Users->find('all', [
                    'conditions' => ['Users.role' => 'generalcontractor'],
                ])->toArray();
        $this->set(compact('property', 'apartmanager', 'generalcont', 'room'));
    }

    public function getbuilding() {
        $this->Buildings = TableRegistry::get('Buildings');
        $this->Properties = TableRegistry::get('Properties');
        
        $proid = $this->request->getData('id');
        $building = $this->Buildings->find('all', [
                    'conditions' => ['Buildings.properties_id' => $proid],
                ])->toArray();
        $count = count($building);
        $request['count'] = $count;
        $response['data'] = $building;
        echo json_encode($response);
        exit;
    }

    public function getfloor() {
        $this->Buildings = TableRegistry::get('Buildings');
        
        $proid = $this->request->getData('propertyid');    
        $apart = $this->Buildings->find('all', [
                    'conditions' => ['Buildings.properties_id' => $proid],
                ])->toArray();
        
//        print_r($apart['floors_id']); exit;
//        $floor = $this->Floors->find('all', [
//                    'conditions' => ['Floors.id' => $apart['floors_id']],
//                ])->first();
//        echo "<pre>"; echo print_r($floor); echo "</pre>"; exit;
        $response['data'] = $apart;
        echo json_encode($response);
        exit;
    }

    public function getapartment() {
        $this->Apartments = TableRegistry::get('Apartments');
        $apartment = $this->Apartments->find('all')->toArray();
        $response['data'] = $apartment;
        echo json_encode($response);
        exit;
    }

    public function addfield() {
        $this->Users = TableRegistry::get('Users');
        $data = $this->request->getData();

        $query = $this->Users->find('all')
                        ->where(['Users.id' => $data['user_id']])->first();
        $request['data'] = $query;
        echo json_encode($request);
        exit;
    }

    public function seachfloor() {
        $data = $this->request->getData();
        $this->Floors = TableRegistry::get('Floors');
        $query = $this->Floors->find('list')
                ->where(['Floors.buildings_id' => $data['buildingid']]);
        $floor = $query->toArray();
//        print_r($floor) ;
//        exit;
        $request['data'] = $floor;

        echo json_encode($request);
        exit;
    }

    public function searchapartment() {
        $data = $this->request->getData();
        $this->Apartments = TableRegistry::get('Apartments');
        $query = $this->Apartments->find('list')
                ->where(['Apartments.floors_id' => $data['floorid']]);
        $apartment = $query->toArray();
//        print_r($floor) ;
//        exit;
        $request['data'] = $apartment;

        echo json_encode($request);
        exit;
    }

    public function searchroom() {
        $data = $this->request->getData();
        $this->Rooms = TableRegistry::get('Rooms');
        $query = $this->Rooms->find('list')
                ->where(['Rooms.apartments_id' => $data['apartmentid']]);
        $room = $query->toArray();
//        print_r($floor) ;
//        exit;
        $request['data'] = $room;

        echo json_encode($request);
        exit;
    }

    public function propertiesstaus($id = null, $user_id = null, $status = null) {
        $property = $this->Properties->find('all', ['conditions' => [ 'AND' => ['Properties.apartmanagerid' => $user_id, 'Properties.id' => $id]]]);
        $property = $property->first()->toArray();
        $property = $this->Properties->get($property['id']);
        $property = $this->Properties->patchEntity($property, $this->request->getData());
        $property['apartmentstatus'] = $status;
        if ($this->Properties->save($property)) {
            $this->Flash->success(__('The property has been saved.'));
            return $this->redirect(['controller' => 'properties', 'action' => 'listApartmentmanager', $user_id]);
        } else {
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }

        return $this->redirect(['controller' => 'properties', 'action' => 'listApartmentmanager', $user_id]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->Buildings = TableRegistry::get('Buildings');
        $property = $this->Properties->get($id, [
            'contain' => []
        ]);
        $building = $this->Buildings->find('all', [
                    'conditions' => ['Buildings.properties_id' => $property->id],
                ])->toArray();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['controller' => 'properties', 'action' => 'edit', $property->id]);
            } else {
                $this->Flash->error(__('The property could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('property', 'building'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $property = $this->Properties->get($id, [
            'contain' => [
                'Buildings' => [
                    'Floors' => [
                        'Apartments' => [
                            'Rooms'
                        ]
                    ]
                ]
            ]
        ]);
//        debug($property);
        $this->request->allowMethod(['post', 'delete']);
//        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success(__('The property has been deleted.'));
        } else {
            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function moreinfo($taskid = null, $propertiesid = null, $id = null) {
        $this->Addtasks = TableRegistry::get('Addtasks');
        $this->Addtaskinfos = TableRegistry::get('Addtaskinfos');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checktask = $this->Addtasks->find('all', ['conditions' => ['AND' => ['Addtasks.properties_id' => $propertiesid, 'Addtasks.task_id' => $taskid]]]);
            $checktask = $checktask->toArray();
            if (!empty($checktask)) {
                $addtask = $this->Addtasks->get($checktask[0]['id']);
                $addtask = $this->Addtasks->patchEntity($addtask, $this->request->getData());
                $addtask->comments = $this->request->getData('comment');
                $addtask->how_many = $this->request->getData('how_many');
                $this->Addtasks->save($addtask);
            }
            $data = $this->request->getData();
            $j = 0;
            $mm_dir = new Folder(WWW_ROOT . 'task_dir', true, 0755);
            for ($i = 0; $i < count($data['file']); $i++) {
                $validextensions = array("jpeg", "jpg", "png");
                $ext = explode('.', basename($data['file'][$i]['name']));
                $file_extension = end($ext);
                $unique = md5(uniqid());
                $target_path = $mm_dir->pwd() . DS . $unique . $data['file'][$i]['name'];
                move_uploaded_file($data['file'][$i]['tmp_name'], $target_path);
                $j = $j + 1;
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
//         $checktasks = $this->Addtasks->find('all',['conditions' => ['AND' =>['Addtasks.properties_id' => $propertiesid,'Addtasks.task_id' => $taskid]]]);
//         $checktask=$checktasks->toArray();
        $image = $this->Addtaskinfos->find('all', ['conditions' => ['Addtaskinfos.addtasks_id' => $id]])->toArray();
        $this->set(compact('image'));
    }

    public function taskdetails($id = null) {
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
        $task = $this->Tasks->find('all', [
                    'contain' => ['Addtasks']
                ])->toArray();
//        echo "<pre>";
//        print_r($task);
//        echo "</pre>";
//        exit;
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dat = $this->request->getData('radio');
            foreach ($dat as $data) {

                if ($data['change'] == '1') {
//                                debug($data);
//                                echo "if";
                    $checktask = $this->Addtasks->find('all', ['conditions' => ['AND' => ['Addtasks.properties_id' => $id, 'Addtasks.task_id' => $data['taskid']]]]);
                    $checktask = $checktask->toArray();
                    if (!empty($checktask)) {
                        // debug($checktask[0]['id']);
                        $addtask = $this->Addtasks->get($checktask[0]['id']);
                        $addtask = $this->Addtasks->patchEntity($addtask, $this->request->getData());
                        $addtask->properties_id = $id;
                        $addtask->buildings_id = $this->request->getData('buildid');
                        $addtask->floors_id = $this->request->getData('floorid');
                        $addtask->apartments_id = $this->request->getData('apartid');
                        $addtask->rooms_id = $this->request->getData('roomid');
                        $addtask->task_id = $data['taskid'];
                        $addtask->users_id = $data['subid'];
                        $addtask->stages_id = $data['stageid'];
                        $this->Addtasks->save($addtask);
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
                        $addtask->stages_id = $data['stageid'];
                        $this->Addtasks->save($addtask);
                    }
                } else {
//                                       debug($data);
//                                       echo "else";
                    $checktask = $this->Addtasks->find('all', ['conditions' => ['AND' => ['Addtasks.properties_id' => $id, 'Addtasks.task_id' => $data['taskid']]]]);
                    $checktask = $checktask->toArray();
                    if (!empty($checktask)) {
                        //debug($checktask[0]['id']);
                        $addtask = $this->Addtasks->get($checktask[0]['id']);
                        // $this->request->allowMethod(['post', 'delete']);  
                        if ($this->Addtasks->delete($addtask)) {
                            $this->Flash->success(__('The property has been deleted.'));
                        } else {
                            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
                        }
                    }
                }
            }
            exit;
        }
        $this->set(compact('property', 'building', 'task', 'subcontractor', 'stage'));
 
    }

}
