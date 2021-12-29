
<?php
// 1
$person = 'Иванов Иван Иванович';

function getPartsFromFullname($person)
{

    $splitName = explode(' ',  $person);
    $splittedName = [
        'surname' => $splitName[0],
        'name' => $splitName[1],
        'patronomyc' => $splitName[2],
    ];
    return $splittedName;
}
$splittedName =  getPartsFromFullname($person);


// 2 

$name = 'Ivan';
$surname = 'Ivanov';
$patronomyc = 'Ivanovich';

function getFullnameFromParts($name, $surname, $patronomyc)
{
    echo $surname . ' ' . $name . ' ' . $patronomyc;
}

getFullnameFromParts($name, $surname, $patronomyc);


// 3

function getShortName()
{
    $str = 'Ivanov Ivan Ivanovich';
    $arr_full = explode(' ', $str);
    $lastname = $arr_full[0];
    $firstname = $arr_full[1];


    $firstname_short = str_split($firstname)[0] . '. ';

    $result = $lastname . ' ' . $firstname_short;
    echo $result;
}
getShortName();

// 4
include 'array.inc.php';

function getGenderFromName($person)
{
    $splittedName = explode(' ',  $person);
    $fullname = [
        'surname' => $splittedName[0],
        'name' => $splittedName[1],
        'patronomyc' => $splittedName[2],
    ];
    
    $surname = $fullname['surname'];
    $name = $fullname['name'];
    $patronomyc = $fullname['patronomyc'];
    $count = 0;
    if (mb_substr($surname, -2) == 'ва' or mb_substr($name, -1) == 'а' or mb_substr($patronomyc, -3) == 'вна') {
        $count -= 1;
    } elseif (mb_substr($surname, -1) == 'в' or mb_substr($name, -1) == 'й' or mb_substr($name, -1) == 'н' or mb_substr($patronomyc, -2) == 'ич') {
        $count += 1;
    }
    if ($count < 0) {
        $gender =  'Женский пол';
    } elseif ($count > 0) {
        $gender = 'Мужской пол';
    } else {
        $gender = 'Неопределенный пол';
    }
    
    return $gender;
}

echo '<br>';
// 5 Обработка массивов, арифметика, обработка строк

function getGenderDescription($example_persons_array)
{
    $female = 0;
    $male = 0;
    $smt = 0;
    for ($i = 0; $i < count($example_persons_array); $i++) {
        $person = $example_persons_array[$i]['fullname'];
        $gender[$i] = getGenderFromName($person);
    }
    
    if ($gender =  'Женский пол') {
        $female += 1;
        
    } elseif ($gender = 'Мужской пол') {
        $male +=1;
        
    } else if ($gender = 'Неопределенный пол') {
        $smt += 1;
    
};
    $numberMale = $male/count($example_persons_array) * 100;
    $numberFemale = $female/count($example_persons_array) * 100;
    $smtg = $smt/count($example_persons_array) * 100;
    echo 'Гендерный состав аудитории: <hr>' . 'Мужчины - ' . round($numberMale,2). '%<br>' . 'Женщины - ' . round($numberFemale,2) . '%<br>' . 'Не удалось определить - ' . round($smtg, 2) . '%<br>';
}
getGenderDescription($example_persons_array);
?>








