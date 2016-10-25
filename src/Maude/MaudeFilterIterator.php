<?php
namespace Maude;
use FilterIterator;

// MaudeFilterIterator that is configured by functions derived from Functor interface 

class MaudeFilterIterator extends FilterIterator {

    private $functor; 

    public function __construct(MaudeRegexIterator $iterator, Functor $functor)
    {
        parent::__construct($iterator);
        $this->functor = $functor;
    } 

    public function accept() : bool
    {
       $mdr_report_key = (int) $this->current()[0];

       return call_user_func($this->functor, $mdr_report_key);
    }
}

