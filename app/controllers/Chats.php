<?php

    class Chats extends Controller
    {
        private $chatModel;

        public function __construct()
        {
            $this->chatModel = $this->model('Chat');
        }
        public function chats()
        {
            $chats = $this -> chatModel -> get_all_messages();
            $chats =json_encode($chats);
            echo $chats;
            exit();
        }

        public function chatforum()
        {
            $data = [
                'cusid'=>$_SESSION['cus_id']
            ];
            $this->view('customers/chatforum',$data);
        }

        public function sendmessages()
        {
            if(isset($_POST['chatmessage'])){
                $text = $_POST['chatmessage'];
                $dataset = $this->chatModel -> sendmessage($text);
                echo json_encode($dataset);
                unset($_POST['chatmessage']);
                exit();
            }
        }
    }