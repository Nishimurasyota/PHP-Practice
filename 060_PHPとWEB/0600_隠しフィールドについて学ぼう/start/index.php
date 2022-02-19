<form action="post.php" method="post">
    <div>
        個数：<input type="number" name="num" id="">
    </div>
    <div>
        価格：<input type="number" name="price" id="">
    </div>
    <div>
        割引：10％
    </div>
    <input type="hidden" name="discount" value="10">
    <!-- type="hidden"とすることで隠しフィールドが設定できる -->
    <!-- 画面入力はしたくないがデータの送信をしたいときに隠しフィールドは使用する -->
    <button type="submit">合計</button>
</form>