<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // public function __construct($title, $description)
    // {
    //     $newTitle = 'Job: ' . $title;
    //     // parent::__construct($newTitle, $description);
    //     $this->title = $newTitle;
    // }

    protected $table = 'jobs';

    public function getDurationAsString()
    {
        $years = floor($this->months / 12);
        $extraMonths = $this->months % 12;

        if ($years == 0) {
            return "Job Duration: $extraMonths months";
        } else if ($extraMonths == 0) {
            return "Job Duration: $years years";
        } else {
            return "Job Duration: $years years with $extraMonths months";
        }
    }
}
