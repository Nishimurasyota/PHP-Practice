<form action="receive.php">
    <div>
        <input type="text" name="account[id]">
        <!-- []があることで配列や連想配列として扱うことができる -->
    </div>
    <div>
        <input type="text" name="account[name]">
    </div>
    <div>
        <input type="text" name="account[pwd]">
    </div>
    <button type="submit">Button</button>
</form>