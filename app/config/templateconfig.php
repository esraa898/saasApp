<?php 

return [
    'template' =>[
             'aside'           =>  TEMPLATE_PATH . 'aside.php',
             'wrapper_start'   =>  TEMPLATE_PATH . 'wrapperstart.php'  ,
             'nav'             =>  TEMPLATE_PATH . 'nav.php',
             ':view'           =>  ':action_view',
             'wrapper_end'     =>  TEMPLATE_PATH . 'wrapperend.php'
    ],

    'header_resources' =>[
        'css'  =>[
             'fontawesome'     =>  '/design/plugins/fontawesome-free'.css.'all.min.css',
             'bootstrap'       =>  "/design/plugins/bootstrap-slider/bootstrap-slider.min",
             'main'            =>   "/design/dist".css."adminlte.min.css", 
        ],
    ], 
    'footer_resources' =>[
           
            'js'   =>[
                'jquery'           =>  "/design/plugins/jquery/jquery.min.js",
                'bootstrap'        =>  "/design/plugins/bootstrap/js/bootstrap.bundle.min.js",
                'main'             =>   "/design/dist".js."adminlte.min.js"
            ]     

        ]
        ];