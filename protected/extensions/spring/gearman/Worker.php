<?php
class Worker
{
   /**
	* Register Function
	* @var string
	*/
    protected $_registerFunction;

   /**
	* Gearman Timeout
	* @var int
	*/
    protected $_timeout = 60000;

   /**
	* Alloted Memory Limit in MB
	* @var int
	*/
    protected $_memory = 30;

   /**
	* Error Message
	* @var string
	*/
    protected $_error = null;

   /**
	* Gearman Worker
	* @var GearmanWorker
	*/
    protected $_worker;

   /**
	* Constructor
	* Checks for the required gearman extension,
	* fetches the bootstrap and loads in the gearman worker
	*
	* @return Zend_Gearman_Worker
	*/
    public function start()
    {
        if (!extension_loaded('gearman')) {
            throw new RuntimeException('The PECL::gearman extension is required.');
        }
		
        $this->_worker = Yii::app()->gearman->worker();		
		
		if(empty($this->_registerFunction)){			
			$this->_registerFunction=lcfirst(get_class($this));
			
			if(empty($this->_registerFunction)) {
				throw new InvalidArgumentException(get_class($this) . ' must implement a registerFunction');
			}
        }
		
        // allow for a small memory gap:
        $memoryLimit = ($this->_memory + 128) * 1024 * 1024;
        ini_set('memory_limit', $memoryLimit);
		
		$this->_worker->addFunction($this->_registerFunction, array(&$this, 'work'));			
        $this->_worker->setTimeout($this->_timeout);
        $this->init();

        $check = 10;
        $c = 0;
        while ($this->_worker->work() || $this->_worker->returnCode() == GEARMAN_TIMEOUT) {
            $c++;
            if ($this->_worker->returnCode() == GEARMAN_TIMEOUT) {
                $this->timeout();
                continue;
            }

            if ($this->_worker->returnCode() != GEARMAN_SUCCESS) {
    $this->setError($this->_worker->returnCode() . ': ' . $this->_worker->getErrno() . ': ' . $this->_worker->error());
				echo 'GEARMAN_ERROR [' . $this->_worker->returnCode() . ': ' . $this->_worker->getErrno() . ': ' . $this->_worker->error() . "] \n";
                break;
            }

            if (($c % $check === 0) && $this->isMemoryOverflow()) {
                break; // we've consumed our memory and the worker needs to be restarted
            }

        }

        $this->shutdown();
    }

   /**
	* Initialization
	*
	* @return void
	*/
    protected function init(){

    }

   /**
	* Handle Timeout
	*
	* @return void
	*/
    protected function timeout(){

    }

   /**
	* Handle Shutdown
	*
	* @return void
	*/
    protected function shutdown(){

    }

   /**
	* Checks for a Memory Overflow from our Limit
	*
	* @return bool
	*/
    protected function isMemoryOverflow(){
        $mem = memory_get_usage();
        if ($mem > ($this->_memory * 1024 * 1024)) {
            return true;
        }
        return false;
    }

   /**
	* Set Error Message
	*
	* @param string $error
	* @return void
	*/
    public function setError($error){
        $this->_error = $error;
		echo $error;
    }

   /**
	* Get Error Message
	*
	* @return string|null
	*/
    public function getError(){
        return $this->_error;
    }

   /**
	* Set Job Workload
	*
	* @param mixed
	* @return void
	*/
    public function setWorkload($workload){
        $this->_workload = $workload;
    }
	
	public function run($class, $param){
		$class = ucfirst($class);
		$alias = "worker.{$class}";
		
		$path = Yii::getPathOfAlias($alias);		
		if(is_file($path.'.php')){
			try{
				Yii::import($alias);
				call_user_func_array(array((new $class()), 'run'), $param);		
			}
			catch(Exception $e) {
				echo "{$alias}, Exception:" . $e->getMessage() . "\n";
			}
		}
		else{
			echo "File not found! `{$alias}` \n";
		}		
	}

   /**
	* Get Job Workload
	*
	* @return mixed
	*/
    public function getWorkload(){
        return $this->_workload;
    }
	
	public final function work($job){
		
        $this->setWorkload($job->workload());
        try{
			Yii::app()->db->setActive(false);
			call_user_func_array(array($this, 'run'), CJSON::decode($job->workload()));
			Yii::app()->db->setActive(false);
		}
		catch(Exception $e) {
			echo $this->_registerFunction. '('.$job->workload().'), Exception:' . $e->getMessage() . "\n";
		}		
        $mem = memory_get_usage();
        if ($mem > ($this->_memory * 1024 * 1024)){
            exit(1); // over memory limit;
        }
    }
}
?>