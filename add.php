<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$id = uniqid();

$contact = [
    'id' => $id,
    'name' => $name,
    'phone' => $phone
];

$contacts = json_decode(file_get_contents('contacts.json'), true);
$contacts[] = $contact;
file_put_contents('contacts.json', json_encode($contacts));

header('Location: index.php');