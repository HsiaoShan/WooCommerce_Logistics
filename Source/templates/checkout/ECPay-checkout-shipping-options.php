<?php
/**
 * 前台 - 購物車顯示 option
 */

defined('ECPAY_PLUGIN_PATH') || exit;

// 驗證
if (!is_array($shipping_options)) {
    return;
}

// 組合超商取貨項目
$options = '<option>------</option>';
foreach ($shipping_options as $option) {
    $selected = ($shipping_type == esc_attr($option)) ? 'selected' : '';
    $options .= '<option value="' . esc_attr($option) . '" ' . $selected . '>' . esc_html($shipping_name[$option]) . '</option>';
}

?>

<!-- template -->
<input type="hidden" id="category" name="category" value="<?php echo esc_html($category); ?>">
<tr class="shipping_option">
    <th><?php echo esc_html($method_title); ?></th>
    <td>
        <select name="shipping_option" class="input-select" id="shipping_option">
            <?php echo $options; ?>
        </select>
        <?php echo $html; ?>
        <p style="font-size: 0.8em;margin: 6px 0px; width: 84%;">
            <?php echo __( '門市名稱', 'purchaserStore' ) . ':'; ?><label id="purchaserStoreLabel"></label>
        </p>
        <p style="font-size: 0.8em;margin: 6px 0px; width: 84%;">
            <?php echo __( '門市地址', 'purchaserAddress' ) . ':'; ?><label id="purchaserAddressLabel"></label>
        </p>
        <p style="font-size: 0.8em;margin: 6px 0px; width: 84%;">
            <?php echo __( '門市電話', 'purchaserPhone' ) . ':'; ?><label id="purchaserPhoneLabel"></label>
        </p>
        <p style="font-size: 0.8em;color: #c9302c; width: 84%;">
            <?php echo '使用綠界科技超商取貨，連絡電話請填寫手機號碼。'; ?>
        </p>
    </td>
</tr>