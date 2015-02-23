<?php

require_once dirname(__FILE__).'/validator.php';

class JsonReply extends DefaultValidator{
    
    private $successMessage;
    private $messages;
    private $contents;
    
    public function __construct($successMessage = 'Operação executada com sucesso'){
        parent::__construct();
        $this->successMessage = $successMessage;
        $this->messages = array();
        $this->contents = array();
    }
    
    public function setContents($contents){
        $this->contents = $contents;
    }
    
    private function toAnswer(){
        $stringmessages = implode("\n", $this->messages);
        
        $answer = array(
            'status' => $this->getStatus(),
            'messages' => $stringmessages,
            'contents' => $this->contents
        );
        
        return $answer;
    }
    
    // Abstract
    public function end(){
        echo json_encode($this->toAnswer());
        exit;
    }
    
    protected function onValidateFailure($data = null){
        $this->messages[] = $data;
    }
    
}
