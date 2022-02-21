<?php
session_start();
$self_url = $_SERVER["PHP_SELF"];
//現在のページURLをself_urlに格納している
?>

<form action="<?php echo $self_url; ?>" method="POST">
    <input type="text" name="task">
    <input type="submit" name="type" value="create">
</form>

<?php
if (isset($_POST["type"])) {
    if ($_POST["type"] === "create") {
        $_SESSION["todos"][] = $_POST["task"];
        echo "新しいタスク【{$_POST["task"]}】が追加されました";
    } else if ($_POST["type"] === "update") {
        $_SESSION["todos"][$_POST["id"]] = $_POST["task"];
        echo "タスク【{$_POST["task"]}】の名前が変更されました";
    } else if ($_POST["type"] === "delete") {
        array_splice($_SESSION["todos"], $_POST["id"], 1);
        //array_spliceで$_SESSION["todos"]の配列から$_POST["id"]でidを指定し1つ削除するようにしている
        echo "タスク【{$_POST["task"]}】が削除されました";
    }
}

/**
 * $_SESSION["todos"]が空の場合の処理、[]で初期化する
 */
if (empty($_SESSION["todos"])) {
    $_SESSION["todos"] = [];
    echo "タスクを追加しましょう";
    die();
    //die()が実行されるとdie()以下は実行されない
}

?>

<ul>
    <?php for ($i = 0; $i < count($_SESSION["todos"]); $i++) : ?>
    <!-- count($_SESSION["todos"])で$_SESSION["todos"]の長さを表している -->
    <li>
        <form action="<?php echo $self_url; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $i; ?>">
            <!-- deleteなどの処理を行う際に何番目か分かるように隠しフィールドでidを送る -->
            <input type="text" name="task" value="<?php echo $_SESSION["todos"][$i] ?>">
            <input type="submit" name="type" value="update">
            <input type="submit" name="type" value="delete">
        </form>
    </li>
    <?php endfor; ?>
    <!-- for文で:とendforを使用する事で中のHTMLをfor文の対象にすることができる -->
</ul>