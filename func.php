<?php
if (strpos($i1i, "Obfuscation provided by Unknowndevice64 - Free Online PHP Obfuscator") == false) {
} if (!strstr($_SERVER['SCRIPT_NAME'], "panel")) {
	function clearSQL($q){
    if(get_magic_quotes_gpc())
    {
        $q = stripslashes($q);
    }
    $q = strip_tags($q);
    $q = htmlspecialchars($q);
    $q = str_replace("script", "blocked", $q);
    $q = str_replace("select", "", $q);
    $q = str_replace("SELECT", "", $q);
    $q = str_replace("UPDATE", "", $q);
    $q = str_replace("update", "", $q);
    $q = str_replace("delete", "", $q);
    $q = str_replace("DELETE", "", $q);
    $q = str_replace("UNION", "", $q);
    $q = str_replace("union", "", $q);
    $q = str_replace('"', "", $q);
    $q = str_replace("%", "", $q);
    $q = str_replace("`","",$q);
    $q = str_replace("'","‘",$q);
    $q = str_replace("\'","",$q);
    $q = str_replace("&","",$q);
    $q = str_replace("%","",$q);
    $q = str_replace("<","",$q);
    $q = str_replace(">","",$q);
    $q = str_replace(" OR ","",$q);
    $q = str_replace("1=1","",$q);
$q = addslashes($q); 
$q = trim($q); 
return $q;
}
} else {
	function clearSQL($q){
    $q = str_replace("'","‘",$q);
    $q = addslashes($q);
    $q = trim($q); 
return $q;
}
}
 function AyarGetir($item1, $t) {
 	global $conn;
 	if ($t=="one") {
 		return $conn->query("SELECT * FROM ayarlar WHERE item1 = '{$item1}'")->fetch(PDO::FETCH_ASSOC);
 	} else {
 		return $conn->query("SELECT * FROM ayarlar WHERE item1 = '{$item1}'");
 	}
 }
function Parcala($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com.tr/');
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$chData = curl_exec($ch);
		return $chData;
		curl_close($ch);
	}
function PriKod($text){
	$text = trim($text);
		$trHarf = array('•','’',"'",'|','ñ',' ', 'ß', 'ä', '.',',','ş','Ş','ö','Ö','ğ','Ğ','ü','Ü','ç','Ç','ı','İ',"'",'"','%','é','/','?','=','(',')','_',':',';','~','¨','<','>','£','#','$','½','{','}','*','!','\\','&','^','+');
		$enHarf = array('','-','','-','n','-','b','a','','','s','s','o','o','g','g','u','u','c','c','i','i','-','-','-','e','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-');
		$text = str_replace($trHarf, $enHarf, $text);
		$text = str_replace("---", "-", $text);
		$text = str_replace("--", "-", $text);
		$text = strtolower($text);
		return $text;
	}
function UstPanel() {
	global $Siteurl;
	return Parcala("https://nivusoft.com/alfa/inc/bildirim.php?domain=".$Siteurl);
}
function baslikkes($metin, $adet){
	$metin = mb_substr($metin, 0, $adet,"UTF-8");
	$metin = explode(" ", $metin);
	$cikti = "";
	foreach ($metin as $sonuc) {
		if (strlen($sonuc)>3) {
		$cikti = $cikti.' '.$sonuc;
		}
	}
	return $cikti;

}
function platform($gelen, $tur) {
	global $conn;
	if ($tur=="ad") {
		$bul = $conn->query("SELECT * FROM platform WHERE pt_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
		$cikti = $bul["pt_name"];
	} elseif ($tur == "pri") {
		$bul = $conn->query("SELECT * FROM platform WHERE pt_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
		$cikti = $bul["pt_primary"];
	} elseif ($tur=="list") {
		$cikti = $conn->query("SELECT * FROM platform");
	}
	return $cikti;
}
function hizmet($gelen, $tur) {
	global $conn;
	if ($tur=="ad") {
		$bul = $conn->query("SELECT * FROM hizmetler WHERE hz_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
		$cikti = $bul["hz_adi"];
	} elseif ($tur=="hz_icon") {
		$bul = $conn->query("SELECT * FROM hizmetler WHERE hz_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
		$cikti = $bul["hz_icon"];
	} elseif ($tur=="hz_pri") {
		$bul = $conn->query("SELECT * FROM hizmetler WHERE hz_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
		$cikti = $bul["hz_pri"];
	} elseif ($tur=="pt_adi") {
		$bul = $conn->query("SELECT * FROM hizmetler WHERE hz_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
		$bul = $conn->query("SELECT * FROM platform WHERE pt_id = '{$bul["pt_tax"]}'")->fetch(PDO::FETCH_ASSOC);
		$cikti = $bul["pt_name"];
	} elseif ($tur=="pt_primary") {
		$bul = $conn->query("SELECT * FROM hizmetler WHERE hz_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
		$bul = $conn->query("SELECT * FROM platform WHERE pt_id = '{$bul["pt_tax"]}'")->fetch(PDO::FETCH_ASSOC);
		$cikti = $bul["pt_primary"];
	} elseif ($tur=="pt_icon") {
		$bul = $conn->query("SELECT * FROM hizmetler WHERE hz_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
		$bul = $conn->query("SELECT * FROM platform WHERE pt_id = '{$bul["pt_tax"]}'")->fetch(PDO::FETCH_ASSOC);
		$cikti = $bul["pt_icon"];
	} elseif ($tur=="pt_id") {
		$bul = $conn->query("SELECT * FROM hizmetler WHERE hz_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
		$cikti = $bul["pt_tax"];
	}
	return $cikti;
}
function paket($gelen, $tur) {
	global $conn;
	$bul = $conn->query("SELECT * FROM paketler WHERE pk_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
	if ($tur=="adet") {
		$cikti = $bul["pk_adet"];
	} elseif ($tur=="ucret") {
		$cikti = $bul["pk_fiyat"];
	} elseif ($tur=="ad") {
		$cikti = $bul["pk_adi"];
	}
	return $cikti;
}
function Statusonuc($gelen) {
	global $conn;
	$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE sp_code = '{$gelen}'");
	$varmi->execute();
	if ($varmi->fetchColumn()>0) {
		$sonuc = $conn->query("SELECT * FROM siparisler WHERE sp_code = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
		$cikti["name"] = paket($conn, $sonuc["sp_musteri_paket"], 'ad');
		if ($sonuc["sp_durum"]==0) { $cikti["statu"] = 'Ödeme Bekliyor'; $cikti["renk"] = 'red'; }
		elseif ($sonuc["sp_durum"]==1) { $cikti["statu"] = 'Onay Bekliyor'; $cikti["renk"] = 'red'; }
		elseif ($sonuc["sp_durum"]==2) { $cikti["statu"] = 'TAMAMLANDI'; $cikti["renk"] = 'green'; }
		elseif ($sonuc["sp_durum"]==3) { $cikti["statu"] = 'Bilgiler Hatalı'; $cikti["renk"] = 'orange'; }
		else {$cikti["statu"] = 'İşlem Bekliyor'; $cikti["renk"] = 'red';}
		return $cikti;
	}
	return false;
}

function namesub ($ad) {
	return mb_substr($ad, 0, 16, "UTF-8").'..';
}
function SiparisIptal($code){
	global $conn;
	$sp = $conn->prepare("SELECT * FROM siparisler WHERE sp_code = ?");
	$sp->execute([$code]);
	$sp = $sp->fetch();
	$siparis = $conn->prepare("DELETE FROM siparisler WHERE sp_code = ?");
	$silsiparis = $siparis->execute(array($code));
	$siparis = $conn->prepare("DELETE FROM siparis_islem WHERE sp_code = ?");
	$silsiparis = $siparis->execute(array($sp["sp_id"]));
    return true;
}
function odemeyontemi($gelen) {
	if ($gelen==0) {
		$sonuc = "KREDİ KARTI";
	} elseif ($gelen == 1) {
		$sonuc = "EFT-HAVALE";
	} else {
		$sonuc = "DİĞER";
	}
	return $sonuc;
}
function ListeTur($gelen) {
	if ($gelen == "tumu") { $s[1] = "Tüm Siparişler"; $s[2] = "tumu"; }
	elseif ($gelen == "acik") {$s[1] = "Açık Siparişler"; $s[2] = "acik"; }
	elseif ($gelen == "kapali") {$s[1] = "Kapanan Siparişler"; $s[2] = "kapalı"; }
	elseif ($gelen == 0) {$s[1] = "Ödeme Bekleyenler"; $s[2] = 0; }
	elseif ($gelen == 1) {$s[1] = "İşlem Bekleyenler"; $s[2] = 1; }
	elseif ($gelen == 2) {$s[1] = "Gönderim Sırasındakiler"; $s[2] = 2; }
	elseif ($gelen == 3) {$s[1] = "Kısmi Tamamlananlar"; $s[2] = 3; }
	elseif ($gelen == 4) {$s[1] = "Tamamlananlar"; $s[2] = 4; }
	elseif ($gelen == 5) {$s[1] = "İptal Edilenler"; $s[2] = 5; }
	elseif ($gelen == 10) {$s[1] = "Diğer Siparişler"; $s[2] = 10; }
	else { $s[1] = "Diğer Siparişler"; $s[2] = "diger"; }
	return $s;
}

/** SİPARİŞİ DURUMLARA GÖRE AYRIŞTIRIP LİSTELETEN FONKSİYON */
function SiparisGetir($durum, $start) {
	global $conn;
	if (is_numeric($durum)) {
		$siparisler = $conn->query("SELECT * FROM siparisler WHERE sp_durum = '{$durum}' ORDER BY sp_time DESC LIMIT $start, 20");
	}
	elseif ($durum == "tumu") {
		$siparisler = $conn->query("SELECT * FROM siparisler WHERE sp_durum != 10 ORDER BY sp_time DESC LIMIT $start, 20");
	} elseif ($durum == "acik") {
		$siparisler = $conn->query("SELECT * FROM siparisler WHERE (sp_durum < 4 or sp_durum = 6) AND sp_durum != 10 AND sp_durum != 0 ORDER BY sp_time DESC LIMIT $start, 20");
	} elseif ($durum == "kapalı") {
		$siparisler = $conn->query("SELECT * FROM siparisler WHERE sp_durum = 4 or sp_durum = 5 ORDER BY sp_time DESC LIMIT $start, 20");
	} elseif ($durum == "diger") {
		$siparisler = $conn->query("SELECT * FROM siparisler WHERE sp_durum > 5 AND sp_durum < 10 ORDER BY sp_time DESC LIMIT $start, 20");
	} else {
		$siparisler = $conn->query("SELECT * FROM siparisler WHERE sp_durum = '{$durum}' ORDER BY sp_time DESC LIMIT $start, 20");
	}
	return $siparisler;
}
function PlatformControl($gelen) {
	global $conn;
	$varmi = $conn->prepare("SELECT COUNT(*) FROM platform WHERE pt_primary = '{$gelen}'");
	$varmi->execute();
	if($varmi->fetchColumn()>0) {
		return true;
	}
}
function Sayfalama($durum, $start, $sonid) {
	global $conn;
	if (is_numeric($durum)) {
		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE sp_durum = '{$durum}' and sp_id < '{$sonid}'  ORDER BY sp_time DESC");
	}
	elseif ($durum == "tumu") {
		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE sp_durum != 10 and sp_id < '{$sonid}'  ORDER BY sp_time DESC");
	} elseif ($durum == "acik") {
		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE (sp_durum < 4 or sp_durum = 6) AND sp_durum != 10 and sp_id < '{$sonid}'  ORDER BY sp_time DESC");
	} elseif ($durum == "kapalı") {
		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE sp_durum = 4 or sp_durum = 5 and sp_id < '{$sonid}'  ORDER BY sp_time DESC");
	} elseif ($durum == "diger") {
		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE sp_durum > 5 AND sp_durum < 10 and sp_id < '{$sonid}'  ORDER BY sp_time DESC");
	} else {
		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE sp_durum = '{$durum}' and sp_id < '{$sonid}'  ORDER BY sp_time DESC");
	}
	$varmi->execute();
	$sonuc = $varmi->fetchColumn();
	if ($start>19) { ?>
		<i onclick="SiparisListele('<?php echo $durum;?>', <?php echo $start-20;?>)" id="before" class="fa fa-chevron-circle-left"></i>
	<?php }
	if ($sonuc>0) { ?>
		<i onclick="SiparisListele('<?php echo $durum;?>', <?php echo $start+20;?>)" id="next" class="fa fa-chevron-circle-right"></i>
	<?php }
}
/** SİPARİŞ DURUMUNA GÖRE DÖNDÜRÜLECEK BİLGİ MESAJLARI */
function SiparisDurum($gelen) {
	if ($gelen == 0) {
		$s[1] = "ÖDEME BEKLİYOR";
		$s[2] = "warning";
		$s[3] = "Siparişin ödemesini onayla, iptal et yada tamamen sistemden sil.";
		$s[4] = "Siparişinizin işleme alınabilmesi için ödeme yapmanız gerekiyor.";
	}
	elseif ($gelen == 1) {
		$s[1] = "İŞLEM BEKLİYOR";
		$s[2] = "secondary";
		$s[3] = "Siparişe aşağıdan otomatik servis tanımlayıp otomatik olarak gönderebilir yada manuel olarak bir işlem yaptıysanız tamamlandı olarak işatetleyebilirsiniz.";
		$s[4] = "Siparişiniz işleme alındı. Servis yoğunluğuna göre kısa süre içerisinde gönderim sağlanacak";
	}
	elseif ($gelen == 2) {
		$s[1] = "İŞLEM SIRASINDA";
		$s[2] = "primary";
		$s[3] = "Siparişiniz otomatik olarak ilgili bayiye gönderildi. İlgili bayiden sonuçlar belli aralıklarla çekilmekte. Ancak siz bu siparişi işlem sonucu beklemeden tamamlandı olarak işaretleyebilirsiniz";
		$s[4] = "Siparişiniz işleme alındı. Servis yoğunluğuna göre kısa süre içerisinde gönderim sağlanacak";
	}
	elseif ($gelen == 3) {
		$s[1] = "KISMİ TAMAMLANDI";
		$s[2] = "niv";
		$s[3] = "İlgili bayiye gönderilen siparişden kısmi tamamlandı cevabı alındı ve sisteme işlendi. Lütfen bu siparişle ilgili manuel olarak işlem yapın ve siparişi tamamlandı olarak onaylayın";
		$s[4] = "Siparişiniz işleme alındı. Servis yoğunluğuna göre kısa süre içerisinde gönderim sağlanacak";
	}
	elseif ($gelen == 4) {
		$s[1] = "TAMAMLANDI";
		$s[2] = "success";
		$s[3] = "Sipariş başarıyla tamamlandı";
		$s[4] = "Siparişiniz başarıyla sonuçlandırıldı. Bizi tercih ettiğiniz için teşekkürler.";
	}
	elseif ($gelen == 5) {
		$s[1] = "İPTAL EDİLDİ";
		$s[2] = "warning";
		$s[3] = "Bu sipariş iptal edildi. Dilerseniz tekrar aktif edebilirsiniz.";
		$s[4] = "Siparişiniz iptal edildi. Bunun bir hata olduğunu düşünüyorsanız lütfen iletişim bölümünden bize ulaşın.";
	}
	elseif ($gelen == 6) {
		$s[1] = "TAMAMLANAMADI";
		$s[2] = "danger";
		$s[3] = "Sipariş bayi tarafından iptal edildi lütfen url yada kullanıcı adını kontrol edin ve farklı bir servisle yada manuel olarak işlemi gerçekleştirin";
		$s[4] = "Siparişiniz işlem sırasında.";
	}
	if ($gelen == 7) {
		$s[1] = "DİĞER DURUMLAR";
		$s[2] = "info";
		$s[3] = "Siparişinizle ilgili sistemin algılayamadığı bir sorun mevcut lütfen manuel olarak işlem gerçekteştirin ve siparişi tamamlandı olarak işaretleyin.";
		$s[4] = "Sipariş durumunuzla alakalı sistemde bilgi mevcut değil lütfen iletişime geçin.";
	}
	if ($gelen == 8) {
		$s[1] = "ARŞIVLENEN SİPARİŞ";
		$s[2] = "arsiv";
		$s[3] = "Bu sipariş arşivlenmiş. Arşivlenmiş siparişler sadece güvenlik amacıyla sistemde tutulur. Silinmesine ve düzenlenmesine izin verilmez.";
		$s[4] = "Siparişiniz kapatıldı.";
	}
	if ($gelen == 10) {
		$s[1] = "ÖDEME YAPILMAMIŞ";
		$s[2] = "arsiv";
		$s[3] = "Bu sipariş için ilgili ödeme firmasından ödendi yanıtı alınamamış. Bir hata olduğunu düşünüyorsanız bu siparişin ödemesini manuel olarak kontrol edip işleme alabilirsiniz.";
		$s[4] = "Siparişiniz kapatıldı.";
	}
	return $s;
}
function ServisGetir($tur) {
	global $conn;
	return $conn->query("SELECT * FROM $tur");
}
/** SİPARİŞ SÜRESİNİ GEÇEN SÜRE VE NET TARİH BAKIMINDAN DÜZENLEYEN FONKSİYON */

function zamanFarkiFonk($zaman){
	     $tarih = explode(" ", $zaman)[0];
	     $tarih = explode("-", $tarih);
		date_default_timezone_set('Europe/Istanbul');
		$explode = explode(" ", $zaman);
		$date = explode("-", $explode[0]);
		$time = explode(":", $explode[1]);
		$zaman =  mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
		$zaman_farki = time() - $zaman;
		$saniye = $zaman_farki;
		$dakika = round($zaman_farki/60);
		$saat = round($zaman_farki/3600);
		$gun = round($zaman_farki/86400);
		$hafta = round($zaman_farki/604800);
		$ay = round($zaman_farki/2419200);
		$yil = round($zaman_farki/29030400);
		if( $saniye < 60 ){
			if ($saniye == 0){
				return "az önce";
			} else {
				return $saniye .' sn önce';
			}
		} else if ( $dakika < 60 ){
			return $dakika .' dk önce';
		} else if ( $saat < 24 ){
			return $saat.' saat önce';
		} else {
			return $tarih[2].'/'.$tarih[1].'/'.$tarih[0];
		}
	}

/** SMM PANEL BİLGİLERİNİ AYRIŞTIRAN FONKSIYON PANEL ADI, API, API LİNK GİBİ GİBİ */
function SMMCikti($gelen) {
	global $conn;
 return $conn->query("SELECT * FROM smm_panel WHERE smm_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
}
function ServisCikti($gelen) {
	global $conn;
	$gelen = PanelServis($gelen)[0];
 return $conn->query("SELECT * FROM smm_panel WHERE smm_id = '{$gelen}'")->fetch(PDO::FETCH_ASSOC);
}
function IslemTab($tur, $gelen) {
if ($tur == $gelen) {
	return 'active show';
} else {
	return '';
}
}
/** SMM PANEL BİLGİLERİ AYRIŞTIRIP SMM ID VE HIZMET ID AYRIŞTIRAN FONKSIYON */
function PanelServis($gelen) {
	global $conn;
	if ($gelen != "") { $smm = explode("-", $gelen); } else { $smm[1] = 0; $smm[0] = 0; }
	$varmi = $conn->prepare("SELECT COUNT(*) FROM smm_panel WHERE smm_id = '{$smm[0]}'");
	$varmi->execute();
	if($varmi->fetchColumn()<1) {
		$smm[1] = 0; $smm[0] = 0;
	}
	return $smm;
}
/** TÜM SİPARİŞLER İÇİN ORTAYA ÇIKAN LOGLARI VERİTABANINA EKLEYEN FONKSİYON */
function islemekle($spcode) {
	global $conn;
	$siparis = $conn->query("SELECT * FROM siparisler WHERE sp_code = '{$spcode}' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
	$paket = $conn->query("SELECT * FROM paketler WHERE pk_id = '{$siparis["sp_musteri_paket"]}' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
	$islemekle = $conn->prepare("INSERT INTO siparis_islem SET
		islem_id = ?,
		sp_code = ?,
		panel_code = ?,
		islem_tarih = ?,
		islem_item = ?,
		islem_miktar = ?,
		islem_turu = ?,
		islem_smm = ?,
		sp_durum = ?,
	    sp_start = ?,
	    sp_kalan = ?,
	    sp_tutar = ?,
	    bayi_kontrol = ?");
        $tamamla = $islemekle->execute(array(
    	NULL,
    	$siparis["sp_id"],
    	0,
    	$siparis["sp_time"],
    	$siparis["sp_musteri_link"],
    	$paket["pk_adet"],
    	$paket["pk_tur"],
    	$paket["pk_oto_servis_id"],
        0,
        0,
        0,
        0,
        $siparis["sp_time"]));
        if ($tamamla) {
        	return true;
        }
        return false;
    }




 /** SİPARİŞ DURUMLARINI GÜNCELLEYEN OTOMATİK SİPARİŞLERİ İLGİLİ BAYİYE GÖNDEREN FONKSİYONLARI ÇALIŞTIRI. */
 function SiparisDurumGuncelle($id, $islem) {
 	global $conn;
 	if ($islem == "manuel") {
 		$conn->query("UPDATE siparisler SET sp_durum = 1 WHERE sp_id = '{$id}'");
 	} elseif ($islem == "otomatik") {
 		$gonder = SMMIslembaslat($id);
 		if ($gonder["sonuc"] == true) {
 			$conn->query("UPDATE siparisler SET sp_durum = 2 WHERE sp_id = '{$id}'");
 			$conn->query("UPDATE siparis_islem SET panel_code = '{$gonder["islem_id"]}', sp_durum = '1' WHERE sp_code = '{$id}'");
 		} else {
 			$conn->query("UPDATE siparisler SET sp_durum = 1 WHERE sp_id = '{$id}'");
 		}
 	}
 	return "";
 }
 function SiparisDurumSorgule($sp_code) {
 	global $conn;
 	$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE sp_code='{$sp_code}'");
	$varmi->execute();
	if ($varmi->fetchColumn()<1) {
		return false;
	}
 	$siparis = $conn->query("SELECT * FROM siparisler WHERE sp_code = '{$sp_code}'")->fetch(PDO::FETCH_ASSOC);
 	$sonuc["durumu"] = SiparisDurum($siparis["sp_durum"])[4];
 	$sonuc["sp_paket_adi"] = $siparis["sp_paket_adi"];
 	$sonuc["sp_musteri_link"] = $siparis["sp_musteri_link"];
 	return $sonuc;

 }
 /** OTOMATİK OLARAK SİPARİŞLERİ İLGİLİ BAYİ PANELLERİNE İLETİR */
 function SMMIslembaslat($id) {
 	global $conn;
 	global $Siteurl;
    $islemdetay = $conn->query("SELECT * FROM siparis_islem WHERE sp_code = '{$id}'")->fetch(PDO::FETCH_ASSOC);
    $smm = PanelServis($islemdetay["islem_smm"])[0];
    $SMMGetir = $conn->query("SELECT * FROM smm_panel WHERE smm_id = '{$smm}'")->fetch(PDO::FETCH_ASSOC);
    $api = APIConnect($SMMGetir["smm_link"], $SMMGetir["smm_api"]);
    $bakiye = json_decode(json_encode($api->balance()), true)["balance"];
    $servis = PanelServis($islemdetay["islem_smm"])[1];
    $services = json_decode(json_encode($api->services()), true);
    foreach ($services as $bayiservis) {
    	if (!isset($servisvarmi) AND $bayiservis["service"] == $servis) {
    		$servisvarmi = true;
    		$tutar = $bayiservis["rate"]/1000;
    		$tutar = $islemdetay["islem_miktar"]*$tutar;
    		if ($bakiye > $tutar) {
    			$order = $api->order(array('service' => $servis, 'link' => $islemdetay["islem_item"], 'quantity' => $islemdetay["islem_miktar"]));
    			if (isset($order->order)) {
    				$cikti["sonuc"] = true;
    				$cikti["islem_id"] = $order->order;
    				$bildirim[0] = "İşlem başarıyla bayiye gönderildi";
    				$bildirim[1] = "success";
    				$_SESSION["bildirim"] = $bildirim;
    			} else {
    				$cikti["sonuc"] = false;
    				$bildirim[0] = "İşlem bayiye gönderilirken hata oluştu";
    				$bildirim[1] = "danger";
    				$_SESSION["bildirim"] = $bildirim;
    				Parcala($Siteurl.'inc/MailBilgilendirme.php?spcode='.$id.'&konu=yhata&sonuc=hatali"');
    			}
    		} else {
    			$bildirim[0] = "İşlemi gönderdiğiniz bayideki bakiyeniz bu işlem için yetersiz.";
    				$bildirim[1] = "danger";
    				$_SESSION["bildirim"] = $bildirim;
    				Parcala($Siteurl.'inc/MailBilgilendirme.php?spcode='.$id.'&konu=yhata&sonuc=bakiye"');
    			$cikti["sonuc"] = false;
    		}
    	}
    } 
    if (!isset($servisvarmi)) {
    	Parcala($Siteurl.'inc/MailBilgilendirme.php?spcode='.$id.'&konu=yhata&sonuc=servisyok"');
    	$cikti["sonuc"] = false;
    }
    return $cikti;
 }

 function APIConnect ($link, $api) {
 	require "SMMClass.php";
 	return new Api($link, $api);
 }
 function sonkontrol($zaman) {
 	$tarih = explode(" ", $zaman)[0];
	     $tarih = explode("-", $tarih);
		date_default_timezone_set('Europe/Istanbul');
		$explode = explode(" ", $zaman);
		$date = explode("-", $explode[0]);
		$time = explode(":", $explode[1]);
		$zaman =  mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
		$zaman_farki = time() - $zaman;
		$saniye = $zaman_farki;
		if (round($zaman_farki/60)>5) {
			return true;
		}
 }
 function KontolYapilsin($id) {
 	global $conn;
 	$siparis = $conn->query("SELECT * FROM siparisler WHERE sp_id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
 	$i = $conn->query("SELECT * FROM siparis_islem WHERE sp_code = '{$id}'")->fetch(PDO::FETCH_ASSOC);
 	if (($i["sp_durum"] == 2 or $i["sp_durum"] == 1 or $i["sp_durum"] == 5 or $i["sp_durum"] == 6) AND $i["islem_turu"] == "otomatik" AND $siparis["sp_durum"]==2) {
 		 $smm = PanelServis($i["islem_smm"])[0];
 	 	 $SMMGetir = $conn->query("SELECT * FROM smm_panel WHERE smm_id = '{$smm}'")->fetch(PDO::FETCH_ASSOC);
 	 	 $sonuc["durum"] = true;
 	 	 $sonuc["smm_link"] = $SMMGetir["smm_link"];
 	 	 $sonuc["smm_api"] = $SMMGetir["smm_api"];
 	 	 $sonuc["panel_code"] = $i["panel_code"];
 	 	 return $sonuc;
 	}
 }
 function PanelDurumuGuncelle($durum, $id) {
 	global $conn;
 	global $Siteurl;
 	 if ($durum["status"] == 'Pending') {
 	 	 	$sonuc["text"] = "İşleme Alındı";
 	 	 	$sonuc["s"] = 1;
 	 	 	$sonuc["sp"] = 2;
 	 	 } elseif ($durum["status"] == 'Inprogress') {
 	 	 	$sonuc["text"] = "Devam Ediyor";
 	 	 	$sonuc["s"] = 2;
 	 	 	$sonuc["sp"] = 2;
 	 	 } elseif ($durum["status"] == 'Completed') {
 	 	 	$sonuc["text"] = "Tamamlandı";
 	 	 	$sonuc["s"] = 3;
 	 	 	$sonuc["sp"] = 4;
 	 	 	Parcala($Siteurl.'inc/MailBilgilendirme.php?spcode='.$id.'&konu=tamamlandi&sonuc=basarili"');
 	 	 } elseif ($durum["status"] == 'Partial') {
 	 	 	$sonuc["text"] = "Kısmen Tamamlandı";
 	 	 	$sonuc["s"] = 4;
 	 	 	$sonuc["sp"] = 2;
 	 	 } elseif ($durum["status"] == 'Processing') {
 	 	 	$sonuc["text"] = "Gönderim Sırasında";
 	 	 	$sonuc["s"] = 5;
 	 	 	$sonuc["sp"] = 2;
 	 	 } elseif ($durum["status"] == 'In progress') {
 	 	 	$sonuc["text"] = "Devam Ediyor";
 	 	 	$sonuc["s"] = 5;
 	 	 	$sonuc["sp"] = 2;
 	 	 } elseif ($durum["status"] == 'Canceled') {
 	 	 	$sonuc["text"] = "Tamamlanamadı";
 	 	 	$sonuc["s"] = 6;
 	 	 	$sonuc["sp"] = 6;
 	 	 	Parcala($Siteurl.'inc/MailBilgilendirme.php?spcode='.$id.'&konu=yhata&sonuc=tamamlanamadi"');
 	 	 	
 	 	 }
 	 	 if (empty($durum["start_count"])) {
 	 	 	$durum["start_count"] = 0;
 	 	 }
 	 	 if (isset($durum["status"])) {
 	 	 $sonuc["start"] = $durum["start_count"];
 	 	 $sonuc["tutar"] = $durum["charge"];
 	 	 $sonuc["kalan"] = $durum["remains"];
 	 	 $time = date("Y-m-d H:i:s");
 	 	 $conn->query("UPDATE siparis_islem SET 
 	 	 	sp_durum = '{$sonuc["s"]}',
 	 	 	sp_start = '{$sonuc["start"]}',
 	 	 	sp_kalan = '{$sonuc["kalan"]}',
 	 	 	sp_tutar = '{$sonuc["tutar"]}',
 	 	 	bayi_kontrol = '{$time}' WHERE sp_code = '{$id}'");
 	 	 $conn->query("UPDATE siparisler SET sp_durum = '{$sonuc["sp"]}' WHERE sp_id = '{$id}'");
 	 	 $sonuc = $conn->query("SELECT * FROM siparis_islem WHERE sp_code = '{$id}'")->fetch(PDO::FETCH_ASSOC);
 	 	 return $sonuc;
 	 	}
 }
 function BayiDurumu($id) {
 	global $conn;
 	global $Siteurl;
 	 $i = $conn->query("SELECT * FROM siparis_islem WHERE sp_code = '{$id}'")->fetch(PDO::FETCH_ASSOC);
 	 if (($i["sp_durum"] == 1 or $i["sp_durum"] == 2 or $i["sp_durum"] == 5 or $i["sp_durum"] == 6) AND $i["islem_turu"] == "otomatik" AND $i["panel_code"] != 0)  {
 	 	 $smm = PanelServis($i["islem_smm"])[0];
 	 	 $SMMGetir = $conn->query("SELECT * FROM smm_panel WHERE smm_id = '{$smm}'")->fetch(PDO::FETCH_ASSOC);
 	 	 $api = APIConnect($SMMGetir["smm_link"], $SMMGetir["smm_api"]);
 	 	 $durum = json_decode(json_encode($api->status($i["panel_code"])), true);
 	 	 if ($durum["status"] == 'Pending') {
 	 	 	$sonuc["text"] = "İşleme Alındı";
 	 	 	$sonuc["s"] = 1;
 	 	 	$sonuc["sp"] = 2;
 	 	 } elseif ($durum["status"] == 'Inprogress') {
 	 	 	$sonuc["text"] = "Devam Ediyor";
 	 	 	$sonuc["s"] = 2;
 	 	 	$sonuc["sp"] = 2;
 	 	 } elseif ($durum["status"] == 'Completed') {
 	 	 	$sonuc["text"] = "Tamamlandı";
 	 	 	$sonuc["s"] = 3;
 	 	 	$sonuc["sp"] = 4;
 	 	 	Parcala($Siteurl.'inc/MailBilgilendirme.php?spcode='.$id.'&konu=tamamlandi&sonuc=basarili"');
 	 	 } elseif ($durum["status"] == 'Partial') {
 	 	 	$sonuc["text"] = "Kısmen Tamamlandı";
 	 	 	$sonuc["s"] = 4;
 	 	 	$sonuc["sp"] = 2;
 	 	 } elseif ($durum["status"] == 'Processing') {
 	 	 	$sonuc["text"] = "Gönderim Sırasında";
 	 	 	$sonuc["s"] = 5;
 	 	 	$sonuc["sp"] = 2;
 	 	 } elseif ($durum["status"] == 'In progress') {
 	 	 	$sonuc["text"] = "Devam Ediyor";
 	 	 	$sonuc["s"] = 5;
 	 	 	$sonuc["sp"] = 2;
 	 	 } elseif ($durum["status"] == 'Canceled') {
 	 	 	$sonuc["text"] = "Tamamlanamadı";
 	 	 	$sonuc["s"] = 6;
 	 	 	$sonuc["sp"] = 6;
 	 	 	Parcala($Siteurl.'inc/MailBilgilendirme.php?spcode='.$id.'&konu=yhata&sonuc=tamamlanamadi"');
 	 	 }
 	 	 if (empty($durum["start_count"])) {
 	 	 	$durum["start_count"] = 0;
 	 	 }
 	 	 $sonuc["start"] = $durum["start_count"];
 	 	 $sonuc["tutar"] = $durum["charge"];
 	 	 $sonuc["kalan"] = $durum["remains"];
 	 	 $time = date("Y-m-d H:i:s");
 	 	 $conn->query("UPDATE siparis_islem SET 
 	 	 	sp_durum = '{$sonuc["s"]}',
 	 	 	sp_start = '{$sonuc["start"]}',
 	 	 	sp_kalan = '{$sonuc["kalan"]}',
 	 	 	sp_tutar = '{$sonuc["tutar"]}',
 	 	 	bayi_kontrol = '{$time}' WHERE sp_code = '{$id}'");
 	 	 $conn->query("UPDATE siparisler SET sp_durum = '{$sonuc["sp"]}' WHERE sp_id = '{$id}'");
 	 }
 	 $sonuc = $conn->query("SELECT * FROM siparis_islem WHERE sp_code = '{$id}'")->fetch(PDO::FETCH_ASSOC);
 	 if (isset($durum["status"])) {
 	 	$sonuc["apikontrol"] = true;
 	 }
 	 return $sonuc;
 }
 function ServisSayisi($id, $olay) {
 	global $conn;
 	if ($olay == "pt_tax") {
 		$varmi = $conn->prepare("SELECT COUNT(*) FROM hizmetler WHERE pt_tax = '{$id}'");
 	} elseif ($olay == "hz_tax") {
 		$varmi = $conn->prepare("SELECT COUNT(*) FROM paketler WHERE hz_tax = '{$id}'");
 	} elseif ($olay == "sp_musteri_paket") {
 		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE sp_musteri_paket = '{$id}' AND sp_durum > 0 AND sp_durum<10");
 	} elseif ($olay == "acik-siparis") {
 		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE (sp_durum < 4 or sp_durum = 6) AND sp_musteri_paket = '{$id}'");
 	} elseif ($olay == "kapali-siparis") {
 		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE (sp_durum > 4 or sp_durum != 6) AND sp_durum < 10 AND sp_musteri_paket = '{$id}'");
 	} elseif ($olay == "smm_paketi") {
 		$varmi = $conn->prepare("SELECT COUNT(*) FROM paketler WHERE pk_tur = 'otomatik' AND `pk_oto_servis_id` LIKE '%{$id}-%'");
 	} elseif ($olay == "fazlablog") {
 		$varmi = $conn->prepare("SELECT COUNT(*) FROM sayfalar WHERE sayfa_icon != 'sayfa' AND sayfa_id < '{$id}' ORDER BY sayfa_id DESC");
 	}
 	$varmi->execute();
	return $varmi->fetchColumn();
 }
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
$mail = new PHPMailer(true);
include "bildir.php";

function MenuItem($tur) {
	global $conn;
	if ($tur=="ust") {
		echo '<option value="Ana Sayfa+*+link+*+">Ana Sayfa</option>';
		echo '<option value="Hizmetler+*+linksiz+*+">Hizmetler</option>';
		echo '<option value="Kurumsal+*+linksiz+*+">Kurumsal</option>';
		echo '<option value="Blog+*+link+*+blog/">Blog</option>';
	}

		echo '<option value="İletişim+*+link+*+iletisim/">İletişim</option>';
		$sayfalar = ServisGetir('sayfalar');
		while ($sayfa = $sayfalar->fetch(PDO::FETCH_ASSOC)) {
			if ($sayfa["sayfa_icon"]=="sayfa") {
			echo '<option value="'.$sayfa["sayfa_baslik"].'+*+link+*+'.$sayfa["sayfa_primary"].'/">'.$sayfa["sayfa_baslik"].'</option>';
		    }
		}
	$platform = ServisGetir('platform');
		while ($pt = $platform->fetch(PDO::FETCH_ASSOC)) {
	if ($tur=="ust") {
			echo '<option value="'.$pt["pt_name"].'+*+link+*+'.$pt["pt_primary"].'/">'.$pt["pt_name"].'</option>';
	} else  {
		    echo '<option value="'.$pt["pt_name"].' Hizmetleri+*+link+*+'.$pt["pt_primary"].'/">'.$pt["pt_name"].' Hizmetleri</option>';
	}
	}
		$kategoriler = ServisGetir('hizmetler');
		while ($hz = $kategoriler->fetch(PDO::FETCH_ASSOC)) {
			echo '<option value="'.platform($hz["pt_tax"], 'ad').' '.$hz["hz_adi"].'+*+hizmet+*+'.$hz["hz_id"].'">'.platform($hz["pt_tax"], 'ad').' '.$hz["hz_adi"].'</option>';
		}
}
function OneCikanItem ($gelen) {
	$paketler = ServisGetir('paketler');
	 while ($pk = $paketler->fetch(PDO::FETCH_ASSOC)) {
	 	if ($pk["pk_id"]==$gelen) {
	 		echo '<option value="'.$pk["pk_id"].'" selected>'.hizmet($pk["hz_tax"],'pt_adi').' '.$pk["pk_adi"].'</option>';
	 	} else {
	 		echo '<option value="'.$pk["pk_id"].'">'.hizmet($pk["hz_tax"],'pt_adi').' '.$pk["pk_adi"].'</option>';
	 	}
     }
}
function AltMenu($id) {
	global $conn;
	$varmi = $conn->prepare("SELECT COUNT(*) FROM ayarlar WHERE item2 = '{$id}' AND item1 = 'menu'");
	$varmi->execute();
	if ($varmi->fetchColumn()>0) {
		return $conn->query("SELECT * FROM ayarlar WHERE item2 = '{$id}' AND item1 = 'menu'");
	}
	return false;
}
function DurumKontrol($id, $tur) {
	global $conn;
    if($conn->query("SELECT * FROM ayarlar WHERE $tur = '{$id}'")->fetch(PDO::FETCH_ASSOC)["statu"] == 1) {
    	return "checked";
    }
}
function SayılarıGoster($gelen,$gelen2) {
	global $conn;
	$topla = $conn->prepare("SELECT SUM(".$gelen.") AS sayilar FROM ".$gelen2."");
	$topla->execute();
	$toplamyaz = $topla->fetch(PDO::FETCH_ASSOC);
	return $toplamyaz['sayilar'];
}
function ToplamEleman($gelen,$item) {
	global $conn;
	if ($item=="mesaj") {
	$varmi = $conn->prepare("SELECT COUNT(*) FROM iletisim_formu WHERE i_durum = 0");
	} elseif ($item=="odeme") {
	$varmi = $conn->prepare("SELECT COUNT(*) FROM odemeler WHERE o_durum = 0");
	} elseif ($item=="acik") {
		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE (sp_durum < 4 or sp_durum = 6) AND sp_durum != 10 AND sp_durum != 0");
	} elseif ($item=="islem") {
		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE (sp_durum < 4 or sp_durum = 6) AND sp_durum != 10");
	} elseif ($item=="0") {
		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE  sp_durum = 0");
	} else {
	$varmi = $conn->prepare("SELECT COUNT(*) FROM $gelen");
	}
	$varmi->execute();
	return $varmi->fetchColumn();
}
function AylikKazanc() {
	global $conn;
	$tarih = date("Y-m").'-01';
	$cevir = strtotime('0 days', strtotime($tarih )); 
	$oncesi = date("Y-m-d H:i:s",$cevir);
	$tamamlanan = $conn->query("SELECT * FROM siparisler WHERE sp_durum = 4 AND sp_time > '{$oncesi}'");
	$toplam = 0;
	while ($say = $tamamlanan->fetch(PDO::FETCH_ASSOC)) {
		$toplam = $toplam+$say["sp_musteri_tutar"];
	}
	return ceil($toplam).'.00';
}
if ($_GET) { $get = $_GET; } else { $get = false; }
if ($_POST) {  $post = $_POST; foreach($post as $var => $val) { 
        if (!is_array($post[$var])) $post[$var] = clearSQL($val);
    } } else { $post = false; }
if (isset(AyarGetir('themes', 'one')["item2"]) AND AyarGetir('themes', 'one')["item2"]!="") {
	$theme = AyarGetir('themes', 'one')["item2"];
} elseif (!strstr($_SERVER['SCRIPT_NAME'], "panel")) {
	echo 'Lütfen Temalarım Bölümünden Bir Tema Etkinleştirin';
	exit;
}
function ThemesOption() {
	global $get;
	global $post;
	global $conn;
	global $theme;
	if ($get != false) {
		if (isset($get["primary2"])) {
			if ($get["primary1"]=="blog") {
					$varmi = $conn->prepare("SELECT COUNT(*) FROM sayfalar WHERE sayfa_primary = '{$get["primary2"]}' AND sayfa_icon != 'sayfa'");
					$varmi->execute();
					if ($varmi->fetchColumn()>0) {
						$get["part_template"] = "yazi";
						$get["yazi"] = $conn->query("SELECT * FROM sayfalar WHERE sayfa_primary = '{$get["primary2"]}' AND sayfa_icon != 'sayfa'")->fetch(PDO::FETCH_ASSOC);
						$get["title"] = $get["yazi"]["sayfa_seo_baslik"];
						$get["description"] = $get["yazi"]["sayfa_aciklama"];
						$get["keyword"] = false;
					}
				} elseif (AyarGetir('permalink', 'one')["item2"]=="default") {
					$varmi = $conn->prepare("SELECT COUNT(*) FROM platform WHERE pt_primary = '{$get["primary1"]}'");
					$varmi->execute();
					$varmi2 = $conn->prepare("SELECT COUNT(*) FROM hizmetler WHERE hz_pri = '{$get["primary2"]}'");
					$varmi2->execute();
					if ($varmi->fetchColumn()>0 AND $varmi2->fetchColumn()>0) {
						$get["part_template"] = "paketler";
						$get["platform"] = $conn->query("SELECT * FROM platform WHERE pt_primary = '{$get["primary1"]}'")->fetch(PDO::FETCH_ASSOC);
						$get["hizmet"] = $conn->query("SELECT * FROM hizmetler WHERE hz_pri = '{$get["primary2"]}' AND pt_tax = '{$get["platform"]["pt_id"]}'")->fetch(PDO::FETCH_ASSOC);
						$get["paketler"] = $conn->query("SELECT * FROM paketler WHERE hz_tax = '{$get["hizmet"]["hz_id"]}' ORDER BY pk_adet ASC");
						$get["title"] = $get["hizmet"]["hz_seo_adi"];
						$get["description"] = $get["hizmet"]["hz_text"];
						$get["keyword"] = false;
					}
			}
		} elseif (isset($get["primary1"])) {
			if ($get["primary1"]=="blog") {
				$get["part_template"] = "blog";
				$get["blogs"] = $conn->query("SELECT * FROM sayfalar WHERE sayfa_icon != 'sayfa' ORDER BY sayfa_id DESC LIMIT 12");
				$get["title"] = "Blog Yazıları";
				$get["description"] = false;
				$get["keyword"] = false;
			} elseif ($get["primary1"] == "siparis" AND (isset($post["paket_secimi"]) OR isset($_SESSION["paket_secimi"]))) {
				if (!isset($post["paket_secimi"])) { $post["paket_secimi"] = $_SESSION["paket_secimi"]; }
				$get["part_template"] = "siparis";
				$get["paket"] = $conn->query("SELECT * FROM paketler WHERE pk_id = '{$post["paket_secimi"]}'")->fetch(PDO::FETCH_ASSOC);
				$get["hizmet"] = $conn->query("SELECT * FROM hizmetler WHERE hz_id = '{$get["paket"]["hz_tax"]}'")->fetch(PDO::FETCH_ASSOC);
				$get["title"] = hizmet($get["paket"]["hz_tax"], "pt_adi").' '.$get["paket"]["pk_adi"]. " Satın Alma Ekranı";
				$get["description"] = $get["paket"]["pk_adi"]." paketi için sipariş formu";
				$get["keyword"] = false;
			} elseif ($get["primary1"] == "tamamlandi" AND (isset($get["siparis-kodu"]) OR isset($_SESSION["siparis-kodu"]))) {
				if (!isset($get["siparis-kodu"])) { $get["siparis-kodu"] = $_SESSION["siparis-kodu"]; }
				$get["part_template"] = "tamamlandi";
				$get["siparis"] = $conn->query("SELECT * FROM siparisler WHERE sp_code = '{$get["siparis-kodu"]}'")->fetch(PDO::FETCH_ASSOC);
				$get["title"] = "Sipariş Sonrası";
				$get["description"] = "Sipariş tamamlandı ekranı.";
				$get["keyword"] = false;
			} elseif ($get["primary1"] == "iletisim") {
				$get["part_template"] = "iletisim";
				$get["title"] = "İletişim";
				$get["description"] = "Bizimle iletişime geçin";
				$get["keyword"] = false;
			}
			$varmi = $conn->prepare("SELECT COUNT(*) FROM sayfalar WHERE sayfa_primary = '{$get["primary1"]}' AND sayfa_icon = 'sayfa'");
			$varmi->execute();
			if ($varmi->fetchColumn()>0) {
				$get["part_template"] = "sayfa";
				$get["sayfa"] = $conn->query("SELECT * FROM sayfalar WHERE sayfa_primary = '{$get["primary1"]}' AND sayfa_icon = 'sayfa'")->fetch(PDO::FETCH_ASSOC);
				$get["title"] = $get["sayfa"]["sayfa_seo_baslik"];
				$get["description"] = $get["sayfa"]["sayfa_aciklama"];
				$get["keyword"] = false;
			}
			$varmi = $conn->prepare("SELECT COUNT(*) FROM platform WHERE pt_primary = '{$get["primary1"]}'");
			    $varmi->execute();
			    if ($varmi->fetchColumn()>0) {
				    $get["part_template"] = "hizmetler";
				    $get["platform"] = $conn->query("SELECT * FROM platform WHERE pt_primary = '{$get["primary1"]}'")->fetch(PDO::FETCH_ASSOC);
				    $get["hizmetler"] = $conn->query("SELECT * FROM hizmetler WHERE pt_tax = '{$get["platform"]["pt_id"]}' ORDER BY hz_id ASC");
				    $get["title"] = $get["platform"]["pt_seo"];
				    $get["description"] = $get["platform"]["pt_text"];
				    $get["keyword"] = false;
			    } elseif (AyarGetir('permalink', 'one')["item2"] != "default") {
			    $varmi = $conn->prepare("SELECT COUNT(*) FROM hizmetler WHERE hz_pri = '{$get["primary1"]}'");
			    $varmi->execute();
			    if ($varmi->fetchColumn()>0) {
				    $get["part_template"] = "paketler";
				    $get["hizmet"] = $conn->query("SELECT * FROM hizmetler WHERE hz_pri = '{$get["primary1"]}'")->fetch(PDO::FETCH_ASSOC);
				    $get["platform"] = $conn->query("SELECT * FROM platform WHERE pt_id = '{$get["hizmet"]["pt_tax"]}'")->fetch(PDO::FETCH_ASSOC);
				    $get["paketler"] = $conn->query("SELECT * FROM paketler WHERE hz_tax = '{$get["hizmet"]["hz_id"]}' ORDER BY pk_adet ASC");
				    $get["title"] = $get["hizmet"]["hz_seo_adi"];
				    $get["description"] = $get["hizmet"]["hz_text"];
				    $get["keyword"] = false;
			    }
			}
		}
		
	} else {
	    $get["part_template"] = "main";
	    $get["title"] = false;
	    $get["description"] = false;
	    $get["keyword"] = false;
    }
    if (!isset($get["part_template"])) {
    	$get["part_template"] = "404";
	    $get["title"] = "Error";
	    $get["description"] = "Bizimle iletişime geçin";
	    $get["keyword"] = false;
    }
	$get["export"] = 'themes/'.$theme."/index.php";
	$get["option_themes_url"] = AyarGetir('siteurl', 'one')["item2"].'themes/'.$theme.'/';
	return $get;
}
function LinkCreate($tur, $pri) {
	global $conn;
	global $Siteurl;
	if ($tur == "hizmet") {
		$pri = explode("?=?", $pri);
		if (AyarGetir('permalink', 'one')["item2"] == "default") {
			return $Siteurl.$pri[1].'/'.$pri[0].'/';
		} else {
			return $Siteurl.$pri[0].'/';
		}
	} elseif ($tur == "hizmets") {
		if (AyarGetir('permalink', 'one')["item2"] == "default") {
			return $Siteurl.hizmet($pri,'pt_primary').'/'.hizmet($pri,'hz_pri').'/';
		} else {
			return $Siteurl.hizmet($pri,'hz_pri').'/';
		}
	} else {
		return $Siteurl.$pri.'/';
	}
}
function PaketOzellik($pk, $ht) {
	global $conn;
	$ozellikler = $conn->query("SELECT * FROM ozellikler WHERE oz_tax = '{$pk}' ORDER BY oz_id ASC");
	while($oz = $ozellikler->fetch(PDO::FETCH_ASSOC)) {
		echo str_replace('=Ozellik=', $oz["oz_text"], $ht);
	}
}
function KlasorSil($dir) {
if (substr($dir, strlen($dir)-1, 1)!= '/')
$dir .= '/';
if ($handle = opendir($dir)) {
	while ($obj = readdir($handle)) {
		if ($obj!= '.' && $obj!= '..') {
			if (is_dir($dir.$obj)) {
				if (!KlasorSil($dir.$obj))
					return false;
				} elseif (is_file($dir.$obj)) {
					if (!unlink($dir.$obj))
						return false;
					}
			}
	}
		closedir($handle);
		if (!@rmdir($dir))
		return false;
		return true;
	}
return false;
}
function KuponIndirim($ucret, $oran) {
	global $conn;
	$sonuc["indirim"] = number_format(($ucret*$oran)/100, 2, '.', '');
	$sonuc["fiyat"] = number_format($ucret - $sonuc["indirim"], 2, '.', '');
	$bedel = AyarGetir('hizmet-bedeli','one');
	if ($bedel["statu"]==1){
	if ($bedel["item2"]=="yuzde") {
		$sonuc["hizmet-bedeli"] = number_format(($ucret * AyarGetir('hizmet-bedeli','one')["item3"])/100, 2, '.', '');
	} else {
		$sonuc["hizmet-bedeli"] = number_format(AyarGetir('hizmet-bedeli','one')["item3"], 2, '.', '');
	} } else {
		$sonuc["hizmet-bedeli"] = number_format(0, 2, '.', '');
	}
	$sonuc["fiyat"] = number_format(($ucret-$sonuc["indirim"])+$sonuc["hizmet-bedeli"], 2, '.', '');
	return $sonuc;
}
function OdemeYontemleri($item){
	if (AyarGetir('onlinepay','one')["statu"]==1) {
		$onlinepay = str_replace('{deger}', 'onlinepay', $item);
		echo str_replace('{ad}', 'Online Kredi Kartı', $onlinepay);
	}
	if (AyarGetir('havalepay','one')["statu"]==1) {
		$onlinepay = str_replace('{deger}', 'havalepay', $item);
		echo str_replace('{ad}', 'EFT - Havale', $onlinepay);
	}
	if (AyarGetir('mobilepay','one')["statu"]==1) {
		$onlinepay = str_replace('{deger}', 'mobilepay', $item);
		echo str_replace('{ad}', 'Mobil Ödeme', $onlinepay);
	}
}
function KuponUygulama($kod, $pk){
  global $conn;
  $varmi = $conn->prepare("SELECT COUNT(*) FROM kuponlar WHERE kupon_kodu = '{$kod}' AND kupon_durum = 1");
  $varmi->execute();
  if ($varmi->fetchColumn()>0) {
  	$paket = $conn->query("SELECT * FROM paketler WHERE pk_id = '{$pk}'")->fetch(PDO::FETCH_ASSOC);
  	$kupon = $conn->query("SELECT * FROM kuponlar WHERE kupon_kodu = '{$kod}'")->fetch(PDO::FETCH_ASSOC);
  	$genel = '0-0-0';
  	$platform = hizmet($paket["hz_tax"], 'pt_id').'-0-0';
  	$hizmet = hizmet($paket["hz_tax"], 'pt_id').'-'.$paket["hz_tax"].'-0';
  	$pakets = hizmet($paket["hz_tax"], 'pt_id').'-'.$paket["hz_tax"].'-'.$pk;
  	if ($kupon["kupon_tax"]==$genel OR $kupon["kupon_tax"]==$platform OR $kupon["kupon_tax"]==$hizmet OR $kupon["kupon_tax"]==$pakets ) {
  		$sonuc["kupon"] = $kupon;
  		$sonuc["paket"] = $paket;
  		return $sonuc;
  	} 
}
return false;
}
function MusteriSiparisi($terim){
  global $conn;
  $varmi = $conn->prepare("SELECT COUNT(*) FROM siparisler WHERE sp_code = ? AND sp_durum != ?");
  $varmi->execute(array($terim,10));
  if ($varmi->fetchColumn()>0) {
   	$sp = $conn->prepare("SELECT * FROM siparisler WHERE sp_code = ?");
	$sp->execute([$terim]);
	$sonuc = $sp->fetch();
	$sonuc["durum"] = SonucCikti($sonuc["sp_durum"], 'durum');
	$sonuc["mesaj"] = SonucCikti($sonuc["sp_code"], 'mesaj');
	return $sonuc;
  }
return false;
}
function SonucCikti($item, $olay) {
	if ($olay == "mesaj") {
		global $conn;
		$varmi = $conn->prepare("SELECT COUNT(*) FROM siparis_aciklama WHERE sp_code = ?");
		$varmi->execute(array($item));
		if ($varmi->fetchColumn()>0) {
		$sp = $conn->prepare("SELECT * FROM siparis_aciklama WHERE sp_code = ?");
		$sp->execute([$item]);
		$sonuc = $sp->fetch();
		return $sonuc["aciklama"];
	    }
	} elseif($olay=="durum") {
		if ($item==0 OR $item == 10) { return "Siparişiniz Ödeme Bekliyor";}
		elseif ($item==1) { return "Siparişiniz Onaylandı İşlem Bekliyor";}
		elseif ($item==2 OR $item==3) { return "Siparişiniz İşleme Alındı";}
		elseif ($item==4 OR $item==8) { return "Siparişiniz Tamamlandı";}
		elseif ($item==5) { return "Siparişiniz İptal Edildi";}
		else { return "Siparişiniz Gönderim Sırasında";}
	}
	return false;
}
function AnaAdres(){
	return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}/";
}


?>
