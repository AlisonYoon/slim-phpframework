<?php


namespace Example\ViewHelpers;


class HomepageViewHelper
{
    public static function outputStudents($students) // you use static method so you don't need to instantiate an object. also it's a lot faster.
    {
        $output = '';
        foreach($students as $student) {
            $output .= $student . '<br>';
        }
        return $output;
    }
}