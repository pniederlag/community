# text_only CE
# register new CE for gridelements
tt_content.casestudy_teaser < lib.gridelements.defaultGridSetup

tt_content.casestudy_teaser = FLUIDTEMPLATE
tt_content.casestudy_teaser {
    file = EXT:t3theme_typo3com/Resources/Private/Templates/ContentElements/CaseStudyTeaser.html

    partialRootPath = EXT:t3theme_typo3com/Resources/Private/Partials/ContentElements/
    dataProcessing {
        10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
        10 {
            references.fieldName = assets
        }
        20 = TYPO3\CMS\Frontend\DataProcessing\GalleryProcessor
        20 {
            maxGalleryWidth = {$styles.content.textmedia.maxW}
            maxGalleryWidthInText = {$styles.content.textmedia.maxWInText}
            columnSpacing = {$styles.content.textmedia.columnSpacing}
            borderWidth = {$styles.content.textmedia.borderWidth}
            borderPadding = {$styles.content.textmedia.borderPadding}
        }
    }
}