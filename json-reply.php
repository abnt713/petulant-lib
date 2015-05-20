<?php

require_once dirname(__FILE__).'/validator.php';

class JsonReply extends DefaultValidator{

    private $success_message;
    private $messages;
    private $contents;

    public function __construct($success_message = 'Operação executada com sucesso'){
        parent::__construct();
        $this->success_message = $success_message;
        $this->messages = array();
        $this->contents = array();
    }

    public function set_contents($contents){
        $this->contents = $contents;
    }

    private function to_answer(){
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

    protected function on_validate_failure($data = null){
        $this->messages[] = $data;
    }

}
