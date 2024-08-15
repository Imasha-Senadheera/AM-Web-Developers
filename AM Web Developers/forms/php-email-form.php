<?php
class PHP_Email_Form {
    public $ajax = false;
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $smtp = array();
    private $messages = array();

    public function add_message($message, $subject = '', $type = 0) {
        $this->messages[] = array('message' => $message, 'subject' => $subject, 'type' => $type);
    }

    public function send() {
        $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
        $headers .= "Reply-To: " . $this->from_email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $message = "";
        foreach ($this->messages as $msg) {
            $message .= $msg['subject'] . ": " . $msg['message'] . "\r\n";
        }

        return mail($this->to, $this->subject, $message, $headers);
    }
}
?>
