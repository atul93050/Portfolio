<?php
$skills = [
    [
        "image" => "image/c.png",
        "name" => "C Programming",
        "start_date" => "2023-02-12"
    ],
    [
        "image" => "image/html.png",
        "name" => "HTML",
        "start_date" => "2023-07-12"
    ],
    [
        "image" => "image/css.png",
        "name" => "CSS",
        "start_date" => "2023-07-12"
    ],
    [
        "image" => "image/js.png",
        "name" => "JavaScript",
        "start_date" => "2023-07-12"
    ],
    [
        "image" => "image/bootstrap.png",
        "name" => "Bootstrap",
        "start_date" => "2023-07-12"
    ],
    [
        "image" => "image/php.png",
        "name" => "PHP",
        "start_date" => "2024-08-12"
    ],
    [
        "image" => "image/sql.png",
        "name" => "SQL",
        "start_date" => "2024-08-12"
    ],
    [
        "image" => "image/django.png",
        "name" => "Django",
        "start_date" => "2023-07-12"
    ],
    [
        "image" => "image/wordpress.png",
        "name" => "WordPress",
        "start_date" => "2024-11-12"
    ],
    [
        "image" => "image/laravel.png",
        "name" => "Laravel",
        "start_date" => "2024-12-12"
    ],

];

foreach ($skills as $skill) {
    $start_date = new DateTime($skill['start_date']);
    $end_date = new DateTime();

    // Calculate the difference
    $diff = $start_date->diff($end_date);

    // Initialize experience string
    $experience = '';

    if ($diff->y > 0) {
        $experience .= $diff->y . ' Year' . ($diff->y > 1 ? 's' : '') . ', ';
    }

    // Check for months
    if ($diff->m > 0) {
        $experience .= $diff->m . ' Month' . ($diff->m > 1 ? 's' : '') . ', ';
    }

    // Check for days if no years or months
    if ($diff->d > 0 || $experience == '') {
        $experience .= $diff->d . ' Day' . ($diff->d > 1 ? 's' : '');
    }


    echo "
    <div class='skill-card'>
        <img src='{$skill['image']}' alt='{$skill['name']}' class='skill-icon'>
        <div>
            <h6 class='skill-name'>{$skill['name']}</h6>
            <p class='skill-experience'>{$experience} Experience</p>
        </div>
    </div>
    ";
}
