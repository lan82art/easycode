<meta charset="UTF-8">
<?php
/*
r  только для чтения, помещает указатель в начало файла
r+ для чтения и записи указатель в начале файла
w только для записи, указатель в начале, пробует создать файл если его нет
w+ для записи и чтения, указатель в начале, пробует создать файл если его нет
a только для записи указатель в конце
a+ для записи и чтения указатель в конец

t разрешает использовать спец символы (новая строка, табуляция)
b не позволяет использовать спец символы.

*/

//file = fopen('file.txt','a+t'); // создает или открывает файл, два параметра, путь к файлу, права для файла.
//write($file,"hello \nhello"); // записывает в файл, два параметра, указатель на файл, инфа для записи.
//close($file); //закрывает файл
//$file = fopen('file.txt','r+t');
//while(!feof($file)){ //feof() возвращает тру при достижении конца файла
//    echo fread($file,1). '<br />'; // читает файл 1 указывает на сколько сдвинуть курсор
//}
//fseek($file,5); // устанавливает курсор в нужную позицию
//fclose($file);
//ile_put_contents('text/c.txt',"hello \r\nworld"); //пишет в файл контент, каждый раз перетирает файл автозакрывает.
//cho file_get_contents('text/c.txt'); //выводит файл автозакрытие файла
//cho file_exists('text/c.txt'); // проверка на существование файла
//cho filesize('text/c.txt'); // размера файл в байтах

//rename('text/c.txt','art.txt');
//unlink('c.txt'); //удаляет файл.

$data = file_get_contents('text.txt');
$convert = explode("\n", $data);
//$convert = explode('\n', $data); так не работает

for ($i=0;$i<count($convert);$i++)
{
    echo $convert[$i].'<br />';
}
?>
