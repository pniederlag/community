// -----------------------------------------------------------------------------
// Temp objects
// -----------------------------------------------------------------------------


// Main Menu
// -------------------------------------
temp.mainMenu = HMENU
temp.mainMenu {
	entryLevel = 0
	wrap = <ul class="burger-navigation">|</ul>
	wrap = <ul class="burger-navigation closed">|</ul>

	1 = TMENU
	1 {
		expAll = 1
		noBlur = 1
		wrap = |

		NO = 1
		NO {
			wrapItemAndSub = <li class="menu-lvl1"><span class="list-icon"></span>|</li>
			doNotLinkIt = 1
			linkWrap = <span class="headline-lvl1">|</span>
		}

		ACT < .NO
		ACT = 1
		ACT {
			ATagParams = class="active"
		}
	}

	2 = TMENU
	2 {
		wrap = <ul class="list-inline">|</ul>
		expAll = 1
		noBlur = 1
		NO = 1
		NO {
			wrapItemAndSub = <li class="list-inline-item menu-lvl2">|</li>
			stdWrap.htmlSpecialChars = 1
		}

		ACT < .NO
		ACT = 1
		ACT {
			ATagParams = class="active"
		}
	}
}


// Logo
// -------------------------------------
temp.logo {

}


// Search
// -------------------------------------
temp.search {

}


// Footer-Menu
// -------------------------------------

temp.footerMenu = COA
temp.footerMenu {

	10 = HMENU
	10 {

		1 = TMENU
		1 {
			wrap = |
			expAll = 1

			NO = 1
			NO {
				wrapItemAndSub = <div class="col-sm-3">|</div>
				stdWrap.htmlSpecialChars = 1
				stdWrap.wrap = <h3 class="footer-menu-headline">|</h3>
				doNotLinkIt = 1
			}
		}

		2 = TMENU
		2 {
			wrap = <ul class="list-unstyled">|</ul>
			expAll = 1

			NO = 1
			NO {
				wrapItemAndSub = <li>|</li>
				stdWrap.htmlSpecialChars = 1
			}

			ACT = 1
			ACT < .NO
			ACT {
				wrapItemAndSub = <li>|</li>
				ATagParams = class="active"
			}
		}
	}

	20 = TEXT
	20.value = Newsletter
	20.wrap = <div class="col-sm-3"><h3>|</h3></div>
}

