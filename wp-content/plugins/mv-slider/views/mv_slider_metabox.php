<?php
$post_data = get_post_meta($post->ID);
$meta_link_text = get_post_meta($post->ID, 'mv_slider_link_text', true);
$meta_link_url = get_post_meta($post->ID, 'mv_slider_link_url', true);
var_dump($post_data)
    ?>

<table class="form-table mv-slider-metabox">
    <input type="hidden" name="mv_slider_nonce" value="<?php echo wp_create_nonce("mv_slider_nonce"); ?>">

    <tr>
        <th>
            <label for="mv_slider_link_text">Link Text</label>
        </th>
        <td>
            <input type="text" name="mv_slider_link_text" id="mv_slider_link_text" class="regular-text link-text"
                value="<?php echo isset($meta_link_text) ? esc_html($meta_link_text) : "" ?>" required>
        </td>
    </tr>
    <tr>
        <th>
            <label for="mv_slider_link_url">Link URL</label>
        </th>
        <td>
            <input type="url" name="mv_slider_link_url" id="mv_slider_link_url" class="regular-text link-url"
                value="<?php echo isset($meta_link_url) ? esc_url($meta_link_url) : "" ?>" required>
        </td>
    </tr>
</table>