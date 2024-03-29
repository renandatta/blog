<?php



///=====================================================================================================================


function format_number($number, $currency = 'IDR')
{
    if($number != ""){
        return $currency == 'IDR' ? number_format($number, 0, ',', '.') : number_format($number, 2, '.', ',');
    }
    return "0";
}

function format_decimal($number)
{
    if($number != ""){
        return number_format($number, 2, ',', '.');
    }
    return "0";
}

function fulldate($date, $divider = " ", $dayEnable = false, $shortMonth = false)
{
    if ($date != "") {
        $dayText = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
        $monthText = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $monthShortText = array('Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des');

        $dayInt = date('N', strtotime($date));
        $date = explode("-", date('Y-m-d', strtotime($date)));
        $monthInt = (int)$date[1];

        $result = [];
        if ($dayEnable == true) array_push($result, $dayText[date('N', $dayInt)-1] . ', ');
        array_push($result, $date[2]);
        array_push($result, $shortMonth == true ? $monthShortText[$monthInt-1] : $monthText[$monthInt-1]);
        array_push($result, $date[0]);
        return join($divider, $result);
    }
    return "";
}

function format_date($date, $divider = "-")
{
    if ($date != "") {
        $date = explode("-", date('Y-m-d', strtotime($date)));
        return join($divider, [$date[2], $date[1], $date[0]]);
    }
    return "";
}

function format_time($time, $short = true)
{
    if ($time != null) {
        return $short == true ? date('H:i', strtotime($time)) : date('H:i:s', strtotime($time));
    }
    return "-";
}

function numberToRoman($number)
{
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $result = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if($number >= $int) {
                $number -= $int;
                $result .= $roman;
                break;
            }
        }
    }
    return $result;
}

function spellNumberCore($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = spellNumberCore($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = spellNumberCore($nilai/10)." puluh". spellNumberCore($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . spellNumberCore($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = spellNumberCore($nilai/100) . " ratus" . spellNumberCore($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . spellNumberCore($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = spellNumberCore($nilai/1000) . " ribu" . spellNumberCore($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = spellNumberCore($nilai/1000000) . " juta" . spellNumberCore($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = spellNumberCore($nilai/1000000000) . " milyar" . spellNumberCore(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = spellNumberCore($nilai/1000000000000) . " trilyun" . spellNumberCore(fmod($nilai,1000000000000));
    }
    return $temp;
}

function spellNumber($number)
{
    return $number > 0 ? trim(spellNumberCore($number)) : "minus ". trim(spellNumberCore($number));
}

function dateDifference($date1, $date2)
{
    $tgl1 = new DateTime($date1);
    $tgl2 = new DateTime($date2);
    $d = $tgl2->diff($tgl1)->days + 1;
    return $d;
}

function unformat_date($date)
{
    if ($date != "") {
        return date('Y-m-d', strtotime($date));
    }
    return null;
}

function unformat_number($number)
{
    if ($number != '') {
        $number = str_replace(".", "", $number);
        $number = str_replace(",", ".", $number);
        return $number;
    }
    return 0;
}
