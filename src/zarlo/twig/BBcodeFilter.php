<?php

namespace zarlo\twig;

use ChrisKonnertz\BBCode\BBCode;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter; 

class BBcodeFilter extends AbstractExtension
{

    /**
    * Messages for next request
    *
    * @var ChrisKonnertz\BBCode\BBCode
    */
    public $bbcode;

    /**
    * Create new BBcode extension
    *
    * @param null|ChrisKonnertz\BBCode\BBCode $bbcode
    */
    /*public function __construct($bbcode = null)
    {
        if($bbcode == null){
            $this->bbcode = new BBCode();
        }
        $this->bbcode = $bbcode;
    }*/

    public function getFilters()
    {
        return array(
            new TwigFilter('bbcode', array($this, 'bbCodeFilter'), array('is_safe' => array('html'))),
        );
    }

    function bbCodeFilter($input)
    {   

        $this->bbcode = new BBCode();
        return $this->bbcode->render($input);
        //return $input."tert";
    }

    private function getSearch()
    {
        return $this->search;
    }
    private function getReplace()
    {
        return $this->replace;
    }
 
    private function getSearchRegex()
    {
        return $this->searchRegex;
    }
    private function getReplaceRegex()
    {
        return $this->replaceRegex;
    }
    public function getName()
    {
        return 'bbcode_extension';
    }

}
