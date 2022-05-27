<?php
error_reporting(0);
class rumus{
    public function hitungBMI($berat,$tinggi){
        $tinggi = $tinggi /100;
        $hasil=$berat/ ($tinggi*$tinggi);
        return $hasil; 
    }
    public function hitungKal($gender,$usia,$berat,$tinggi){
        switch ($gender) {
            case 'male':
                $kalori=655+(13.7*$berat)+(5*$tinggi)-(6.8*$usia);
                return $kalori;
                break;
            case 'female':
                $kalori=655+(9.6*$berat)+(1.8*$tinggi)-(4.7*$usia);
                return $kalori;
                break;  
        }
    }
}
?>
