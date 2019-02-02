<?php
/*
Plugin Name: Notary Fee Calculator
Description: Калкулатор за нотариални такси при покупка на имот.
Version: 1.0.0
Author: Пламен Петков pdpetkov@abv.bg
*/

defined('ABSPATH') or die('No script kiddies please!');

/**
 *  nfc_ : notary fee calculator
 */
class NotaryCalculator
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'nfc_register_scripts']);
        add_action('init', [$this, 'nfc_add_form_shortcode']);
    }

    public function nfc_register_scripts()
    {
        wp_enqueue_script('notary_fee', plugins_url('/assets/js/notary_fee.js', __FILE__), '', '1.0.0', true);

    }

    public function nfc_add_form_shortcode()
    {
        add_shortcode('notary_calculator', [$this, 'nfc_display_form_html']);
    }

    public function nfc_display_form_html($atts)
    {
        $arg = [
            'framework'=>'foundation'
        ];

        if (! empty($atts)) {
            $arg = wp_parse_args($atts, $arg);
        }

        return include plugin_dir_path(__FILE__) . '/includes/calculator_form_html_'.$arg['framework'].'.php';
    }

    public function activate()
    {
        flush_rewrite_rules();
    }

    public function deactivate()
    {
        flush_rewrite_rules();
    }

}

$notaryCalculator = new NotaryCalculator();

register_activation_hook(__FILE__, [$notaryCalculator, 'activate']);
register_deactivation_hook(__FILE__, [$notaryCalculator, 'deactivate']);