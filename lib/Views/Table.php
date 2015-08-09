<?php

namespace CRUD\Views;

class Table{

    private $data = array();
    private $render = FALSE;

    public function __construct($template, $data = null)
    {
        try {
            $file = dirname(__FILE__) . '/templates/' . strtolower($template) . '.php';
            if (file_exists($file)) {
                $this->render = $file;
            } else {
                throw new customException('Template ' . $template . ' not found!');
            }
        }
        catch (customException $e) {
            echo $e->errorMessage();
        }
        $this->data = $data;
    }

    public function __destruct() {
        extract($this->data);
        include($this->render);
    }

}