<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funkcijos_nd</title>
</head>
<body>

<?php

echo '<pre>' ;
echo '1. Parašykite funkciją, kurios argumentas būtų tekstas, 
kuris yra įterpiamas į h1 tagą';
echo '</pre>';

function printText($text) //argumetas $text
{
    echo '<h1>'. $text .'</h1>';
}

printText("sveiki");

echo '<pre>' ;
echo '2. Parašykite funkciją su dviem argumentais, pirmas argumentas tekstas,
įterpiamas į h tagą, o antrasis tago numeris (1-6). Rašydami šią funkciją
remkitės pirmame uždavinyje parašytą funkciją;';
echo '</pre>';

function printMore($text, $h = 1) //argumetas $text
{
    echo "<h$h>$text </h$h>";
}

printMore("sveiki", 4);


echo '<pre>' ;
echo '3. Generuokite atsitiktinį stringą, pasinaudodami kodu md5(time()). Visus
skaitmenis stringe įdėkite į h1 tagą. Raides palikite. Jegu iš eilės eina keli
skaitmenys, juos į tagą reikią dėti kartu (h1 atsidaro prieš pirmą ir
užsidaro po paskutinio) Keitimui naudokite pirmo patobulintą (jeigu
reikia) uždavinio funkciją ir preg_replace_callback()';
echo '</pre>';

$string = md5(time());
echo $string;

$pattern = '/[^0-9]+/i';
echo "<br>";


function printNumbers($outputString) //argumetas $text
{
    return "<h1 style=display:inline>{$outputString[0]}</h1>";
}

$result1 = preg_replace_callback($pattern, 'printNumbers', $string);
echo $result1."<br><br>";
echo "<hr>";

// preg_replace_callback(pattern, callback, input, limit, count);


echo '<pre>' ;
echo '4. Parašykite funkciją, kuri skaičiuotų, iš kiek sveikų skaičių jos
 argumentas dalijasi be liekanos (išskyrus vienetą ir patį save) Argumentą užrašykite
taip, kad būtų galima įvesti tik sveiką skaičių';
echo '</pre>';

function divisor($number)    //kaip uzrasyta reikalauj
{
    if(!is_int($number)){
        echo "Iveskite sveika skaiciu";
        return;
    }$count = 0;
    for ($i=2; $i < $number; $i++) {  
        if ($number % $i == 0){
            $count++;
        }
    }
    
    return $count;
    // echo "Total sum: " . array_sum($divisors) . "\n";
}
$result2 = divisor(10);
echo $result2;

echo '<pre>' ;
echo '5. Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai
skaičiai nuo 33 iki 77. Išrūšiuokite masyvą pagal daliklių be liekanos kiekį
mažėjimo tvarka, panaudodami ketvirto uždavinio funkciją.';
echo '</pre>';

$arr5 = [];
for ($i=0; $i < 100; $i++) { 
    $arr5[] = rand(33,77);
}

print_r($arr5);
echo "<hr>";
// fifth($arr5);                               Pagal Dariu pamokoje
// function fifth($arr5){

//     $tmpArr = [];
//     $newArr5 = [];
//     echo "Masyvas: ".implode(", ", $arr5)."<br><br>";
//     foreach ($arr5 as $value) {
//         $tmpArr[] = divisor($value);
//     }
//     asort($tmpArr);
//     foreach ($tmpArr as $key => $value) {
//         $newArr5[] = $arr5[$key];
//     }
//  } 
//  echo "Naujas masyvas:".implode(", ", $newArr5). "<br><br>";
//  echo "<hr>";
//-------------------pagal Ema-----------
function penktaFunkcija($array){
    $countArr = count($array);
    for ($i=0; $i < $countArr; $i++) { 
        $divisors = divisor($array[$i]);
        $tempArr= array($divisors, $array[$i]);
        $array[$i] = $tempArr;
        # code...
    }
    sort($array);
    return $array;
}

$newArray = penktaFunkcija($arr5);
print_r($newArray);

echo '<pre>' ;
echo '6. Sugeneruokite masyvą iš 100 elementų, kurio reikšmės atsitiktiniai
skaičiai nuo 333 iki 777. Naudodami 4 uždavinio funkciją iš masyvo
ištrinkite pirminius skaičius.';
echo '</pre>';
// $arr6 = [];
//     for ($i=0; $i < 100; $i++) { 
//         $arr6[$i] = rand(333,777);
    
//     }
//     print_r($arr6);


//     function is_prime($n){
//         if ($n <= 3) {
//             return $n > 1;
//         } elseif (($n % 2 == 0) or ($n % 3 == 0)) {
//             return false;
//         }
//         $i = 5;
//         while ($i * $i <= $n) {
//             if ($n % $i == 0) {
//                 return false;
//             }
//             $i += 2;
//             if ($n % $i == 0) {
//                 return false;
//             }
//             $i += 4;
//         }
//         return $n;
//         unset($arr6[$i]);
//     }
// echo "<hr>";
// echo "is masyvo isrinkti pirminiai skaiciai";
//     for ($i=0; $i < 100; $i++) { 
//         $arr6[$i] = rand(333,777);
//         $primenumber = $arr6[$i];
//         $mersenne = is_prime($primenumber);
//         echo $mersenne."\n";
//     }
//-----------------------
    $array6 = [];
foreach (range(0, 100) as $_) {
    $array6[] = rand(333, 777);
}
print_r($array6) . '<br>';


$ilgis = count($array6); //geriau kintamaji suskurti ir ji paduoti i for, negu iskarto rasyti, nes nepaskaiciuoja viso ilgio
echo "<hr>";
for ($i = 0; $i < $ilgis; $i++) {
    if (divisor($array6[$i]) == 0) {
        unset($array6[$i]);  //istrina viska

    }
}
print_r($array6);


echo '<pre>' ;
echo '7. Sugeneruokite atsitiktinio (nuo 10 iki 20) ilgio masyvą, kurio visi,
 išskyrus paskutinį, elementai yra atsitiktiniai skaičiai nuo 0 iki 10, o 
 paskutinis masyvas, kuris generuojamas pagal tokią pat salygą kaip ir pirmasis
masyvas. Viską pakartokite atsitiktinį nuo 10 iki 30 kiekį kartų.
Paskutinio masyvo paskutinis elementas yra lygus 0;
';
echo '</pre>';

$arr7 = [];
echo "<pre>";
$rand = rand(10,30);
$result = recursive($rand);
print_r($result);
echo "</pre>";
 function recursive($times){
     if($times > 0) {
     $arr = [];
     $rand = rand(10,20);
     for ($i=0; $i < $rand-1; $i++) { 
        $arr[] = rand(0,10);
     }
     $arr[] = recursive($times - 1);
    }else{
        $arr = 0;
    }

     return($arr);
 }

 echo '<pre>' ;
 echo '8. Suskaičiuokite septinto uždavinio elementų, 
 kurie nėra masyvai, sumą. Skaičiuoti reikia visuose masyvuose 
 ir submasyvuose.
 ';
 echo '</pre>';
$arr8 = recursive($rand);
 function suma($int)
 {
     $sum = 0;
     foreach ($int as $value) {
         if (is_numeric($value)) {
             $sum += $value;
         } else {
             $sum += suma($value);
         }
         
     }
     return $sum;
 }
 echo "--------SUMA VISU REIKSMIU ESANCIU VISUOSE ARRAY:  ";
 
print_r(suma($arr8));

echo '<pre>' ;
 echo '9. Sugeneruokite masyvą iš trijų elementų, kurie yra atsitiktiniai skaičiai
 nuo 1 iki 33. Jeigu tarp trijų paskutinių elementų yra nors vienas ne
 pirminis skaičius, prie masyvo pridėkite dar vieną elementą- atsitiktinį
 skaičių nuo 1 iki 33. Vėl patikrinkite pradinę sąlygą ir jeigu reikia
 pridėkite dar vieną elementą. Kartokite, kol sąlyga nereikalaus pridėti
 elemento.
 ';
 echo '</pre>';

$arr9 = [];
for ($i=0; $i < 3; $i++) { 
    $arr9[] = rand(1, 33);
}
echo '<pre>' ;
 print_r($arr9);
 echo '</pre>';
 function primeCheck($int){     // pirminiu skaiciu tikrinimas
    if ($int == 1) 
    return 0; 
    for ($i = 2; $i <= $int/2; $i++){ 
        if ($int % $i == 0) 
            return 0; 
    } 
    return 1; 
} 
  while (
      !primeCheck($arr9[count($arr9)-1]) ||
      !primeCheck($arr9[count($arr9)-2]) ||
      !primeCheck($arr9[count($arr9)-3]) 
  ) {
    $arr9[]= rand(1,33);
  }

  echo '<pre>' ;
 print_r($arr9);
 echo '</pre>';


 echo '<pre>' ;
 echo '10. Sugeneruokite masyvą iš 10 elementų, kurie yra masyvai iš 10 elementų,
 kurie yra atsitiktiniai skaičiai nuo 1 iki 100. Jeigu tokio didelio masyvo (ne
 atskirai mažesnių) pirminių skaičių vidurkis mažesnis už 70, suraskite
 masyve mažiausią skaičių (nebūtinai pirminį) ir prie jo pridėkite 3. Vėl
 paskaičiuokite masyvo pirminių skaičių vidurkį ir jeigu mažesnis nei 70
 viską kartokite.
 ';
 echo '</pre>';


 $arr10 = [];
 for ($i=0; $i < 10; $i++) { 
     $arrTmp[] = [];
     for ($a=0; $a < 10; $a++) { 
         $arrTmp[] = rand(1, 100);
     }
     $arr10[] = $arrTmp;
 }
 echo '<pre>' ;
 print_r($arr10);
 echo '</pre>';


 echo '<pre>' ;
 echo '11. Sugeneruokate masyvą, kurio ilgis atsitiktinai kinta nuo 10 iki 100.
 Masyvo reikšmes sudaro atsitiktiniai skaičiai 0-100 ir masyvai. Santykis
 skaičiuojamas atsitiktinai, bet taip, kad skaičiai sudarytų didesnę dalį nei
 masyvai. Reikšmių masyvų ilgis nuo 1 iki 5, o reikšmės analogiškos (nuo 50% iki
 100% atsitiktiniai skaičiai 0-100, o likusios masyvai) ir t.t. kol visos galutinės
 reikšmės bus skaičiai ne masyvai. Suskaičiuoti kiek elementų turi masyvas.
 Suskaičiuoti masyvo elementų (tie kurie ne masyvai) sumą. Suskaičiuoti
 maksimalų masyvo gylį. Atvaizduokite masyvą grafiškai . Masyvą pavazduokite
 kaip div elementą, kuris yra display:flex, kurio viduje yra skaičiai. Kiekvienas
 div elementas turi savo unikalų id ir unikalią background spalvą (spalva pvz
 nepavaizduota). pvz: <div id=”M1”>10, 46, 67, <div id=”M2”> 89, 45,
 89, 34, 90, <div id=”M3”> 84, 97 </div> 90, 56 </div> </div>.
 ';
 echo '</pre>';


?>




</body>
</html>