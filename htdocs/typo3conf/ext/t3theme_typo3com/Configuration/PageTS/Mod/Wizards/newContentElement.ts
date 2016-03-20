mod.wizards {
    newContentElement {
        wizardItems {
        }
    }
}


mod.wizards {
   newContentElement {
      wizardItems {
         common {
            elements {
               textmedia {
                  tt_content_defValues {
                     imageorient = 25
                  }
               }
            }
         }
         typo3com {
            header = LLL:EXT:t3theme_typo3com/Resources/Private/Language/ContentElements.xlf:ce_group
            elements {
               casestudy_teaser {
                  iconIdentifier = apps-clipboard-images
                  title = Case Study Teaser
                  description = Fullwidth Teaser for one specific Case Study. Shows Image in the background and overlays it with a translucent box.
                  tt_content_defValues {
                     CType = casestudy_teaser
                  }
               }
               casestudy_partner {
                  iconIdentifier = apps-pagetree-backend-user-hideinmenu
                  title = Case Study Partner Box
                  description = Information about the implementing partner of a case study
                  tt_content_defValues {
                     CType = casestudy_partner
                  }
               }
               hard_facts {
                  iconIdentifier = overlay-shop
                  title = Hardfacts Block
                  description = 3-column hardfacts (# of Installs, downloads, devs)
                  tt_content_defValues {
                     CType = hard_facts
                  }
               }
               list_item {
                  iconIdentifier = overlay-approved
                  title = List Item
                  description = Shows checkmark left to it. Use multiple entries for longer lists.
                  tt_content_defValues {
                     CType = list_item
                  }
               }
               intro_block {
                  iconIdentifier = content-beside-text-img-above-center
                  title = Intro Block
                  description = Use to create the intro of *ANY* page. Mandatory.
                  tt_content_defValues {
                     CType = intro_block
                  }
               }
               related_case_studies {
                  iconIdentifier = content-textpic
                  title = Related Case Studies
                  description = Textblock with a list of "Successfully used by" items on the right.
                  tt_content_defValues {
                     CType = related_case_studies
                  }
               }
               top_features {
                  iconIdentifier = apps-filetree-folder-list
                  title = Top Features
                  description = 2x3 menu of the most important features and a link to all features
                  tt_content_defValues {
                     CType = top_features
                  }
               }
               feature_menu {
                  iconIdentifier = apps-pagetree-folder-contains-news
                  title = Feature Menu
                  description = Special menu of all features. Make sure to set up a list of categories on the same page that holds this menu.
                  tt_content_defValues {
                     CType = menu
                     menu_type = feature_menu
                  }
               }
            }
            show = *
         }
      }
   }
}
