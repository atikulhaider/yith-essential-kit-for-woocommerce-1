<?php
/*
 * This file belongs to the YIT Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! current_user_can( 'activate_plugins' ) ) {
  ?>
    <div id="message" class="updated notice is-dismissible">
        <p><?php _e( 'Sorry, you don\'t have sufficient permission to access to this page.', 'yith-jetpack' ) ?></p></div>
<?php
   return;
}

//--- read module list -----------------------------

$modules = $this->get_admin_modules_list();
$active_modules = $this->active_modules();
$module_inserted_list = array();
$module_inserted_old_list = get_option( YITH_JetPack::MODULE_LIST_OPTION_NAME , array() );
$recommended_modules_list = apply_filters( 'yith_jetpack_recommended_list' , array() );

$count_all = count( $modules );
$count_active = count( $active_modules );
$count_inactive = $count_all - $count_active;
$count_recommended = count( $recommended_modules_list );

$plugin_filter_status = ! isset( $_GET['plugin_status'] ) ? 'all' : $_GET['plugin_status'];

//--------------------------------------------------

if ( isset( $_GET['message'] ) && $_GET['message'] == 'activated' ) : ?>
    <div id="message" class="updated notice is-dismissible">
        <p><?php _e( 'Module <strong>activated</strong>.', 'yith-jetpack' ) ?></p></div>
<?php elseif ( isset( $_GET['message'] ) && $_GET['message'] == 'deactivated' ) : ?>
    <div id="message" class="updated notice is-dismissible">
        <p><?php _e( 'Module <strong>deactivated</strong>.', 'yith-jetpack' ); ?></p></div>
<?php
elseif ( isset( $_GET['message'] ) && $_GET['message'] == 'activated-all' ) : ?>
    <div id="message" class="updated notice is-dismissible">
        <p><?php _e( 'Modules <strong>activated</strong>.', 'yith-jetpack' ) ?></p></div>
<?php
elseif ( isset( $_GET['message'] ) && $_GET['message'] == 'deactivated-all' ) : ?>
    <div id="message" class="updated notice is-dismissible">
        <p><?php _e( 'Modules <strong>deactivated</strong>.', 'yith-jetpack' ); ?></p></div>
<?php endif ?>

<div class="wrap">
    <h1><?php echo $this->_menu_title; ?></h1>

    <p><?php _e( "Here you can activate or deactive some of our plugins to enhance your e-commerce site.", 'yith-jetpack' ) ?></p>

    <div class="tablenav top">
        <div class="alignleft actions">
            <p>
                <a href="<?php echo wp_nonce_url( add_query_arg( array( 'action' => 'activate', 'module' => 'all' ) ), 'activate-yit-plugin' ) ?>"><?php !( $plugin_filter_status == 'recommended' ) ? _e( 'Activate all', 'yith-jetpack' ) : _e( 'Activate recommended', 'yith-jetpack' )  ?></a> |
                <a href="<?php echo wp_nonce_url( add_query_arg( array( 'action' => 'deactivate', 'module' => 'all' ) ), 'deactivate-yit-plugin' ) ?>"><?php !( $plugin_filter_status == 'recommended' ) ? _e( 'Deactivate all', 'yith-jetpack' ) : _e( 'Deactivate recommended', 'yith-jetpack' ) ?></a>
            </p>
        </div>
    </div>

    <div class="wp-list-table widefat plugin-install-network yith-jetpack">

        <?php
        echo '<ul class="subsubsub">';

       echo '<li class="all"><a href="'.esc_url( add_query_arg( array( 'plugin_status' => 'all' ) ) ).'" '.( $plugin_filter_status=='all' ? 'class="current"' : '' ).'>'.__( 'All', 'yith-jetpack' ).' <span class="count">('.$count_all.')</span></a> |</li>
            <li class="active"><a href="'.esc_url( add_query_arg( array( 'plugin_status' => 'active' ) ) ).'" '.( $plugin_filter_status=='active' ? 'class="current"' : '' ).'>'.__( 'Active', 'yith-jetpack' ).' <span class="count">('.$count_active.')</span></a> |</li>
            <li class="inactive"><a href="'.esc_url( add_query_arg( array( 'plugin_status' => 'inactive' ) ) ).'" '.( $plugin_filter_status=='inactive' ? 'class="current"' : '' ).'>'.__( 'Inactive', 'yith-jetpack' ).' <span class="count">('.$count_inactive.')</span></a></li>';
      if( $count_recommended > 0 ) {
        echo  '<li class="recommended">| <a href="'.esc_url( add_query_arg( array( 'plugin_status' => 'recommended' ) ) ).'" '.( $plugin_filter_status=='recommended' ? 'class="current"' : '' ).'>'.__( 'Recommended', 'yith-jetpack' ).' <span class="count">('.$count_recommended.')</span></a></li>';
      }

        echo '</ul>';
        ?>

        <div id="the-list">

            <?php

            uasort( $modules , array( $this, 'sort_modules' ) );

            foreach ( $modules as $key => $module_data ) {

                $module_inserted_list[] = $key;

                $is_active = in_array( $key, array_keys( $active_modules ) );
                $is_new = ! in_array( $key, $module_inserted_old_list );
                $is_recommended = in_array( $key, $recommended_modules_list );

                $premium_dir = isset( $module_data[ 'premium-dir' ] ) ? $module_data[ 'premium-dir' ] : $key;
                $is_premium_installed = file_exists( WP_PLUGIN_DIR . '/' . $premium_dir . '-premium' );

                if ( ( $plugin_filter_status == 'active' && ! $is_active ) || ( $plugin_filter_status == 'inactive' && $is_active ) || ( $plugin_filter_status == 'recommended' && !$is_recommended ) ) {
                    continue;
                }

                $this->print_single_plugin( $module_data, $is_active , $is_new , $is_recommended , $is_premium_installed );

            }

            update_option( YITH_JetPack::MODULE_LIST_OPTION_NAME, $module_inserted_list );

            ?>

        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function ($) {

        $('ul.plugin-action-buttons li a:not(disabled)').on('click', 'a.button', function (e) {
            $(this).prepend('<span class="update-message updating-message"></span>');
        });

    });
</script>

<style type="text/css">
    .plugin-card .updating-message:before {
        display: inline-block;
        margin-top: 3px;
        font: 400 20px/1 dashicons;
        color: #d54e21;
    }
</style>