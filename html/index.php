<?php

$names = ['Nikita', 'Elena', 'Peter', 'Anton', 'Mariya'];

for ($i = 1; $i <= 50; $i++) {
    $users[] = [
        'id' => $i,
        'name' => $names[array_rand($names, 1)],
        'age' => rand(18, 45)
    ];
}

$arrToJson = json_encode($users);
file_put_contents('../user.json', $arrToJson);
$arrFromJson = json_decode(file_get_contents('../user.json'), true);

$namesCount = [];
$averageAge = 0;
for ($i = 0; $i < count($names); $i++) {
    $namesCount["$names[$i]"] = 0;
    $count = 0;
    foreach ($arrFromJson as $user) {
        if ($user['name'] === $names[$i]) {
            $count++;
        }
        $averageAge += $user['age'];
    }
    $namesCount["$names[$i]"] = $count;
    $averageAge = $averageAge / count($arrFromJson);
}


echo '<pre>';
var_dump($namesCount);
echo '</pre>';
var_dump('Average Age of Users: ' . $averageAge);

