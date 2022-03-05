<h1>Registerページ</h1>
<form action="<?php echo CURRENT_URI; ?>" method="post">
    <div>
        ID：<input type="text" name="id">
    </div>
    <div>
        Password：<input type="password" name="pwd">
    </div>
    <div>
        ニックネーム：<input type="text" name="nickname">
    </div>
    <div>
        <input type="submit" value="登録">
    </div>
</form>