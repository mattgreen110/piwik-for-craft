Piwik for Craft CMS
==================

[Piwik](http://piwik.org) is an open source analytics platform.

This is a solution to my own needs while building an application using Craft. It may or may not be of use to you. If so, awesome! If not, [this](http://i3.kym-cdn.com/photos/images/newsfeed/000/375/849/9f1.gif). 

This plugin is NOT for viewing analytics within the Craft control panel. Although that would be super cool and I may do that later, Piwik's control panel serves me just fine. It IS however just a simple plugin making it easier to track user data on a craft site.   

####Why not Google analytics?
Google analytics has policies that prevent you from storing specific user data that could be used somehow to identify a user's real identity. When I look at reports or visitor logs for my application I want each visit to show profile data from Craft such as full name, company, username, and email. Piwik is an open source solution that you can install on your own server. If you want to store user data without being limited by terms of use then it's the best solution I have found.

###Installation & Configuration
If you are like me you skim documentation and don't want to deal with the learning curve (lazy). Some people want to know only what it requires to get things working because they are dealing with budgets and deadlines (or cause lazy). If that is you and you want the absolute bare minimum then here you go:

1. [Install Piwik](http://piwik.org/docs/installation/) you silly banana. _(Wherever you want)_
2. Install this plugin for your Craft site
3. To configure with your Piwik install, go to the plugin settings and give Craft the following:
    * Auth Token _(Found in settings > API in the Piwik control panel)_
    * Site Url _(Where your piwik install is, for example: analytics.yourdomain.com)_
    * Site ID _(You set this in Piwik because you can have multiple sites)_
4. Put this at the bottom of your page before the body tag

```twig
{{ craft.piwik.setUserId(user.username).track() }}
```

##Usage
The "src" directory contains Piwik's official PHP wrapper for their [Tracking Web API](http://developer.piwik.org/api-reference/PHP-Piwik-Tracker). This is instantiated in the Piwik_trackingService class and is used by ONLY the tracking service. Most all of the setters in the their tracking API are available in the craft variables class. Below is an example of what your template might look like:

```twig
{% if craft.session.isLoggedIn %}
    
    {# Define your page title however you want, if not set it will just show in Piwik by url #}
    {% set pageTitle = craft.request.segment(1) | capitalize | replace({'%-%': ' '}) %}
    
    {# Define your custom variables (up to 5) in a simple array #}
    {% set customVariables = {
	        'division' : currentUser.groups | first | title,
	        'name' : user.firstName | title ~ ' ' ~ user.lastName | title,
	        'email' : user.email,
	        'type' : user.usersType | title,
	        'company' : user.usersCompany 
    	}
    %}

    {# Set your userID, custom variables & page title #}
    {{ craft.piwik.setUserId(user.username)
                .setCustomVariables(customVariables)
                .setTitle(pageTitle)
                .track()
    }}

{% endif %}
``` 

For a full list of parameters you can set just look at the setters in PiwikVariable.php. 

###Track Events and Actions
In addition to the track() method you can track specific events, actions (outlinks & downloads), and content interactions.

For now until I take the time to refactor a better solution I just fire off some asyncronous calls using jQuery. These calls hit your craft controllers. To include this javascript in your front end template just add the following:

```
{{ craft.piwik.js }}
```

#### Action Example Markup
Actions take [two parameters](http://developer.piwik.org/api-reference/PHP-Piwik-Tracker#dotrackaction)
```html
<a href="{{ url }}" target="_blank" class="track-action" data-action-type="download">Link</a>
```

#### Event Example Markup
Events take [four parameters](http://developer.piwik.org/api-reference/PHP-Piwik-Tracker#dotrackevent)
```html
<a href="#tour" class="button track-event" data-action="click" data-category="support" data-value="{{ currentGroup }} Tour" data-name="Take a Tour">Take a Tour</a>
```

#### Content Impressions & Interactions
I wrote methods for this in the trackingService but I am not using any of them.


