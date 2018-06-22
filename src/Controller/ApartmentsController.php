<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Apartments Controller
 *
 * @property \App\Model\Table\ApartmentsTable $Apartments
 *
 * @method \App\Model\Entity\Apartment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApartmentsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null) {
        $this->Floors = TableRegistry::get('Floors');
        $floor = $this->Floors->get($id);
        $apartments = $this->paginate($this->Apartments->find('all', [
                    'conditions' => ['Apartments.floors_id' => $floor->id],
                    'contain' => ['Floors']
        ]));

        $this->set(compact('apartments'));
    }

    /**
     * View method
     *
     * @param string|null $id Apartment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $apartment = $this->Apartments->get($id, [
            'contain' => ['Floors', 'Rooms']
        ]);

        $this->set('apartment', $apartment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->Buildings = TableRegistry::get('Buildings');
        $apartment = $this->Apartments->newEntity();
        if ($this->request->is('post')) {
            $proid = $this->request->getData('id');
            $propertyid = $this->request->getData('propertyid');
            $string = $this->request->getData('building_name');
            $check = $this->Apartments->find('all', [
                        'conditions' =>['AND'=>['Apartments.name LIKE' => '%' . $string . '%'], ['Apartments.floors_id' => $proid]
            ]])->toArray(); 
            
            if(empty($check)){
                $apartment = $this->Apartments->patchEntity($apartment, $this->request->getData());
                $apartment["floors_id"] = $this->request->getData('id');
                $apartment["name"] = $this->request->getData('building_name');
                if ($this->Apartments->save($apartment)) {
                    $building = $this->Buildings->find('all', [
                                'conditions' => ['Buildings.properties_id' => $propertyid],
                    ])->toArray();
//                    $apartment = $this->Apartments->find('all', [
//                                'conditions' => ['Apartments.floors_id' => $proid],
//                            ])->toArray();
//                    $count = count($apartment);
//                    $request['count'] = $count;
                    $request['data'] = $building;
                    $request['status'] = true; 
                }
            }else{
                $request['msg'] = "Apartment name is already saved"; 
                $request['status'] = false;                
            }
                echo json_encode($request);
                exit;
        }
        $floors = $this->Apartments->Floors->find('list', ['limit' => 200]);
        $this->set(compact('apartment', 'floors'));
    }

    public function addapartment($id = null) {
        $this->Floors = TableRegistry::get('Floors');
        $floor = $this->Floors->get($id);
   
        $apartment = $this->Apartments->newEntity();
        if ($this->request->is('post')) {  
       //     echo"<pre>"; echo print_r($this->request->getData()); echo "</pre>"; exit;
            $apartment = $this->Apartments->patchEntity($apartment, $this->request->getData());
            $apartment["floors_id"] = $floor->id;
            if ($this->Apartments->save($apartment)) {
                $this->Flash->success(__('Apartment has been saved.'));
                return $this->redirect(['action' => 'index', $apartment->floors_id]);  
            }else{
            $this->Flash->error(__('Unable to add new apartment. Please try again later'));
            }
        }
        $this->set('apartment', $apartment);
    }

    /**
     * Edit method
     *
     * @param string|null $id Apartment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $apartment = $this->Apartments->get($id, [
            'contain' => 'Floors'
        ]);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $this->Apartments->patchEntity($apartment, $this->request->getData());
            if ($this->Apartments->save($apartment)) {
                $this->Flash->success(__('Apartment has been updated.'));
                return $this->redirect(['action' => 'index', $apartment->floors_id]);
            } else {
                $this->Flash->error(__('Unable to update apartment.Please try again later'));
            }
        }
        $this->set('apartment', $apartment);
//        $this->Floors = TableRegistry::get('Floors');
//        $floor = $this->Floors->get($id, [
//            'contain' => []
//        ]);
//        $apartment = $this->Apartments->find('all', [
//                    'conditions' => ['Apartments.floors_id' => $floor->id],
//                    'contain' => ['Rooms']
//                ])->toArray();
//
//        if ($this->request->is(['patch', 'post', 'put'])) {
//            //    echo '<pre>'; echo print_r($this->request->getData()) ; echo '</pre>' ; exit;
//            $posts = $this->request->getData();
//            foreach ($posts['data'] as $flur) {
//                $query = $this->Apartments->query();
//                $query->update()
//                        ->set(['name' => $flur['name']])
//                        ->where(['id' => $flur['id']])
//                        ->execute();
//            }
//            $this->redirect(['controller' => 'properties', 'action' => 'index']);
//        }
//        $this->set(compact('apartment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Apartment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $apartment = $this->Apartments->get($id);
        $apartid = $apartment->floors_id;
        if ($this->Apartments->delete($apartment)) {
            $this->Flash->success(__('The apartment has been deleted.'));
        } else {
            $this->Flash->error(__('The apartment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $apartid]);
    }

}
