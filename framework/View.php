<?php

namespace Framework;

class View
{
    public static function generate($content_view, $template_view, $data = null): void
    {
        if (is_array($data))
            extract($data);
        include_once APP_VIEWS . $template_view;
    }
}
