<?php

foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $palette) {

    if (is_string($key)) {
        $GLOBALS['TL_DCA']['tl_content']['palettes'][$key] = str_replace(
            '{invisible_legend:hide}',
            '{rellax_legend:hide},rellaxSpeed,rellaxPercentage,rellaxZindex,rellax;{invisible_legend:hide}',
            $palette
        );
    }

}


$GLOBALS['TL_DCA']['tl_content']['fields']['rellaxSpeed'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['rellaxSpeed'],
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => array('tl_content_rellax', 'getSpeeds'),
    'eval' => array('tl_class' => 'w50', 'includeBlankOption' => true),
    'sql' => "varchar(4) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['rellaxPercentage'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['rellaxPercentage'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class' => 'w50', 'rgxp' => 'prcnt'),
    'sql' => "varchar(4) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['rellaxZindex'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['rellaxZindex'],
    'exclude' => true,
    'inputType' => 'text',
    'eval' => array('tl_class' => 'w50', 'rgxp' => 'digit'),
    'sql' => "varchar(4) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['rellax'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['rellax'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => array('tl_class' => 'w50 m12'),
    'sql' => "char(1) NOT NULL default ''"
);


class tl_content_rellax {

    public function getSpeeds() {

        return array(
            '-10',
            '-9',
            '-8',
            '-7',
            '-6',
            '-5',
            '-4',
            '-3',
            '-2',
            '-1',
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10'
        );

    }

}