<?php

namespace onemarshall\RellaxBundle\EventListener;

/**
 * Class HookListener
 *
 * @package onemarshall\RellaxBundle\EventListener
 */
class HookListener
{

    /**
     * Inject data-rellax attributes
     *
     * @param $objElement
     * @param $strBuffer
     * @return string
     */
    public function getContentElement($objElement, $strBuffer)
    {

        if (TL_MODE == 'BE' || !$objElement->rellax) {

            return $strBuffer;

        }

        $rellax = array(
            'speed' => $objElement->rellaxSpeed,
            'percentage' => $objElement->rellaxPercentage ? $objElement->rellaxPercentage / 100 : $objElement->rellaxPercentage,
            'zindex' => $objElement->rellaxZindex,
            'min' => $objElement->rellaxRangemin,
            'max' => $objElement->rellaxRangemax
        );

        $rellax = array_filter($rellax, function ($value) { return $value !== ''; });
        $div = '<div class="rellax"';

        foreach ($rellax as $attr => $value) {
            $div .= ' data-rellax-' . $attr . '="' . $value . '"';
        }

        $div .= '>' . $strBuffer;
        $div .= '</div>';

        return $div;

    }

}