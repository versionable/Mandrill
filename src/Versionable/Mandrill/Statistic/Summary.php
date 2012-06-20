<?php

namespace Versionable\Mandrill\Statistic;

/**
 * Description of Summary
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class Summary extends Aggregate
{
    protected $range;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->range = "today";
    }
    
    public function getRange()
    {
        return $this->range;
    }

    public function setRange($range)
    {
        $this->range = $range;
    }
}
