<?
    $rkProfile = "https://runkeeper.com/user/lexpostma";
    $rkContent = file_get_contents($rkProfile);
    $rkContent = strstr(strip_tags($rkContent), 'Kilometers'); // verwijderd alles tot eerste 'Kilometers' vermelding, en stript html tags
    $rkContent = trim(preg_replace('/\s+/', ' ', $rkContent)); // verwijderd enters
    $rkContent = str_replace(' ', '-', $rkContent); // vervangt spaties met dashes
    $rkContent = explode("-" , $rkContent)[1]; // split in blokken met spatie, toont de eerste
    $rkContent = number_format(substr($rkContent, 0, 4),'0',',','.'); // pakt alleen eerste 4 karakters, format het correct met . bij 1000
//     $rkContent = str_replace(".", ",", $rkContent); // vervangt . voor een , ivm US notatie

    echo $rkContent;
?>