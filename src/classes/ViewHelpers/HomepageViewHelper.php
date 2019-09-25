<?php


namespace Example\ViewHelpers;


class HomepageViewHelper
{
    public static function outputStudents($students)
    {
        $output = '';
        foreach($students as $student) {
            $output .= $student . '<br>';
        }
        return $output;
    }
}