<?php

namespace Craft;

use PiwikTracker;

/**
 * ---------------------------------------
 * Class Piwik_trackingService
 * ---------------------------------------
 *
 * @package Craft
 */
class Piwik_trackingService extends BaseApplicationComponent
{

    /**
     * @var PiwikTracker
     */
    protected $piwik;

    /**
     *
     */
    public function __construct()
    {
        // Instantiate the PHP tracking client http://developer.piwik.org/api-reference/PHP-Piwik-Tracker
        $this->piwik = new PiwikTracker($this->getSetting('piwikSiteId'), $this->getSetting('piwikSiteUrl'));
        $this->piwik->setTokenAuth($this->getSetting('piwikTokenAuth'));
    }

    /**
     * setParameters
     *
     * @param $params
     * @return $this
     */
    public function setParameters($params)
    {
        // Loop through the parameters and set them
        foreach($params as $key => $value) {
            $this->piwik->{$key}($value);
        }

        return $this;
    }

    /**
     * setCustomVariables
     *
     * @param $customVariables
     * @return $this
     */
    public function setCustomVariables($customVariables)
    {
        // I want it prettier on the front end and dirtier on the back end (that's what she said)
        // Dirty as in more logic. So we need to take the pretty array and loop through it 
        // here. You can only set up to five. Pretty twig example below:
        // =============================================================================
        // {% set customVariables = {
        //      'division' : currentUser.groups | first | title,
        //      'name' : user.firstName | title ~ ' ' ~ user.lastName | title,
        //      'email' : user.email,
        //      'type' : user.usersType | title,
        //      'company' : user.usersCompany }
        // %}
        // =============================================================================

        // Ok I guess it's actually not that dirty
        foreach($customVariables as $key => $value) {
            $this->piwik->setCustomVariable($key + 1, $value['name'], $value['value']);
        }

        return $this;
    }

    /**
     * track
     *
     * @param string $title
     */
    public function track($title = '')
    {
        $this->piwik->doTrackPageView($title);
    }

    /**
     * trackAction
     *
     * @param $actionUrl
     * @param $actionType
     * @internal param $url
     * @internal param $type
     */
    public function trackAction($actionUrl, $actionType)
    {
        $this->piwik->doTrackAction($actionUrl, $actionType);
    }

    /**
     * trackEvent
     *
     * @param $category
     * @param $action
     * @param $name
     * @param $value
     */
    public function trackEvent($category, $action, $name = '', $value = '')
    {
        $this->piwik->doTrackEvent($category, $action, $name, $value);
    }

    /**
     * trackContentImpression
     *
     * @param $contentName
     * @param $contentPiece
     * @param $contentTarget
     */
    public function trackContentImpression($contentName, $contentPiece, $contentTarget)
    {
        $this->piwik->dotrackContentImpression($contentName, $contentPiece, $contentTarget);
    }

    /**
     * trackContentInteraction
     *
     * @param $interaction
     * @param $contentName
     * @param $contentPiece
     * @param $contentTarget
     */
    public function trackContentInteraction($interaction, $contentName, $contentPiece, $contentTarget)
    {
        $this->piwik->dotrackContentInteraction($interaction, $contentName, $contentPiece, $contentTarget);
    }

    /**
     * trackSiteSearch
     *
     * @param $keyword
     * @param $category
     * @param $contentResults
     */
    public function trackSiteSearch($keyword, $category, $contentResults)
    {
        $this->piwik->doTrackSiteSearch($keyword, $category, $contentResults);
    }

    /**
     * enableBulkTracking
     *
     * @param bool $bulkTracking
     */
    public function enableBulkTracking($bulkTracking = false)
    {
        $this->piwik->enableBulkTracking($bulkTracking);
    }

    /**
     * bulkTrack
     */
    public function bulkTrack()
    {
        $this->piwik->doBulkTrack();
    }

    /**
     * getSetting
     *
     * @param $setting
     * @return mixed
     */
    public function getSetting($setting)
    {
        $plugin = craft()->plugins->getPlugin('piwik');
        $settings = $plugin->getSettings();
        return $settings->{$setting};
    }
}