<?php

namespace Craft;

/**
 * ---------------------------------------
 * Class Piwik_TrackingController
 * ---------------------------------------
 *
 * @package Craft
 */
class Piwik_TrackingController extends BaseController
{
    /**
     * actionTrackAction
     *
     * @param $actionUrl
     * @param $actionType
     */
    public function actionTrackAction($actionUrl, $actionType)
    {
        craft()->piwik_tracking->trackAction($actionUrl, $actionType);
    }

    /**
     * actionTrackEvent
     *
     * @param $category
     * @param $action
     * @param $name
     * @param $value
     */
    public function actionTrackEvent($category, $action, $name = '', $value = '')
    {
        craft()->piwik_tracking->trackEvent($category, $action, $name, $value);
    }

    /**
     * actionTrackContentImpression
     *
     * @param $contentName
     * @param $contentPiece
     * @param $contentTarget
     */
    public function actionTrackContentImpression($contentName, $contentPiece, $contentTarget)
    {
        craft()->piwik_tracking->trackContentImpression($contentName, $contentPiece, $contentTarget);
    }

    /**
     * actionTrackContentInteraction
     *
     * @param $interaction
     * @param $contentName
     * @param $contentPiece
     * @param $contentTarget
     */
    public function actionTrackContentInteraction($interaction, $contentName, $contentPiece, $contentTarget)
    {
        craft()->piwik_tracking->trackContentInteraction($interaction, $contentName, $contentPiece, $contentTarget);
    }

    /**
     * actionTrackSiteSearch
     *
     * @param $keyword
     * @param $category
     * @param $contentResults
     */
    public function actionTrackSiteSearch($keyword, $category, $contentResults)
    {
        craft()->piwik_tracking->trackSiteSearch($keyword, $category, $contentResults);
    }



}
