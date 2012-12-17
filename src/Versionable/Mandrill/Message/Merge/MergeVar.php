<?php

namespace Versionable\Mandrill\Message\Merge;

/**
 * Description of Var
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class MergeVar
{
    protected $rcpt;
    
    protected $name;
    
    protected $content;
    
    public function getRcpt()
    {
        return $this->rcpt;
    }

    public function setRcpt($rcpt)
    {
        $this->rcpt = $rcpt;
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
}
