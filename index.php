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



getFullnameFromParts($surname, $name, $patronomyc) {

    return $surname . ' ' . $name . ' ' . $patronomyc;

};

getPartsFromFullname($fullName) {

    $findArray = ['surname', 'name', 'patronomyc'];
    $nameArray = explode(' ', $fullName);

    return array_combine($findArray, $nameArray);
}

getShortName($fullName) {

    $a = getPartsFromFullname($fullName);
    $b = mb_substr($a[surname], 0, 1);

    return $a[name] . ' ' . $b . '.' . ';';
}

getGenderFromName($fullName) {


    $a = getPartsFromFullname($fullName);
    $finalPr = 0;

    $womanFirst = mb_substr($a[patronomyc], -3);
    if ($womanFirst == 'вна') {
        $finalPr -= 1;
    }
   
    $womanSecond = mb_substr($a[name], -1);
    if ($womanSecond == 'а') {
        $finalPr -= 1;
    }

    $womanThird = mb_substr($a[surname], -2);
    if ($womanThird == 'ва') {
        $finalPr -= 1;
    }

    $manFirst = mb_substr($a[patronomyc], -);
    if ($manFirst == 'ич') {
        $finalPr += 1;
    }

    $manSecond = mb_substr($a[name], -1);
    if ($manSecond == 'й') {
        $finalPr += 1;
    }
    elseif ($manSecond == 'н') {
        $finalPr += 1;
    }
  
    $manThird = mb_substr($a[surname], -1);
    if ($manThird == 'в') {
        $finalPr = +1;
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

getGenderDescription($genderArray) {

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

echo "Гендерный состав аудитории:\n_________________________\nМужчины:" . ' ' . "-" . ' ' . round($manForAll, 2) . "%\nЖенщины:" . ' ' . "-" . ' ' . round($womanForAll, 2) . "%\nНе удалось определить:" . ' ' . "-" . ' ' . round($itForAll, 2) . "%";
    
}
