<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://theabdul.cyou/
 * @since             1.0.0
 * @package           wp-organimi
 *
 * @wordpress-plugin
 * Plugin Name:       Wp Organimi
 * Plugin URI:        http://example.com/wp-organimi-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Abdul Razzaq
 * Author URI:        https://theabdul.cyou/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-organimi
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'PLUGIN_NAME_VERSION', '1.0.0' );

global $wp_org_url;

$wp_org_url = plugin_dir_url( __FILE__ );

if(!function_exists('pree')){
    function pree($d) {

        echo '<pre>';
        print_r( $d);

        echo '</pre>';
    }
}

if(!function_exists('wp_org_public_hooks')){
    function wp_org_public_hooks() {
//        echo 'script called';
//        exit;
        add_action( 'wp_enqueue_scripts', 'wp_org_enqueue_scripts');

    }
}


if(!function_exists('wp_org_enqueue_scripts')){
    function wp_org_enqueue_scripts(){

        wp_enqueue_style( 'wp-org-css', plugin_dir_url( __FILE__ ) . 'css/style.css?t='.time(), array(), time(), 'all' );
        wp_enqueue_script( 'wp-org-js', plugin_dir_url( __FILE__ ) . 'js/script.js?t='.time(), array( 'jquery' ), time(), true );
    }
}

wp_org_public_hooks();

add_shortcode('WP_ORG_PRICE_PACKAGE', 'wp_org_price_package');

if(!function_exists('wp_org_price_package')){
    function wp_org_price_package($attr){
        global $wp_org_url;
        ob_start();

        ?>


            <div class="org_package_container">

                <div class="plan og_basic">
                    <h2 class="plan-title">
                        Basic
                    </h2>

                    <div class="plan-img">
                        <img src="<?php echo $wp_org_url; ?>img/card_1.svg" alt="">
                    </div>


                    <div class="plan-cost">$<span class="plan-price">29</span></div>




                    <h2 class="plan-includes">Includes:</h2>

                    <ul class="plan-features">
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Data import options</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Manual & automated chart building</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Multiple chart options: traditional, project, accountability</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Photoboards & directories</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Extensive customization features</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Unlimited charts, organizations, & custom fields</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Multiple chart sharing options</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Printing & exporting: styles, formats, & page options</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">User Access & Permissions Management</div>
                        </li>

                    </ul>
                    <div class="plan-select"><a href="">Start Trial</a></div>
                </div>

                <div class="plan og_premium featured">

                    <div class="ribbon ribbon-top-right"><span>Best Value</span></div>

                    <h2 class="plan-title">
                        Premium
                    </h2>

                    <div class="plan-img">
                        <img src="<?php echo $wp_org_url; ?>img/card_2.svg" alt="">
                    </div>

                    <div class="plan-cost">$<span class="plan-price">49</span></div>

                    <h2 class="plan-includes">Enjoy all of the best features in our Basic plan, plus...</h2>

                    <ul class="plan-features">

                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Organimi Connect integrations for Microsoft Azure and Google Workspace</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Automated chart updates for Microsoft and Google users</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Regional hosting options for Americas, Europe, & Asia</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Premium user support</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Dedicated Customer Success Manager</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Interactive onboarding workshops and user tutorials</div>
                        </li>
                        <li>
                            <div class="f_icon"><i class="ion-checkmark-circled"> </i></div>
                            <div class="feature">Organimi Connect API license**</div>
                        </li>

                    </ul>

                    <div class="plan-short">** Separate set up charges apply</div>

                    <div class="plan-select"><a href="">Start Trial</a></div>
                </div>

            </div>

        <?php

        return ob_get_clean();

    }
}


add_shortcode('WP_ORG_PRICE_SLIDER', 'wp_org_price_slider_callback');

if(!function_exists('wp_org_price_slider_callback')){
    function wp_org_price_slider_callback($attr){
        global $wp_org_url;
        ob_start();

        ?>

        <div class="org_slider_container">
            <form class="range">
                <div class="form-group range__slider">
                    <input type="range" step="1" min="1" max="21">
                    <div class="range__value">
                        <span></span> Employees
                    </div>
                </div>

            </form>

            <div class="plan-type">
                <span class="monthly">Monthly</span>
                <span class="type-switch">
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                  </span>
                <span class="annualy plan_active">Annually</span>
            </div>
        </div>

        <?php

        return ob_get_clean();

    }
}




