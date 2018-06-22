<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Floors Controller
 *
 * @property \App\Model\Table\FloorsTable $Floors
 *
 * @method \App\Model\Entity\Floor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FloorsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null) {
        $this->Buildings = TableRegistry::get('Buildings');
//        $this->paginate = [
//            'contain' => ['Buildings']
//        ];
        $building = $this->Buildings->get($id);
        $floors = $this->paginate($this->Floors->find('all', [
                    'conditions' => ['Floors.buildings_id' => $building->id],
                    'contain' => ['Buildings']
                ]));
        $this->set(compact('floors'));
    }

    /**
     * View method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $floor = $this->Floors->get($id, [
            'contain' => ['Buildings','Apartments']
        ]);

        $this->set('floor', $floor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->Buildings = TableRegistry::get('Buildings');
        $floor = $this->Floors->newEntity();
        if ($this->request->is('post')) {
            $proid = $this->request->getData('id');
            $propertyid = $this->request->getData('propertyid');
            $string = $this->request->getData('building_name');
            $check = $this->Floors->find('all', [
                        'conditions' =>['AND'=>['Floors.name LIKE' => '%' . $string . '%'], ['Floors.buildings_id' => $proid]
            ]])->toArray(); 
            
            if(empty($check)){
            $floor = $this->Floors->patchEntity($floor, $this->request->getData());
            $floor["buildings_id"] = $this->request->getData('id');
            $floor["name"] = $this->request->getData('building_name');
            if ($this->Floors->save($floor)) {
         //       $this->Flash->success(__('The floor has been saved.')); 
//                $floor = $this->Floors->find('all', [
//                    'conditions' => ['Floors.buildings_id' => $proid],
//                ])->toArray();
                $building = $this->Buildings->find('all', [
                    'conditions' => ['Buildings.properties_id' => $propertyid],
                ])->toArray();
//                $count = count($floor);
//                $request['count'] = $count;
                $request['data'] = $building;
                $request['status'] = true;
                }
            }else{
                $request['msg'] = "Floor name is already saved";
                $request['status'] = false;                
            }
                echo json_encode($request);
                exit;
        }
        $buildings = $this->Floors->Buildings->find('list', ['limit' => 200]);
        $this->set(compact('floor', 'buildings'));
    }
    
    public function getfloor(){
        $proid = $this->request->getData('id');  
        $floor = $this->Floors->find('all',[
           'conditions' => ['Floors.buildings_id' => $proid]
        ])->toArray();
        $response['data'] = $floor;
        echo json_encode($response);
        exit;
    }
    
    public function getapartment(){
        $this->Apartments = TableRegistry::get('Apartments');
        $proid = $this->request->getData('id');  
        $floor = $this->Apartments->find('all',[
           'conditions' => ['Apartments.floors_id' => $proid]
        ])->toArray();
        $response['data'] = $floor;
        echo json_encode($response);
        exit;        
    }
    
    public function addfloor($id = null){
        $this->Buildings = TableRegistry::get('Buildings');
        $building = $this->Buildings->get($id);

        $floor = $this->Floors->newEntity();
        if ($this->request->is('post')) {
            $floor = $this->Floors->patchEntity($floor, $this->request->getData());
            $floor["buildings_id"] = $building->id;
            if ($this->Floors->save($floor)) {
                $this->Flash->success(__('Floor has been saved.'));
                return $this->redirect(['action' => 'index',$floor->buildings_id]);
            }
            $this->Flash->error(__('Unable to add new floor. Please try again later'));
        }
        $this->set('floor', $floor);        
    }

    /**
     * Edit method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $floor = $this->Floors->get($id,[
            'contain' => 'Buildings'
        ]);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $this->Floors->patchEntity($floor, $this->request->getData());
            if ($this->Floors->save($floor)) {
                $this->Flash->success(__('Floor has been updated.'));
                return $this->redirect(['action' => 'index',$floor->buildings_id]);
            } else {
                $this->Flash->error(__('Unable to update floor.Please try again later'));
            }
        }
        $this->set('floor', $floor);
//        $this->Buildings = TableRegistry::get('Buildings');
//        $building = $this->Buildings->get($id, [
//            'contain' => []
//        ]);
//        
//        $floor = $this->Floors->find('all', [
//                    'conditions' => ['Floors.buildings_id' => $building->id],  
//                    'contain'=>['Apartments']
//                ])->toArray();
//
//        if ($this->request->is(['patch', 'post', 'put'])) {
//            $posts = $this->request->getData();
//            foreach ($posts['data'] as $flur) {
//                $query = $this->Floors->query();
//                        $query->update()
//                        ->set(['name' => $flur['name']])
//                        ->where(['id' => $flur['id']])
//                        ->execute();
//
//            }
//            $this->redirect(['controller' => 'properties','action' => 'index']); 
//
//        }
//        $this->set(compact('floor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $floor = $this->Floors->get($id);
        $build = $floor->buildings_id ;
        if ($this->Floors->delete($floor)) {
            $this->Flash->success(__('The floor has been deleted.'));
        } else {
            $this->Flash->error(__('The floor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index',$build]);
    }

}
