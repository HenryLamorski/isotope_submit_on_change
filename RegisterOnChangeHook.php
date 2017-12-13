<?php 
namespace Henry;
class RegisterOnChangeHook
{
    public function generateProduct($objTemplate,$objProduct)
    {
		$arrAjaxProducts = array();
		foreach (
			array_unique(
				array_merge(
					$objProduct->getType()->getAttributes(),
					$objProduct->getType()->getVariantAttributes()
				)
			) 
			as $attribute
		) 
		{
            $arrData = $GLOBALS['TL_DCA']['tl_iso_product']['fields'][$attribute];

            if (($arrData['attributes']['customer_defined'] || $arrData['attributes']['variant_option']) && $arrData['attributes']['register_submit_onchange']) 
			{
				$arrAjaxProducts[] = $arrData['attributes']['field_name'];
            }
        }


        /**
         * add attributes with flag register_submit_onchange to AJAX_PRODUCTS Array
         * isope.js will register a change listener to them.
         */
        foreach($GLOBALS['AJAX_PRODUCTS'] as $key => $arr)
        {
            if(!isset($arr['formId']) || $arr['formId'] !== $objProduct->getFormId())
                continue;
 
			$GLOBALS['AJAX_PRODUCTS'][$key]['attributes'] = array_unique(
				array_merge(
					$GLOBALS['AJAX_PRODUCTS'][$key]['attributes'],
					$arrAjaxProducts
				)
			);
        }

        return true;
    }

}
