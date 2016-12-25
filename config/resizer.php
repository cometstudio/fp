<?php

// width, height, crop, filter, watermark

return [
    'dir'=>'images',
    'tmpDir'=>'tmp',
    'dirs'=>[
        'default'=>[
            'thumbs'=>[130, 130, true],
            //'small'=>[300, 300, true],
            //'big'=>[640, 640, true, null, true],
            //'bigGrayscale'=>[640, 640, true, IMG_FILTER_GRAYSCALE],
            //'source'=>[1920, 1200, false],
        ]
        ,'calendar'=>[
            'thumbs'=>[130, 130, true],
            'small'=>[300, 202, true],
            'medium'=>[600, 399, true],
        ]
        ,'recipe'=>[
            'thumbs'=>[130, 130, true],
            'small'=>[150, 100, true],
        ],
    ],
    'settings'=>[
        'quality'=>70,
        'resize'=>'auto',
    ]
];