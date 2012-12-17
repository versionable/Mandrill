<?php

namespace Versionable\Mandrill\Message;

use Versionable\Common\Collection\Set;

/**
 * Description of Message
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Message
{
    protected $html;
    
    protected $text;
    
    protected $subject;
    
    protected $fromEmail;
    
    protected $fromName;
    
    protected $to;
    
    protected $headers;
    
    protected $trackOpens;
    
    protected $trackClicks;
    
    protected $autoText;
    
    protected $urlStripQs;
    
    protected $bccAddress;
    
    protected $merge;
    
    protected $globalMergeVars;
    
    protected $mergeVars;
    
    protected $tags;
    
    protected $googleAnalyticsDomains;
    
    protected $googleAnalyticsCampaign;
    
    protected $metadata;
    
    protected $attachments;
    
    public function __construct()
    {
        $this->to = new Set();
        $this->headers = array();
        $this->trackOpens = true;
        $this->trackClicks = true;
        $this->autoText = true;
        $this->urlStripQs = false;
        $this->merge = false;
        $this->globalMergeVars = new Set();
        $this->mergeVars = new Set();
        $this->tags = array();
        $this->googleAnalyticsDomains = array();
        $this->metadata = array();
        $this->attachments = new Set();
    }
    
    public function getHtml()
    {
        return $this->html;
    }

    public function setHtml($html)
    {
        $this->html = $html;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getFromEmail()
    {
        return $this->fromEmail;
    }

    public function setFromEmail($fromEmail)
    {
        $this->fromEmail = $fromEmail;
    }

    public function getFromName()
    {
        return $this->fromName;
    }

    public function setFromName($fromName)
    {
        $this->fromName = $fromName;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo(array $to)
    {
        foreach ($to as $recipient) {
            $this->addRecipient($recipient);
        }
    }
    
    public function addRecipient(Receipient $recipient)
    {
        $this->to->add($recipient);
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setHeaders(array $headers)
    {
        foreach ($headers as $header) {
            $this->addHeader($header);
        }
    }
    
    public function addHeader($header)
    {
        $this->headers[] = $header;
    }

    public function getTrackOpens()
    {
        return $this->trackOpens;
    }

    public function setTrackOpens($trackOpens)
    {
        $this->trackOpens = $trackOpens;
    }

    public function getTrackClicks()
    {
        return $this->trackClicks;
    }

    public function setTrackClicks($trackClicks)
    {
        $this->trackClicks = $trackClicks;
    }

    public function getAutoText()
    {
        return $this->autoText;
    }

    public function setAutoText($autoText)
    {
        $this->autoText = $autoText;
    }

    public function getUrlStripQs()
    {
        return $this->urlStripQs;
    }

    public function setUrlStripQs($urlStripQs)
    {
        $this->urlStripQs = $urlStripQs;
    }

    public function getBccAddress()
    {
        return $this->bccAddress;
    }

    public function setBccAddress($bccAddress)
    {
        $this->bccAddress = $bccAddress;
    }

    public function getMerge()
    {
        return $this->merge;
    }

    public function setMerge($merge)
    {
        $this->merge = $merge;
    }

    public function getGlobalMergeVars()
    {
        return $this->globalMergeVars;
    }

    public function setGlobalMergeVars(array $globalMergeVars)
    {
        $this->globalMergeVars = $globalMergeVars;
        $this->merge = true;
    }

    public function getMergeVars()
    {
        return $this->mergeVars;
    }

    public function setMergeVars(array $mergeVars)
    {
        $this->mergeVars = $mergeVars;
        $this->merge = true;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

    public function getGoogleAnalyticsDomains()
    {
        return $this->googleAnalyticsDomains;
    }

    public function setGoogleAnalyticsDomains(array $googleAnalyticsDomains)
    {
        $this->googleAnalyticsDomains = $googleAnalyticsDomains;
    }

    public function getGoogleAnalyticsCampaign()
    {
        return $this->googleAnalyticsCampaign;
    }

    public function setGoogleAnalyticsCampaign($googleAnalyticsCampaign)
    {
        $this->googleAnalyticsCampaign = $googleAnalyticsCampaign;
    }

    public function getMetadata()
    {
        return $this->metadata;
    }

    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;
    }

    public function getAttachments()
    {
        return $this->attachments;
    }

    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
    }
    
    public function buildRequest()
    {
        $data = array(
            'html' => $this->getHtml(),
            'text' => $this->getText(),
            'subject' => $this->getSubject(),
            'from_email' => $this->getFromEmail(),
            'from_name' => $this->getFromName(),
            'to' => $this->getTo(),
            'headers' => $this->getHeaders(),
            'track_opens' => $this->getTrackOpens(),
            'track_clicks' => $this->getTrackClicks(),
            'auto_text' => $this->getAutoText(),
            'url_strip_qs' => $this->getUrlStripQs(),
            'bcc_address' => $this->getBccAddress(),
            'merge' => $this->getMerge(),
            'global_merge_vars' => $this->getGlobalMergeVars(),
            'merge_vars' => $this->getMergeVars(),
            'tags' => $this->getTags(),
            'google_analytics_domains' => $this->getGoogleAnalyticsDomains(),
            'google_analytics_campaign' => $this->getGoogleAnalyticsCampaign(),
            'metadata' => $this->getMetadata(),
            'attachments' => $this->getAttachments()
        );
        
        return $data;
    }
}
