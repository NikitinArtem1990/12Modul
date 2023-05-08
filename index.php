<?php
$example_persons_array = [
    [
        'fullname' => 'Иванов Иван Иванович',
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



function getFullnameFromParts($surname, $name, $patronomyc) {

    return $surname . ' ' . $name . ' ' . $patronomyc;

};

function getPartsFromFullname($fullName) {

    $findArray = ['surname', 'name', 'patronomyc'];
    $nameArray = explode(' ', $fullName);

    return array_combine($findArray, $nameArray);
}

function getShortName($fullName) {

    $a = getPartsFromFullname($fullName);
    $b = (string) $a['surname'];
    $c = mb_substr($b, 0, 1);

    return $a['name'] . ' ' . $c . '.' . ';';
}

function getGenderFromName($fullName) {


    $a = getPartsFromFullname($fullName);
    $finalPr = 0;

    $womanFirst = mb_substr((string)$a['patronomyc'], -3);
    if ($womanFirst == 'вна') {
        $finalPr = $finalPr - 1;
    }
   
    $womanSecond = mb_substr((string)$a['name'], -1);
    if ($womanSecond == 'а') {
        $finalPr = $finalPr - 1;
    }

    $womanThird = mb_substr((string)$a['surname'], -2);
    if ($womanThird == 'ва') {
        $finalPr = $finalPr - 1;
    }

    $manFirst = mb_substr((string)$a['patronomyc'], -);
    if ($manFirst == 'ич') {
        $finalPr = $finalPr + 1;
    }

    $manSecond = mb_substr((string)$a['name'], -1);
    if ($manSecond == 'й') {
        $finalPr = $finalPr + 1;
    }
    elseif ($manSecond == 'н') {
        $finalPr = $finalPr + 1;
    }
  
    $manThird = mb_substr((string)$a['surname'], -1);
    if ($manThird == 'в') {
        $finalPr = $finalPr + 1;
    }
 
if (($finalPr <=> 0) > 0) {

    return 'мужской пол';
}

elseif (($finalPr <=> 0) < 0) {

    return 'женский пол';
}

else {

    return 'неопределенный пол';
}

}

function getGenderDescription($genderArray) {

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

echo "Гендерный состав аудитории:\n_________________________\nМужчины:" . ' ' . "-" . ' ' . round($manForAll, 1) . "%\nЖенщины:" . ' ' . "-" . ' ' . round($womanForAll, 1) . "%\nНе удалось определить:" . ' ' . "-" . ' ' . round($itForAll, 1) . "%";
    
}
