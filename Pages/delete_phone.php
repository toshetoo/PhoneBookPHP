<?php

require_once('../Repositories/PhoneRepository.php');
require_once('../Entities/Phone.php');

$phone = new Phone();
$repo = new PhoneRepository();
$phone = $repo->getById($_GET['id']);

$repo->delete($phone);

header("Location: index.php");