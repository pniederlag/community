<?php
namespace TYPO3\T3theme\Hooks;

/**
 * Class RealUrlAutoConfiguration
 */
class RealUrlAutoConfiguration
{
    /**
     * Generates additional RealURL configuration and merges it with provided configuration
     *
     * @param array $params Default configuration
     * @param \tx_realurl_autoconfgen $pObj Parent object
     * @return array Updated configuration
     */
    public function addThmConfig($params, \tx_realurl_autoconfgen &$pObj)
    {

        return array_replace_recursive($params['config'], [
            'init' => [
                'enableCHashCache' => 1,
                'enableUrlDecodeCache' => 1,
                'enableUrlEncodeCache' => 1
            ],
            'pagePath' => [
                'disablePathCache' => false,
            ],
            'fileName' => [
                'defaultToHTMLsuffixOnPrev' => 0,
                'index' => [
                    'robots.txt' => [
                        'keyValues' => [
                            'type' => 9201,
                        ]
                    ],
                ]
            ],
            'preVars' => [
                [
                    'GETvar' => 'L',
                    'valueMap' => [
                        'en' => '1'
                    ],
                    'noMatch' => 'bypass',
                ]
            ],
            'fixedPostVars' => [

            ],
            'postVarSets' => [
                '_DEFAULT' => [

                ],
            ],
        ]);
    }
}
