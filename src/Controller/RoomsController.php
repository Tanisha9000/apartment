<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Rooms Controller
 *
 * @property \App\Model\Table\RoomsTable $Rooms
 *
 * @method \App\Model\Entity\Room[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RoomsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null) {
        $this->Apartments = TableRegistry::get('Apartments');
        $apartment = $this->Apartments->get($id);

        $rooms = $this->paginate($this->Rooms->find('all', [
                    'conditions' => ['Rooms.apartments_id' => $apartment->id],
                    'contain' => ['Apartments']  
                ]));

        $this->set(compact('rooms'));
    }

    /**
     * View method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $room = $this->Rooms->get($id, [
            'contain' => ['Apartments']
        ]);

        $this->set('room', $room);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $room = $this->Rooms->newEntity();
        if ($this->request->is('post')) {
            $proid = $this->request->getData('id');
            $room = $this->Rooms->patchEntity($room, $this->request->getData());
            $room["apartments_id"] = $this->request->getData('id');
            $room["name"] = $this->request->getData('building_name');
            if ($this->Rooms->save($room)) {
//                $room = $this->Rooms->find('all', [
//                    'conditions' => ['Rooms.apartments_id' => $proid],
//                ])->toArray();
//                $count = count($room);
//                $request['count'] = $count;
                $request['data'] = $room;
                echo json_encode($request);
                exit;
            }
//            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $apartments = $this->Rooms->Apartments->find('list', ['limit' => 200]);
        $this->set(compact('room', 'apartments'));
    }
    public function addroom($id = null){
        $this->Apartments = TableRegistry::get('Apartments');
        $apartment = $this->Apartments->get($id);
   
        $room = $this->Rooms->newEntity();
        if ($this->request->is('post')) {  
            $room = $this->Rooms->patchEntity($room, $this->request->getData());
            $room["apartments_id"] = $apartment->id;
            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('Room has been saved.'));
                return $this->redirect(['action' => 'index', $room->apartments_id]);  
            }else{
            $this->Flash->error(__('Unable to add new room. Please try again later'));
            }
        }
        $this->set('room', $room);        
    }

    /**
     * Edit method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $room = $this->Rooms->get($id, [
            'contain' => 'Apartments'
        ]);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $this->Rooms->patchEntity($room, $this->request->getData());
            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('Room has been updated.'));
                return $this->redirect(['action' => 'index', $room->apartments_id]);
            } else {
                $this->Flash->error(__('Unable to update room. Please try again later'));
            }
        }
        $this->set(compact('room'));
//        $this->Apartments = TableRegistry::get('Apartments');
//        $apartment = $this->Apartments->get($id, [
//            'contain' => []
//        ]);
//        $room = $this->Rooms->find('all', [
//                    'conditions' => ['Rooms.apartments_id' => $apartment->id],
//                ])->toArray();
//        
//        if ($this->request->is(['patch', 'post', 'put'])) {
//    //        echo '<pre>'; echo print_r($this->request->getData()) ; echo '</pre>' ; exit;
//                        $posts = $this->request->getData();
//            foreach ($posts['data'] as $flur) { 
//                $query = $this->Rooms->query();
//                        $query->update()
//                        ->set(['name' => $flur['name']])
//                        ->where(['id' => $flur['id']])
//                        ->execute();
//
//            }
//            $this->redirect(['controller' => 'properties','action' => 'index']);
//        }
//        $this->set(compact('room'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $room = $this->Rooms->get($id);
        $roomid = $room->apartments_id ;
        if ($this->Rooms->delete($room)) {
            $this->Flash->success(__('The room has been deleted.'));
        } else {
            $this->Flash->error(__('The room could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index',$roomid]);
    }

}
