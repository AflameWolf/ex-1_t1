<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Diag\Debug;
$this->setFrameMode(true);

?>
<?
if($arResult["DETAIL_PICTURE"]["SRC"]):
	$Foto= $arResult["DETAIL_PICTURE"]["SRC"];

else:
	$Foto=SITE_TEMPLATE_PATH."/img/no_photo.jpg";
endif;
?>


<div class="review-block">
    <div class="review-text">
        <div class="review-text-cont">
            <?=$arResult["DETAIL_TEXT"]?>
        </div>
        <div class="review-autor">
	        <?=$arResult["NAME"]?>, <?=$arResult["DISPLAY_ACTIVE_FROM"]?>., <?=$arResult['PROPERTIES']['POSITION']['VALUE']?>, <?=$arResult['PROPERTIES']['COMPANY']['VALUE']?>.
        </div>
    </div>
    <div style="clear: both;" class="review-img-wrap"><img src="<?=$Foto?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"></div>
</div>

<?//Debug::dump($arResult['PROPERTIES']['FILE'])?>

<?if($arResult['PROPERTIES']['FILE']["VALUE"]):?>


<div class="exam-review-doc">
    <p>Документы:</p>
	<?foreach ($arResult['PROPERTIES']['FILE']["VALUE"] as $File):?>
        <?
        $rsFile = CFile::GetByID($File);
        $arFile = $rsFile->Fetch();
        ?>
    <div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/icons/pdf_ico_40.png">

        <a href="<?=CFile::GetPath($arFile['ID'])?>" download><?=$arFile['ORIGINAL_NAME']?></a></div>
        <?endforeach;?>
</div>
<?endif?>