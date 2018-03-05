<form method="post" action="" enctype="multipart/form-data">
    <label>Название новости</label><br>
    <input type="text" name="title" class="<?php echo (isset($err['title']))?'err':''; ?>" value="<?php echo (isset($title))?$title:''; ?>"><br>
    <label>Текст новости</label><br>
    <textarea cols="40" rows="10" name="text" class="<?php echo (isset($err['text']))?'err':''; ?>"><?php echo (isset($text))?$text:''; ?></textarea><br>
    <label>Автор</label><br>
    <input type="text" name="author" class="<?php echo (isset($err['author']))?'err':''; ?>" value="<?php echo (isset($author))?$author:''; ?>"><br>
    <input type="hidden" name="size" value="100000"><br>
    <input type="file" name="uploadedfile" ><br><br>
    <input type="submit" name="add" value="Добавить">
    <label><?php echo $msg; ?></label>
</form>
