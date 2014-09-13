<?php
class View
{    
    //класс вида обеспечивает вывод шаблона
    function generate($content_view, $template_view, $data = null)
    {
             
        include 'application/views/'.$template_view;
    }
}