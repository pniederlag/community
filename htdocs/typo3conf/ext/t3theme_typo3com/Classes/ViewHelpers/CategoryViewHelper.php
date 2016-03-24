<?php
namespace T3Com\Theme\ViewHelpers;

use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Fluid\Core\ViewHelper\Facets\CompilableInterface;

class CategoryViewHelper extends AbstractViewHelper implements CompilableInterface {
    /**
     * @param string $separator
     * @param array $usedCategories
     * @param array $fallbackCategories
     * @param bool
     * @return string
     */
    public function render($separator, $usedCategories, $fallbackCategories)
    {
        return static::renderStatic(
            array(
                'separator' => $separator,
                'usedCategories' => $usedCategories,
                'fallbackCategories' => $fallbackCategories
            ),
            $this->buildRenderChildrenClosure(),
            $this->renderingContext
        );
    }

    /**
     * Returns a comma-separated string of categories.
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        if (!empty($arguments['usedCategories'])) {
            $categoryArray = $arguments['usedCategories'];
        } else {
            $categoryArray = $arguments['fallbackCategories'];
        }

        $categories = [];
        foreach ($categoryArray as $category) {
            $categories[] = 'category-' . $category['data']['uid'];
        }

        return implode($arguments['separator'], $categories);
    }
}