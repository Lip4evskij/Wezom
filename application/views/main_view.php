<?php
//var_dump($data);
echo "<hr>";
if (isset($data['item']))
{
    foreach ($data['item'] as $row)
    {
        echo $row['title']."<br>";
        echo $row['text']."<br>";
        echo $row['data']."<br>";
        echo $row['author']."<hr>";
    }
}
else
{
    echo 'Нет данных';
}

?>
<?php
for ($i=1;$i<=$data['count_page'];$i++)
{?>
    <a href="/?page=<?php echo $i;?>"><?php  echo $i; ?></a>
<?php } ?>
