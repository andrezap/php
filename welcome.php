<html>
    <body>
    Hello!
    </body>
</html>

<?php
require  'UserRepository.php';

$userRepository = new UserRepository();
$user = $userRepository->save($_POST['name'], $_POST['email']);

