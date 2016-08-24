<?php

use PHPUnit\Framework\TestCase;

class TestImageAttribution extends TestCase {

    public function examplesProvider() {
        return [
            [
                'Wikimedia-logo.svg', [
                    'src' => 'https://upload.wikimedia.org/wikipedia/commons/8/81/Wikimedia-logo.svg',
                    'url' => 'https://commons.wikimedia.org/wiki/File:Wikimedia-logo.svg',
                    'license' => 'Public domain',
                    'restriction' => 'trademarked',
                    'attribution' => FALSE,
                ]
            ],
            [ 
                'https://commons.wikimedia.org/wiki/File:Loewe_frontal.JPG', [
                    'credit'      => 'CC BY-SA 3.0: Martin Falbisoner',
                    'license'     => 'CC BY-SA 3.0',
                    'creator'     => 'Martin Falbisoner',
                    'attribution' => TRUE,
                ]
            ]
        ];
    }

    /**
     * @dataProvider examplesProvider
     */
    public function testExample($image, $expect) {
        $attribution = commons_image_attribution($image);
        foreach ($expect as $key => $value) {
            $this->assertEquals($attribution[$key], $value);
        }
    }
}
