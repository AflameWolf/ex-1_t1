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
$this->setFrameMode(true);
?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>


    <div class="item">
    <div class="side-block side-opin">
    <div class="inner-block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="title">
            <div class="photo-block">
                <?if ($arItem["PREVIEW_PICTURE"]["SRC"]):
                    $X_Y=array("width"=>64, "height"=>56);
                    $Image_Obr=CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"] , $X_Y, BX_RESIZE_IMAGE_PROPORTIONAL);
                    $Image=$Image_Obr['src'];
                else:
                    $Image=SITE_TEMPLATE_PATH."/img/no_photo_left_block.jpg";
                endif;
                ?>

                <img src="<?=$Image?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
            </div>
            <div class="name-block"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
            <div class="pos-block"><?=$arItem['PROPERTIES']['POSITION']['VALUE']?>,<?=$arItem['PROPERTIES']['COMPANY']['VALUE']?></div>
        </div>
        <div class="text-block"><?=$arItem["PREVIEW_TEXT"]?></div>
    </div>
    </div>
    </div>



<?endforeach;?>
