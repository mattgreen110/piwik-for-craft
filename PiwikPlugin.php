<?php

namespace Craft;

require(CRAFT_BASE_PATH . 'plugins/piwik/src/PiwikTracker.php');

/**
 * ---------------------------------------
 * Class PiwikPlugin
 * ---------------------------------------
 *
 * @package Craft
 */
class PiwikPlugin extends BasePlugin
{

    /**
     * getName
     *
     * @return null|string
     */
    public function getName()
    {
        return Craft::t('Piwik');
    }

    /**
     * getVersion
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.0';
    }

    /**
     * getDeveloper
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Matt Green';
    }

    /**
     * getDeveloperUrl
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://www.mattgreen.co';
    }

    /**
     * defineSettings
     *
     * @return array
     */
    protected function defineSettings()
    {
        return array(
            'piwikTokenAuth' => array(AttributeType::String, 'required' => true),
            'piwikSiteUrl' => array(AttributeType::Url, 'required' => true),
            'piwikSiteId' => array(AttributeType::Number, 'required' => true)
        );
    }

    /**
     * getSettingsHtml
     *
     * @return string
     */
    public function getSettingsHtml()
    {
        return craft()->templates->render('piwik/_settings', array(
            'settings' => $this->getSettings()
        ));
    }

}
