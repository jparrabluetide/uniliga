<?php require_once WP_PLUGIN_DIR . '/uniliga/includes/bluetide-elementor-templates.php'; ?>
<?php
$template_id = get_id_by_slug('uniliga-header', 'bluetide_template');
echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id);
?>
