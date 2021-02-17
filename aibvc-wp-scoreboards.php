<?php
/**
 * AIBVC Scoreboards
 *
 * @package           AIBVCS
 * @author            5G
 * @copyright         2021 ittsrimini
 * @license           GPL-3.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       AIBVC Scoreboards
 * Description:       Modulo per l'utilizzo di Widget che comunicano con le API AIBVC.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            5G
 * Text Domain:       aibvc-wp-scoreboards
 * License:           GPL v3 or later
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('ABSPATH') || die("Access denied.");

require __DIR__ . '/src/Kernel.php';

\AIBVCS\Kernel::boot();
