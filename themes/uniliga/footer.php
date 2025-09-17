<?php require_once WP_PLUGIN_DIR . '/uniliga/includes/bluetide-elementor-templates.php'; ?>
<?php
$template_id = get_id_by_slug('uniliga-newsletter', 'bluetide_template');
echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id);

$template_id = get_id_by_slug('uniliga-footer', 'bluetide_template');
echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id);
?>

<?php wp_footer(); ?>
</body>

</html>
