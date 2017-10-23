
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ayam</title>
</head>
<body>
    Input : <input type="number" name="angka">
    <input type="submit" value="submit">
</body>

<?php

?>

<?php
$n = 5;
for ($x = $n ; $x >=1; $x--) {
	if ($x > 1)
	{
	echo "Anak ayam turun:" . $x . ", mati satu tinggal:" . ($x-1) . "<br>";
	}
	else{
	echo "Anak ayam turun :1, mati satu tinggal induknya.";
    }}
?>