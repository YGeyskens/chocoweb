<?php
include_once('./models/database.php');
class Message
{
    public $id;
    public $name;
    public $email;
    public $subject;
    public $message;

    function __construct( $name = null, $email = null, $subject = null, $message = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
        $this->insert();
    }
    public function insert()
    {
        $pdo = getConnectionToDb();
        $query = $pdo->prepare('INSERT INTO messages (name, email, subject, content) VALUES (?,?,?,?);');
        $query->execute([$this->name, $this->email, $this->subject, $this->message]);
    }
}