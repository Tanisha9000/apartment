<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function initialize() {
        parent::initialize();
        $this->loadComponent('Upload');
    }

    public function index() {
        $this->paginate = [
            'order'=>['Clients.created'=>'DESC']
        ];
        $clients = $this->paginate($this->Clients);
            
        $this->set(compact('clients'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $client = $this->Clients->get($id, [
            'contain' => [],
           
        ]);

        $this->set('client', $client);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            
            $client = $this->Clients->newEntity();
     //     echo "<pre>"; print_r($this->request->getData()); echo "</pre>"; exit;
            $client = $this->Clients->patchEntity($client, $this->request->getData());

            $mm_dir = new Folder(WWW_ROOT . 'img/upload_dir', true, 0755);
            $target_path = $mm_dir->pwd() . DS . $this->request->getData('image.name');
            move_uploaded_file($this->request->getData('image.tmp_name'), $target_path);
            $client->image = $this->request->getData('image.name');
           // debug($client);
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.')); 

                
            }else{
                $this->Flash->error(__('The client could not be saved. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('client'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $client = $this->Clients->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $client = $this->Clients->patchEntity($client, $this->request->getData());

            if (empty($this->request->getData('image')) && !empty($this->request->getData('old_image'))) {
                $this->request->getData['image'] = $this->request->getData['old_image'];
            } else if (!empty($this->request->getData('image')) && !empty($this->request->getData('old_image'))) {
                $mm_dir = new Folder(WWW_ROOT . 'img/upload_dir', true, 0755);
                $target_path = $mm_dir->pwd() . DS . $this->request->getData('image.name');

                move_uploaded_file($this->request->getData('image.tmp_name'), $target_path);
                $client->image = $this->request->getData('image.name');
            } else if (!empty($this->request->getData('image')) && empty($this->request->getData('old_image'))) {
                $mm_dir = new Folder(WWW_ROOT . 'img/upload_dir', true, 0755);
                $target_path = $mm_dir->pwd() . DS . $this->request->getData('image.name');

                move_uploaded_file($this->request->getData('image.tmp_name'), $target_path);
                $client->image = $this->request->getData('image.name');
            }

            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }else {
                $this->Flash->error(__('The client could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('client'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
