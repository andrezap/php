<?php
require 'UserRepository.php';

$userRepository = new UserRepository();
$message = '';

if ($userRepository->exist($_POST['email'])) {
    $message = 'Seu email já existe no banco de dados';
} else {
    $user = $userRepository->save($_POST['name'], $_POST['email']);
    $message = 'Email cadastrado';
}

$users = $userRepository->listAll();
?>

<html>
    <body>
    <?php echo $message ?>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><a href="edit.php?name=<?= $user['name'] ?>">Edit</a> </li>
            <li><?= $user['name'] ?> </li>
            <li><?php echo $user['email'] ?></li>
            <br><br>
        <?php endforeach; ?>
    </ul>
    </body>
</html>

