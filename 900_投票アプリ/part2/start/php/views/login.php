<h1>Loginページ</h1>
<form action="<?php echo CURRENT_URI; ?>" method="post">
    <div>
        ID:<input type="text" name="id">
    </div>
    <div>
        Password:<input type="password" name="pwd">
    </div>
    <div>
        <input type="submit" value="ログイン">
    </div>
</form>