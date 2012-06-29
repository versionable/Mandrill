<?php

namespace Versionable\Mandrill\Statistic;

/**
 * Description of TimeSeries
 *
 * @author Harry Walter <harry.walter@lqdinternet.com>
 */
class TimeSeries extends Aggregate
{
    protected $time;
    
    public function getTime()
    {
        return $this->time;
    }

    public function setTime(\DateTime $time)
    {
        $this->time = $time;
    }
}
