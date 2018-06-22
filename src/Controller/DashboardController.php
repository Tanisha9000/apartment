<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Error\Debugger;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{
//	public function beforeFilter(Event $event) {
//        parent::beforeFilter($event);
//        if ($this->request->params['prefix'] == 'admin') {
//            $this->viewBuilder()->setLayout('admin');
//            if($this->Auth->user() && $this->Auth->user('role') !='admin'){
//             $this->Auth->logout(); 
//              //  $this->viewBuilder()->setLayout('admin');
//            }
//        }
//        $this->Auth->allow(['logout']);
//        $this->authcontent();
//    }
	public function index(){
		$this->loadModel('Users');
                $this->loadModel('Properties');
                $this->loadModel('Addtasks');
                $this->loadModel('Clients');
                
                $clients = $this->Clients->find('all')->toArray();
		
		$this->set('clients', $clients); 
		
		$apartusers = $this->Users->find('all',[
			'conditions' => ['Users.role' => 'apartmentmanager'] 
		])->toArray();
		
		$this->set('apartusers', $apartusers); 
		
		$officeusers = $this->Users->find('all',[
			'conditions' => ['Users.role' => 'officeuser']    
		])->toArray();
		
		$this->set('officeusers', $officeusers); 
                
                $subusers = $this->Users->find('all',[
			'conditions' => ['Users.role' => 'subcontractor']    
		])->toArray();
		
		$this->set('subusers', $subusers); 
                
                $genusers = $this->Users->find('all',[
			'conditions' => ['Users.role' => 'generalcontractor']    
		])->toArray();
		
		$this->set('genusers', $genusers); 
               
                $tasks = $this->Addtasks->find('all',[
			'contain' => ['Properties','Tasks','Users'],
                   'group'=>'Addtasks.users_id'
		])->toArray();  
            //    echo "<pre>"; print_r($tasks); echo "</pre>"; exit;
               // echo "<pre>"; echo print_r($tasks); echo "</pre>"; exit;
		$this->set('tasks', $tasks);
                
		$properties = $this->Properties->find('all',[
			'order'		=> ['Properties.created' => 'desc'],
			'limit'		=>	5
		])->toArray();
		
		$this->set('properties', $properties);
//		$this->set('_serialize', ['members']);
		  
	}
}