<?php

abstract class DefaultValidator{

    private $status;

    public function __construct(){
        $this->status = 1;
    }

    public function get_status(){
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
            if ($critical) $this->on_critical_validate_failure($data);
            else $this->on_validate_failure($data);
        }
    }

    public function validate_critical($boolExpression, $data = null){
		$this->validate($boolExpression, $data, true);
	}

    protected function on_critical_validate_failure($data = null){
        $this->on_validate_failure($data);
        $this->end();
        exit;
    }

    abstract protected function on_validate_failure($data = null);
    abstract public function end();
}
