<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Block mokitul is defined here.
 *
 * @package     block_mokitul
 * @copyright   2024 Your Name <you@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_mokitul extends block_base
{
    /**
     * Initializes class member variables.
     */
    public function init()
    {
        // Needed by Moodle to differentiate between blocks.
        $this->title = get_string("pluginname", "block_mokitul");
    }

    /**
     * Returns the block contents.
     *
     * @return stdClass The block contents.
     */
    public function get_content()
    {
        $this->page->requires->css(new moodle_url("/local/mokitul/styles.css"));

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = "";
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->items = [];
        $this->content->icons = [];
        $this->content->footer = "";

        $chat_identifier = "mokitul_chat_";

        global $COURSE;
        if ($COURSE) {
            $chat_identifier = $chat_identifier . \core\uuid::generate();

            $this->page->requires->js_call_amd(
                "local_mokitul/lib",
                "renderApp",
                [
                    "element" => $chat_identifier,
                    "course" => $COURSE->id,
                    "file" => null,
                    "preferredLayout" => "block",
                ]
            );
            // for a file we would use
            // $this->page->requires->js_call_amd('local_mokitul/lib', 'init', array("fileId" => $COURSE->id));
        }

        if (!empty($this->config->text)) {
            $this->content->text = $this->config->text;
        } else {
            if ($COURSE) {
                $this->content->text =
                    '<div id="' . $chat_identifier . '" ></div>';
            }
        }

        return $this->content;
    }

    /**
     * Defines configuration data.
     *
     * The function is called immediately after init().
     */
    public function specialization()
    {
        // Load user defined title and make sure it's never empty.
        if (empty($this->config->title)) {
            $this->title = get_string("pluginname", "block_mokitul");
        } else {
            $this->title = $this->config->title;
        }
    }

    /**
     * Sets the applicable formats for the block.
     *
     * @return string[] Array of pages and permissions.
     */
    public function applicable_formats()
    {
        return [
            "all" => true,
            # 'course-view' => true,
            # 'course-view-social' => false,
        ];
    }
}
