<?php

function hs_form($atts)
{
    if (!isset($atts['form'])) return '';
    if (!is_numeric($atts['form'])) return '';
    if (!in_array($atts['form'], [1, 2, 3, 4, 5])) return '';

    require_once HELASTEL_DIR . 'includes/class-helastel-process.php';

    $hsProcess = new HelastelProcess($atts['form']);

    return $hsProcess->process();
}

add_shortcode('hs_form', 'hs_form');

function hs_test_four()
{

    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 100;

    require_once HELASTEL_DIR . 'includes/class-helastel-process.php';
    $hsProcess = new HelastelProcess(4, $quantity);
    $table = $hsProcess->process(1);
    wp_send_json_success($table);
}

add_action('wp_ajax_hs_test_four', 'hs_test_four');



