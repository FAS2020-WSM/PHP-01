<?php

namespace App\Models;

class BaseElement implements Printable
{
    protected $title;
    public $description;
    public $visible = true;
    public $months;

    // Magic Method
    public function __construct($title, $description)
    {
        $this->setTitle($title);
        $this->description = $description;
    }

    // Methods
    public function setTitle($title)
    {
        // if ($title == '') {
        //     $this->title = 'N/A';
        // } else {
        //     $this->title = $title;
        // }

        $this->title = ($title == '') ? 'N/A' : $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDurationAsString()
    {
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;

        if ($years == 0) {
            return "$extraMonths months";
        } else if ($extraMonths == 0) {
            return "$years years";
        } else {
            return "$years years with $extraMonths months";
        }
    }


    public function getDescription()
    {
        return $this->description;
    }
}
