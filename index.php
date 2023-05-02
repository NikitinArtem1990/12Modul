<?php $example_persons_array = [
    [   'fullname' => 'Иванов Иван Иванович',
        'job' => 'tester',
    ],
    [
        'fullname' => 'Степанова Наталья Степановна',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Пащенко Владимир Александрович',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Громов Александр Иванович',
        'job' => 'fullstack-developer',
    ],
    [
        'fullname' => 'Славин Семён Сергеевич',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Цой Владимир Антонович',
        'job' => 'frontend-developer',
    ],
    [
        'fullname' => 'Быстрая Юлия Сергеевна',
        'job' => 'PR-manager',
    ],
    [
        'fullname' => 'Шматко Антонина Сергеевна',
        'job' => 'HR-manager',
    ],
    [
        'fullname' => 'аль-Хорезми Мухаммад ибн-Муса',
        'job' => 'analyst',
    ],
    [
        'fullname' => 'Бардо Жаклин Фёдоровна',
        'job' => 'android-developer',
    ],
    [
        'fullname' => 'Шварцнегер Арнольд Густавович',
        'job' => 'babysitter',
    ],
  
];


$partsFullNane = [
    'surname',
    'name',
    'patronomyc',
];


function getFullnameFromParts() {
echo 'Задание 1.1';
echo "<ul>";
global $example_persons_array;
$a = count($example_persons_array); 

    for ($i = 0; $i < $a; $i++) {
    
    echo "<li>";
    echo $fullStringName = $example_persons_array[$i]['fullname'] . ';';
    echo "</li>";
    }
    echo "</ul>";
}
getFullnameFromParts();

function getPartsFromFullname() {
   
echo 'Задание 1.2';
echo "<ul>";
    global $example_persons_array;
    global $partsFullNane;
    $a = count($example_persons_array);

    for ($i=0; $i < $a; $i++) {

    $partOne = explode (' ', $example_persons_array[$i]['fullname']);
    echo "<li>";
    print_r (array_combine($partsFullNane, $partOne));
    echo "</li>";
    }
    echo "</ul>";
} 
getPartsFromFullname();


function getShortName() {

echo 'Задание 2';
echo "<ul>";
global $example_persons_array;
    global $partsFullNane;
    $a = count($example_persons_array);

    for ($i=0; $i < $a; $i++) {

    $partOne = explode (' ', $example_persons_array[$i]['fullname']);
   $z = mb_substr($partOne[0], 0, 1);


    echo "<li>";
    echo $partOne[1]. ' ' . $z .  '.' . ';';
    echo "</li>";
    }
    echo "</ul>";
}

getShortName();


function getGenderFromName() {

    echo 'Задание 3';
    echo "<ol>";
    global $example_persons_array;
    $a = count($example_persons_array);

   for ($i=0; $i < $a; $i++) {

    $partOne = explode (' ', $example_persons_array[$i]['fullname']);

    $firstFemalePr = mb_substr($partOne[2], -3);
    if ($firstFemalePr == "вна") {
    $firstFemalePr = 1;
    }
    else {
    $firstFemalePr = 0;
    }

    $secondFemalePr = mb_substr($partOne[1], -1);
    if ($secondFemalePr == "а") {
        $secondFemalePr = 1;
        }
        else {
        $secondFemalePr = 0;
        }
    
    $thirdFemalePr = mb_substr($partOne[0], -2);
    if ($thirdFemalePr == "ва") {
        $thirdFemalePr = 1;
        }
        else {
        $thirdFemalePr = 0;
        }
        
        $firstMalePr =  mb_substr($partOne[2], -2);
    if ($firstMalePr == "ич") {
    $firstMalePr = 1;
    }
    else {
    $firstMalePr = 0;
    }

    $secondMalePr = mb_substr($partOne[1], -1);
    if ($secondMalePr == "й") {
        $secondMalePr = 1;
        }
    elseif ($secondMalePr == "н") {
        $secondMalePr = 1;
    }
        else {
        $secondMalePr = 0;
        }
    
    $thirdMalePr = mb_substr($partOne[0], -1);
    if ($thirdMalePr == "в") {
        $thirdMalePr = 1;
        }
        else {
        $thirdMalePr = 0;
        }

    $startPr = 0;
    $finalPr = $startPr - $firstFemalePr - $secondFemalePr - $thirdFemalePr + $firstMalePr + $secondMalePr + $thirdMalePr;

    if ($finalPr >= 1) {
        $finalPr = 'мужской';
    }
    elseif ($finalPr < 0) {
        $finalPr = 'женский';
    }
    else {
        $finalPr = 'не определен';
    }
    echo "<li>";
    print_r($finalPr);
    echo "</li>"; 
  }
  echo "</ol>";
}

getGenderFromName();




function getGenderDescription() {

    echo 'Задание 4';
    echo "<ul>";
    global $example_persons_array;
    $a = count($example_persons_array);
    $genderArray = array(0);

   for ($i=0; $i < $a; $i++) {

    $partOne = explode (' ', $example_persons_array[$i]['fullname']);


    $firstFemalePr = mb_substr($partOne[2], -3);
    if ($firstFemalePr == "вна") {
    $firstFemalePr = 1;
    }
    else {
    $firstFemalePr = 0;
    }

    $secondFemalePr = mb_substr($partOne[1], -1);
    if ($secondFemalePr == "а") {
        $secondFemalePr = 1;
        }
        else {
        $secondFemalePr = 0;
        }
    
    $thirdFemalePr = mb_substr($partOne[0], -2);
    if ($thirdFemalePr == "ва") {
        $thirdFemalePr = 1;
        }
        else {
        $thirdFemalePr = 0;
        }
        
        $firstMalePr =  mb_substr($partOne[2], -2);
    if ($firstMalePr == "ич") {
    $firstMalePr = 1;
    }
    else {
    $firstMalePr = 0;
    }

    $secondMalePr = mb_substr($partOne[1], -1);
    if ($secondMalePr == "й") {
        $secondMalePr = 1;
        }
    elseif ($secondMalePr == "н") {
        $secondMalePr = 1;
    }
        else {
        $secondMalePr = 0;
        }
    
    $thirdMalePr = mb_substr($partOne[0], -1);
    if ($thirdMalePr == "в") {
        $thirdMalePr = 1;
        }
        else {
        $thirdMalePr = 0;
        }

    $startPr = 0;
    $finalPr = $startPr - $firstFemalePr - $secondFemalePr - $thirdFemalePr + $firstMalePr + $secondMalePr + $thirdMalePr;

    if ($finalPr >= 1) {
        $finalPr = 'мужской';
    }
    elseif ($finalPr < 0) {
        $finalPr = 'женский';
    }
    else {
        $finalPr = 'не определен';
    }

    
    $genderArray[$i] = $finalPr;
 
  }

$manGender0 = array_filter($genderArray, function($genderOne){

    return ($genderOne) == 'мужской';
});
$manGenderFull = count($manGender0);

$womanGender0 = array_filter($genderArray, function($genderTwo){

    return ($genderTwo) == 'женский';
});
$womanGenderFull = count($womanGender0);

$itGender0 = array_filter($genderArray, function($genderThree){

    return ($genderThree) == 'не определен';
});
$itGenderFull = count($itGender0);

$allGender = count($genderArray);

$manForAll = $manGenderFull / $allGender * 100;
$womanForAll = $womanGenderFull / $allGender * 100;
$itForAll = $itGenderFull / $allGender * 100;

echo "<li>";
echo "Гендерный состав аудитории:";
echo "</li>";

echo "<li>";
echo "_________________________";
echo "</li>";

echo "<li>";
echo 'Мужчины:' . ' ' . round($manForAll, 2) . '%';
echo "</li>";

echo "<li>";
echo 'Женщины:' . ' ' . round($womanForAll, 2) . '%';;
echo "</li>";

echo "<li>";
echo 'не удалось определить:' . ' ' . round($itForAll, 2) . '%';;
echo "</li>";


echo "</ul>";
}

getGenderDescription();
