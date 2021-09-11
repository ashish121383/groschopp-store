<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$type_id = get_field('type');
$model = get_field('model');

?>

<div class="product-detail-image-container">
	<img class="img-360-logo" alt="360 degree view icon" src="<?php bloginfo('template_url') ?>/images/360_blue.png" alt="360">
	<?php /*<img class="product-detail-image" alt="Image of AC Motors 6154" src="/wp-content/themes/groschopp-v3/images/mock/motor_picture.png" />*/ ?>

	<?php if($type_id == 1 && strpos($model, "FC") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 1 && strpos($model, "NV") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060NV/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 2 && strpos($model, "PM601") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM6013/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 2 && strpos($model, "PM801") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 2 && strpos($model, "PM10816") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM10816/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 2 && strpos($model, "PM10818") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM10818/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 3 && strpos($model, "RA26") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA2600T/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 3 && strpos($model, "RA30") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA3000T/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 3 && strpos($model, "RA40") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA4000T/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 3 && strpos($model, "RA50") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV_RA5000T/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 6 && strpos($model, "PL73") !== false && strpos($model, "FC") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060FC-PL7300/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 6 && strpos($model, "PL73") !== false && strpos($model, "NV") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060NV-PL7300/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 6 && strpos($model, "FC") !== false && substr($model, -1) === "i"): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC-PL6200i/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 6 && strpos($model, "NV") !== false && substr($model, -1) === "i" ): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060NV-PL6200i/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 7 && strpos($model, "PL73") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PL7300/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 7 && strpos($model, "PL52") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-PL5200i/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 7 && strpos($model, "PL62") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-PL6200i/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 7 && strpos($model, "PL81") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PL8100i/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 8 && strpos($model, "PS19") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-PS1900/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 8 && strpos($model, "PS21") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PS2100/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 8 && strpos($model, "PS23") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018LV-PS2300/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 11 && strpos($model, "NV") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060NV-RP7300/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 11 && strpos($model, "FC") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC-RP7300/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 12 && strpos($model, "NV") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060NV-RA4000/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 12 && strpos($model, "FC") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060FC-RA4000/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 14): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/PM8018HV-RP7300/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 18 && strpos($model, "NV") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060NV-PS2100/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 18 && strpos($model, "FC") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC9060FC-PS2100/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 23): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 24 && strpos($model, "PL73") !== false): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520-PL7305/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 24 && substr($model, -1) === "i" ): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6560-PL6200i/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 6 && substr($model, -2) === "iP" ): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/AC8060FC-PL6200iP/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 25): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6560-PS2100/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 26): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520-RA3000T/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

	<?php if($type_id == 27): ?>
		<iframe src="<?php bloginfo('url') ?>/data/keyshot/BL6520-RP7300/index.html" width="325" height="313" style="border:0px;"></iframe>
	<?php endif ?>

</div>