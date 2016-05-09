<table class="resultTable">
<tbody>
<tr>
	<?php
		$str =$areaInfo['zip_code'];
		$str1 = substr( $str, 0, 3 );
		$str2 = substr( $str, 3, 7 );
	?>
    <td class="s01">
        <h4 class="title">お住まいの地域の郵便番号</h4>
        <p><?php echo $str1."-".$str2 ?></p>
    </td>
    <td class="s02">
        <h4 class="title">都道府県名</h4>
        <p><?php echo $areaInfo['pref1']; ?></p>
    </td>
    <td class="s03">
        <h4 class="title">市区町村名</h4>
        <p><?php echo $areaInfo['pref2']; ?></p>
    </td>
    <td class="s04 <?php if ($areaInfo['house_cleaning'] == '○') echo 'areaOK'; else echo 'areaNG'; ?>">
        <h4 class="title">ハウスクリーニング対応可否</h4>
        <p><?php if ($areaInfo['house_cleaning'] == '○') echo 'サービス提供エリア内'; else echo 'サービス提供エリア外'; ?></p>
    </td>
    <td class="s05 <?php if ($areaInfo['kajidaiko'] == '○') echo 'areaOK'; else echo 'areaNG'; ?>">
        <h4 class="title">家事代行対応可否</h4>
        <p><?php if ($areaInfo['kajidaiko'] == '○') echo 'サービス提供エリア内'; else echo 'サービス提供エリア外'; ?></p>
    </td>
</tr>
</tbody>
</table>

<ul class="searchCoution">
    <li>■ハウスクリーニング、家事代行サービス：上記にてご確認願います。</li>
    <li>■宅配クリーニング：全国対応可能です。</li>
    <li>■障子・ふすま・畳張替え・新調サービス：全国対応可能です。（交通事情や離島、島嶼などでは駆付けまでに相応のお時間がかかる場合があります。 ）</li>
</ul>

<div class="buttonLeft">
    <h4 class="title">お申し込みは以下のボタンから</h4>
    <a target="_blank" href="http://home.idc.nttdocomo.co.jp/application/"><img alt="ドコモオンライン手続き" src="/img/pc/content/request_banner.gif"></a>
</div>

<div class="buttonRight">
    <h4 class="title">お問い合わせはこちらまで</h4>
    <a href="<?php if ( $this->checkDevice() ) echo 'javascript:void(0)'; else echo 'tel:0120024804';  ?>"><img alt="0120-247-278（フリーダイヤル 24時間・年中無休）" src="/img/pc/content/call_banner.gif"></a>
</div>