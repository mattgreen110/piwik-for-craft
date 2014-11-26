<?php

namespace Craft;

/**
 * ---------------------------------------
 * Class PiwikVariable
 * ---------------------------------------
 *
 * @package Craft
 */
class PiwikVariable
{
    // So many properties here if I was playing monopoly I would be
    // losing some friend right about now
    protected $attributionInfo;
    protected $browserHasCookies;
    protected $browserLanguage;
    protected $bulkTracking;
    protected $city;
    protected $country;
    protected $debugStringAppend;
    protected $forceVisitDateTime;
    protected $generationTime;
    protected $idSite;
    protected $ip;
    protected $latitude;
    protected $localTime;
    protected $longitude;
    protected $newVisitorId;
    protected $pageCharset;
    protected $plugins;
    protected $region;
    protected $resolution;
    protected $requestTimeout;
    protected $url;
    protected $urlReferrer;
    protected $userAgent;
    protected $userId;
    protected $customVariables;
    protected $title;

    /**
     * js
     */
    public function js()
    {
        craft()->templates->includeJsResource('piwik/js/piwik.js');
    }

    /**
     * @var array
     * This will store all of the set params above so we
     * can pass them to our service
     */
    protected $parameters = [];

    /**
     * @param mixed $attributionInfo
     * @return $this
     */
    public function setAttributionInfo($attributionInfo)
    {
        $this->attributionInfo = $attributionInfo;
        return $this;
    }

    /**
     * @param mixed $browserHasCookies
     * * @return $this
     */
    public function setBrowserHasCookies($browserHasCookies)
    {
        $this->browserHasCookies = $browserHasCookies;
        return $this;
    }

    /**
     * @param mixed $browserLanguage
     * @return $this
     */
    public function setBrowserLanguage($browserLanguage)
    {
        $this->browserLanguage = $browserLanguage;
        return $this;
    }

    /**
     * @param mixed $bulkTracking
     * @return $this
     */
    public function setBulkTracking($bulkTracking)
    {
        $this->bulkTracking = $bulkTracking;
        return $this;
    }

    /**
     * @param mixed $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param mixed $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @param mixed $debugStringAppend
     * @return $this
     */
    public function setDebugStringAppend($debugStringAppend)
    {
        $this->debugStringAppend = $debugStringAppend;
        return $this;
    }

    /**
     * @param mixed $forceVisitDateTime
     * @return $this
     */
    public function setForceVisitDateTime($forceVisitDateTime)
    {
        $this->forceVisitDateTime = $forceVisitDateTime;
        return $this;
    }

    /**
     * @param mixed $generationTime
     * @return $this
     */
    public function setGenerationTime($generationTime)
    {
        $this->generationTime = $generationTime;
        return $this;
    }

    /**
     * @param mixed $idSite
     * @return $this
     */
    public function setIdSite($idSite)
    {
        $this->idSite = $idSite;
        return $this;
    }

    /**
     * @param mixed $ip
     * @return $this
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @param mixed $latitude
     * @return $this
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @param mixed $localTime
     * @return $this
     */
    public function setLocalTime($localTime)
    {
        $this->localTime = $localTime;
        return $this;
    }

    /**
     * @param mixed $longitude
     * @return $this
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @param mixed $newVisitorId
     * @return $this
     */
    public function setNewVisitorId($newVisitorId)
    {
        $this->newVisitorId = $newVisitorId;
        return $this;
    }

    /**
     * @param mixed $pageCharset
     * @return $this
     */
    public function setPageCharset($pageCharset)
    {
        $this->pageCharset = $pageCharset;
        return $this;
    }

    /**
     * @param mixed $plugins
     * @return $this
     */
    public function setPlugins($plugins)
    {
        $this->plugins = $plugins;
        return $this;
    }

    /**
     * @param mixed $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @param mixed $requestTimeout
     * @return $this
     */
    public function setRequestTimeout($requestTimeout)
    {
        $this->requestTimeout = $requestTimeout;
        return $this;
    }

    /**
     * @param mixed $resolution
     * @return $this
     */
    public function setResolution($resolution)
    {
        $resolution = explode(',', $resolution);
        $this->resolution[] = ['width' => $resolution[0], 'height' => $resolution[1]];
        return $this;
    }

    /**
     * @param mixed $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param mixed $urlReferrer
     * @return $this
     */
    public function setUrlReferrer($urlReferrer)
    {
        $this->urlReferrer = $urlReferrer;
        return $this;
    }

    /**
     * @param mixed $userAgent
     * @return $this
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;
        return $this;
    }

    /**
     * @param mixed $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * setTitle
     *
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
        foreach ($customVariables as $key => $value) {
            $this->customVariables[] = ['name' => $key, 'value' => $value];
        }

        return $this;
    }


    /**
     * enableBulkTracking
     *
     * @param bool $bulkTracking
     */
    public function enableBulkTracking($bulkTracking = false)
    {
        craft()->piwik_tracking->enableBulkTracking($bulkTracking);
    }

    /**
     * track
     */
    public function track()
    {
        // If set, add these to the array ($this->parameters)
        if (!empty($this->userId)) { $this->parameters['setUserId'] = $this->userId; }
        if (!empty($this->userAgent)) { $this->parameters['setUserAgent'] = $this->userAgent; }
        if (!empty($this->browserLanguage)) { $this->parameters['setBrowserLanguage'] = $this->browserLanguage; }
        if (!empty($this->localTime)) { $this->parameters['setLocalTime'] = $this->localTime; }
        if (!empty($this->browserHasCookies)) { $this->parameters['setBrowserHasCookies'] = $this->browserHasCookies; }
        if (!empty($this->ip)) { $this->parameters['setIp'] = $this->ip; }
        if (!empty($this->forceVisitDateTime)) { $this->parameters['setForceVisitDateTime'] = $this->forceVisitDateTime; }
        if (!empty($this->url)) { $this->parameters['setUrl'] = $this->url; }

        // This service method loops through the parameters and sets them if they exist
        $track = craft()->piwik_tracking->setParameters($this->parameters);

        // If custom variables are set, pass them to a service that sets them
        if (!empty($this->customVariables)) {
            $track->setCustomVariables($this->customVariables);
        }

        // If we are sending all of the requests at once
        if ($this->bulkTracking === true) {
            $this->enableBulkTracking($this->bulkTracking);
            $track->bulkTrack();
        } else {
            $track->track($this->title);
        }
    }
}