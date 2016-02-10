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

use Avalon\Http\Request;
use Avalon\Database\Model\Base as BaseModel;

/**
 * Gravatar helper.
 *
 * @package Avalon\Helpers
 * @author Jack P.
 * @since 2.0.0
 */
class Gravatar
{
    /**
     * Default avatar size.
     *
     * @var integer
     */
    public static $defaultSize = 16;

    /**
     * Fallback avatar style.
     *
     * @var string
     */
    public static $fallback = 'mm';

    /**
     * Gravatar URL.
     *
     * @var string
     */
    public static $gravatarUrl = '//www.gravatar.com/avatar/';

    /**
     * Get image for a model.
     *
     * @param BaseModel $model
     * @param integer   $size
     *
     * @return string
     */
    public static function model(BaseModel $model, $size = null)
    {
        return static::img($model['email'], $size);
    }

    /**
     * Get image for an email.
     *
     * @param string  $email
     * @param integer $size
     *
     * @return string
     */
    public static function img($email, $size = null)
    {
        return '<img src="' . static::url($email, $size) . '" class="gravatar gravatar-' . $size . '">';
    }

    /**
     * Get image for an email with a string to the right.
     *
     * @param string  $email
     * @param string  $string
     * @param integer $size
     *
     * @return string
     */
    public static function withString($email, $string, $size = null)
    {
        return static::img($email, $size) . " <span>{$string}</span>";
    }

    /**
     * Get URL for an email.
     *
     * @param string  $email
     * @param integer $size
     *
     * @return string
     */
    public static function url($email, $size = null)
    {
        $fallback = static::$fallback;

        if ($size === null) {
            $size = '&s=' . static::$defaultSize;
        } else {
            $size = '&s=' . $size;
        }

        return static::$gravatarUrl . md5($email) . "?d={$fallback}" . $size;
    }
}
