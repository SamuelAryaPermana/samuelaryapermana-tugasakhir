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
                $kalori=655+(9.6*$berat)+(1.8*$tinggi)-(4.7*$usia);
                return $kalori;
                break;
            case 'female':
                $kalori=655+(9.6*$berat)+(1.8*$tinggi)-(4.7*$usia);
                return $kalori;
                break;  
        }
    }
    // public function saranKal($bmi,$kal){
    //     if ($bmi<18.5) {
    //         $kal=$kal+200
    //         "kurang, $kal"
    //         return $op;
    //     }
    //     elseif($bmi>=18.5 AND $bmi<=22.9) {
    //         $op ="normal, $kal";
    //         return $op;
    //     }
    //     elseif($bmi>=23 AND $bmi<=29.9) {
    //         $kal = $kal-200
    //         $op ="berlebih, $kal";
    //         return $op;
    //     }
    //     else{
    //         $kal = $kal-300
    //         $op ="obesitas, $kal";
    //         return $op;

    //     }


    // }
}
?>