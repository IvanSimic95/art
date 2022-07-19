<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/config/vars.php';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
     $conn = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
     echo $e->getMessage();
}
$sql = "UPDATE blog SET title = :title, text = :text, shortlink = :shortlink WHERE id = :id";

$statement = $conn->prepare($sql);

$statement->execute([
     ':title' => $_REQUEST['title'],
     ':text' => $_REQUEST['content'],
     ':shortlink' => $_REQUEST['shortlink'],
     ':id' => $_REQUEST['postid']
]);
echo "Post saved successfully!";
?>