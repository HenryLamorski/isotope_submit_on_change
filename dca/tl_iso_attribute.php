<?php
$GLOBALS['TL_DCA']['tl_iso_attribute']['palettes']['text'] = str_replace(
	"customer_defined",
	"customer_defined,register_submit_onchange,",
	$GLOBALS['TL_DCA']['tl_iso_attribute']['palettes']['text']
);

$GLOBALS['TL_DCA']['tl_iso_attribute']['palettes']['select'] = str_replace(
	"customer_defined",
	"customer_defined,register_submit_onchange,",
	$GLOBALS['TL_DCA']['tl_iso_attribute']['palettes']['select']
);


$GLOBALS['TL_DCA']['tl_iso_attribute']['fields']['register_submit_onchange'] = array(
			'label'					=> array('register_submit_onchange',''),
            'exclude'               => true,
            'inputType'             => 'checkbox',
            'eval'                  => array('tl_class'=>'w50'),
            'sql'                   => "char(1) NOT NULL default ''",
);
