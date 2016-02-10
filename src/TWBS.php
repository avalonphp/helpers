<?php
/*!
 * Avalon
 * Copyright 2011-2016 Jack P.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Avalon\Helpers;

use Avalon\Action\View;
use Avalon\Helpers\HTML;
use Avalon\Language;

/**
 * Twitter Bootstrap Helper.
 *
 * @author Jack P.
 * @package Avalon\Helpers
 * @since 2.0.0
 */
class TWBS
{
    /**
     * Returns the HTML for FontAwesome icons.
     *
     * @param string $icon Name of the icon to use.
     *
     * @return string
     */
    public static function fa($icon, $text = null)
    {
        $html = "<span class=\"fa fa-{$icon}\"></span>";

        if ($text) {
            $html = "{$html} <span>{$text}</span>";
        }

        return $html;
    }

    /**
     * Returns the HTML of an alert.
     *
     * @param string  $message
     * @param string  $class   Alert class
     * @param boolean $dismissable
     *
     * @return string
     */
    public static function alert($message, $class = 'info', $dismissable = false)
    {
        if ($dismissable) {
            $class = "{$class} alert-dismissable";
        }

        $alert = ['<div class="alert alert-' . $class . '">'];

        if ($dismissable) {
            $alert[] = '    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        }

        $alert[] = "    {$message}";
        $alert[] = "</div>";

        return implode(PHP_EOL, $alert);
    }

    /**
     * Returns the HTML for a modal header.
     *
     * @param string $title
     *
     * @return string
     */
    public static function modalHeader($title)
    {
        $header = [
            '<div class="modal-header">',
            '    <button type="button" class="close" data-dismiss="modal">',
            '        <span aria-hidden="true">&times;</span>',
            '        <span class="sr-only">' . Language::translate('close') . '</span>',
            '    </button>',
            '    <h4 class="modal-title">' . $title . '</h4>',
            '</div>'
        ];

        return implode(PHP_EOL, $header);
    }
}
