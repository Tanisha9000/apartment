<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Buildings Controller
 *
 * @property \App\Model\Table\BuildingsTable $Buildings
 *
 * @method \App\Model\Entity\Building[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BuildingsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null) {
        $this->Properties = TableRegistry::get('Properties');
//        $this->paginate = [
//            'contain' => ['Properties']
//        ];
        $property = $this->Properties->get($id);
//        echo"<pre>"; echo print_r($property); echo"</pre>"; exit;
        $buildings = $this->paginate($this->Buildings->find('all', [
                    'conditions' => ['Buildings.properties_id' => $property->id],
                    'contain' => ['Properties']
        ]));
        $this->set(compact('buildings'));
    }

    /**
     * View method
     *
     * @param string|null $id Building id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $building = $this->Buildings->get($id, [
            'contain' => ['Properties', 'Floors']
        ]);
        //    echo "<pre>"; echo print_r($building); echo"</pre>"; exit;

        $this->set('building', $building);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        //    $this->Properties = TableRegistry::get('Properties');
        $building = $this->Buildings->newEntity();
        if ($this->request->is('post')) {
            $proid = $this->request->getData('id');
            $string = $this->request->getData('building_name');
            $check = $this->Buildings->find('all', [
                        'conditions' =>['AND'=>['Buildings.name LIKE' => '%' . $string . '%'], ['Buildings.properties_id' => $proid]
            ]])->toArray(); 
    //        print_r($check);
            if(empty($check)){
            $building = $this->Buildings->patchEntity($building, $this->request->getData());
            $building["properties_id"] = $this->request->getData('id');
            $building["name"] = $this->request->getData('building_name');
            if ($this->Buildings->save($building)) {
                $building = $this->Buildings->find('all', [
                            'conditions' => ['Buildings.properties_id' => $proid],
                        ])->toArray();
                $count = count($building);
                $request['count'] = $count;
                $request['data'] = $building;
                $request['status'] = true;
                }
            }else{
                $request['msg'] = "Building name is already saved";
                $request['status'] = false;                
            }
            echo json_encode($request);
            exit;
        }
        $properties = $this->Buildings->Properties->find('list', ['limit' => 200]);
        $this->set(compact('building', 'properties'));
    }

    public function addbuilding($id = null) {
        $this->Properties = TableRegistry::get('Properties');
        $property = $this->Properties->get($id);
//        echo $property;
//        exit;
        $building = $this->Buildings->newEntity();
        if ($this->request->is('post')) {
            $building = $this->Buildings->patchEntity($building, $this->request->getData());
            $building["properties_id"] = $property->id;
            if ($this->Buildings->save($building)) {
                $this->Flash->success(__('Building has been saved.'));
                return $this->redirect(['action' => 'index',$building->properties_id]);
            }
            $this->Flash->error(__('Unable to add new building.Please try again later'));
        }
        $this->set('building', $building);
    }

    /**
     * Edit method
     *
     * @param string|null $id Building id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
//        $this->Properties = TableRegistry::get('Properties');
//        $property = $this->Properties->get(81);
//
//        $building = $this->Buildings->find('all', [
//                    'conditions' => ['Buildings.properties_id' => $property->id]
//                ])->toArray();

        $building = $this->Buildings->get($id, [
            'contain' => 'Properties'
        ]);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $this->Buildings->patchEntity($building, $this->request->getData());
            if ($this->Buildings->save($building)) {
                $this->Flash->success(__('Building has been updated.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to update building.Please try again later'));
            }
        }
        $this->set('building', $building);

//        if ($this->request->is(['patch', 'post', 'put'])) {
//            $posts = $this->request->getData();
//            foreach ($posts['data'] as $build) {
//                $query = $this->Buildings->query();
//                        $query->update()
//                        ->set(['name' => $build['name']])
//                        ->where(['id' => $build['id']])
//                        ->execute();
//            }
//            $this->redirect(['controller' => 'properties','action' => 'index']); 
//        }
//        $this->set(compact('building'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Building id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $building = $this->Buildings->get($id);
        $property = $building->properties_id ;
        if ($this->Buildings->delete($building)) {
            $this->Flash->success(__('The building has been deleted.'));
        } else {
            $this->Flash->error(__('The building could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index',$property]);
    }

//    public function addfield() { 
//        $this->Properties = TableRegistry::get('Properties');
//        $data = $this->request->data;
//
//        $query = $this->Properties->find('all')
//                        ->where(['Users.id' => $data['user_id']])->first();
//        $request['data'] = $query;
////        echo "<pre>";
////        print_r($request);
////        echo "</pre>";
////        exit;   
//        echo json_encode($request);
//        exit;
//    }
}