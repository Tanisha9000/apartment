<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 *
 * @method \App\Model\Entity\Task[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
//        $this->paginate = [
//            'contain' => ['Properties', 'Stages']
//        ];
        $tasks = $this->paginate($this->Tasks);

        $this->set(compact('tasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Tasks->get($id, [
//            'contain' => ['Properties', 'Stages']
        ]);

        $this->set('task', $task);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

              return $this->redirect(['action' => 'index']);
            }else{
                 $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
           
        }
//        $properties = $this->Tasks->Properties->find('list', ['limit' => 200]);
//        $stages = $this->Tasks->Stages->find('list', ['limit' => 200]);
        $this->set(compact('task'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
//        $properties = $this->Tasks->Properties->find('list', ['limit' => 200]);
//        $stages = $this->Tasks->Stages->find('list', ['limit' => 200]);
        $this->set(compact('task'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$user_id = null)
    {
        $userdata=$this->Auth->user();
        $this->request->allowMethod(['post', 'delete']);
        $images = $this->Images->get($id);
        if ($this->Images->delete($images)) {
            $this->Flash->success(__('The Image has been deleted.'));
                  return $this->redirect(['controller' => 'properties','action' => 'listApartmentmanager/'.$userdata['id']]);
        } else {
            $this->Flash->error(__('The Image could not be deleted. Please, try again.'));
        }     
    }
    public function deleteimage($id = null,$user_id = null)
    {
        $userdata=$this->Auth->user();
        $this->request->allowMethod(['post', 'delete']);
        $images = $this->Images->get($id);
        $taskid = $images->addtask_id;
        if ($this->Images->delete($images)) {
            $this->Flash->success(__('The Image has been deleted.'));
                  return $this->redirect(['controller' => 'addtasks','action' => 'addimages/'.$taskid.'/'.$userdata['id']]);
        } else {
            $this->Flash->error(__('The Image could not be deleted. Please, try again.'));
        }     
    }
}
