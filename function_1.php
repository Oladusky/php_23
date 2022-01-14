<?php
// 1
include 'array.inc.php';

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



// 2 



function getFullnameFromParts($person)
{
    $splittedName =  getPartsFromFullname($person);
    return $splittedName['surname'] . ' ' . $splittedName['name'] . ' ' .$splittedName['patronomyc'];
}




// 3

function getShortName($person)
{
    $splittedName =  getPartsFromFullname($person);
    $result = $splittedName['surname'] . ' ' . $splittedName['name'][0] . '.';
    return $result;
}


// 4


function getGenderFromName($person)
{

    $splittedName =  getPartsFromFullname($person);
    $count = 0;
    if (mb_substr($splittedName['surname'], -2) == 'ва' or mb_substr($splittedName['name'], -1) == 'а' or mb_substr($splittedName['patronomyc'], -3) == 'вна') {
        $count ++;
    } elseif (mb_substr($splittedName['surname'], -1) == 'в' or mb_substr($splittedName['name'], -1) == 'й' or mb_substr($splittedName['name'], -1) == 'н' or mb_substr($splittedName['patronomyc'], -2) == 'ич') {
        $count --;
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
    for ($i = 0; $i < count($example_persons_array); $i++) {
        $person = $example_persons_array[$i]['fullname'];
        $gender[$i] = getGenderFromName($person);
    }
    $female = 0;
    $male = 0;
    $smt = 0;
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
