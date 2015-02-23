<?php

abstract class DefaultValidator{
    
    private $status;
    
    public function __construct(){
        $this->status = 1;
    }
    
    public function getStatus(){
        return $this->status;
    }
    
    public function check(){
        if ($this->status == 0){
            $this->end();
        }
    }
    
    public function validate($boolExpression, $data = null, $critical = False){
        if(!$boolExpression){
            $this->status = 0;
        }
        
        if ($this->status == 0){
            if ($critical) $this->onCriticalValidateFailure($data);
            else $this->onValidateFailure($data);
        }
    }
    
    public function validateCritical($boolExpression, $data = null){
		$this->validate($boolExpression, $data, true);
	}
    
    protected function onCriticalValidateFailure($data = null){
        $this->onValidateFailure($data);
        $this->end();
        exit;
    }
    
    abstract protected function onValidateFailure($data = null);
    abstract public function end();
}
  
