<?php   

class Job{
    private $title;
    public $description;
    public $visible;
    public $months;

    public function setTitle($title) {
        $this -> title = $title;
    }

    public function getTitle() {
        return $this -> title;
    }
}

$job1 = new Job();
$job1 -> setTitle('PHP Developer');
$job1 -> description = 'This is a lenghty description';
$job1 -> visible = true;
$job1 -> months = 16;

$job2 = new Job();
$job2 -> setTitle('Python Developer');
$job2 -> description = 'This is a lenghty description';
$job2 -> visible = true;
$job2 -> months = 13;


$jobs = [
    $job1,
    $job2,
    // [
    //     'title' => 'PHP Dev',
    //     'description' => 'This is a pretty lengthy description',
    //     'visible' => true,
    //     'months' => 8,
    // ],
    // [
    //     'title' => 'Python Developer',
    //     'visible' => true,
    //     'months' => 6,
    // ],
    // [
    //     'title' => 'Devops',
    //     'visible' => false,
    //     'months' => 7,
    // ],
    // [
    //     'title' => 'Node Dev',
    //     'visible' => true,
    //     'months' => 23,
    // ],
    // [
    //     'title' => 'Frontend Dev',
    //     'visible' => true,
    //     'months' => 38,
    // ]
];

function getDuration($months){
    $years = floor($months / 12);
    $extraMonths = $months % 12;

    if ($years == 0) {
        return "$extraMonths months";
    }
    else if ($extraMonths == 0) {
        return "$years years";
    }
    else {
        return "$years years with $extraMonths months";
    }
}

function printJob ($job){

    if ($job -> visible != true){
        return;
    }

    echo '<li class="work-position">';
    echo '<h5>' . $job -> getTitle() . '</h5>';
    echo '<p>' . $job -> description . '</p>';
    echo '<p>' . getDuration($job -> months) . '</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';    
}