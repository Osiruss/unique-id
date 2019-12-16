<?php
/**
 * unique-id plugin for Craft CMS 3.x
 *
 * Create a unique id
 *
 * @link      https://github.com/russell-kitchen
 * @copyright Copyright (c) 2019 russell-kitchen
 */

namespace russellkitchen\uniqueid;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;

use yii\base\Event;

/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://craftcms.com/docs/plugins/introduction
 *
 * @author    russell-kitchen
 * @package   Uniqueid
 * @since     1.0.0
 *
 */
class Uniqueid extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * Static property that is an instance of this plugin class so that it can be accessed via
     * Uniqueid::$plugin
     *
     * @var Uniqueid
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * Uniqueid::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        if (Craft::$app->request->getIsSiteRequest()) {
            // Add in our Twig extension
            $extension = new UniqueIdTwigExtension();
            Craft::$app->view->registerTwigExtension($extension);
        }
    }


    // Protected Methods
    // =========================================================================

}
