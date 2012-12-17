<?php

namespace Versionable\Mandrill\Message;

use Versionable\Ferret\Detector\Fileinfo;
use Versionable\Ferret\Detector\Pathinfo;
use Versionable\Ferret\Detector\Composite;
use Versionable\Ferret\Ferret;

/**
 * Description of Attachment
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Attachment
{
    protected $type;
    
    protected $name;
    
    protected $content;
    
    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
    
    public function loadFile($filename)
    {
        if (false === is_readable($filename)) {
            throw new \InvalidArgumentException(sprintf('%s not readable', $filename));
        }
        
        $detector = new Composite();
        $detector->addDetector(new Fileinfo());
        $detector->addDetector(new Pathinfo());
        
        $ferret = new Ferret();
        $ferret->setDetector($detector);
        $mimetype = $ferret->getMimeType($filename);
        
        $this->setType($mimeType);
        $this->setContent(file_get_contents($filename));
    }
}
