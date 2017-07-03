<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo get_website_title(); ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<?php wp_head(); ?>

		<script>
			window.themeUri = '<?php echo get_template_directory_uri(); ?>';
			window.debug = <?php echo WP_DEBUG ? 'true' : 'false'; ?>
		</script>
	</head>

	<body <?php body_class(); ?>>
<header class="mh">
        <div class="mh-stripe">
          <div class="mh-stripe-wrap">
            <ul class="mh-user-menu">
              <li class="first"><span>More from The Economist</span>
                <ul><li class="first"><a target="_blank" href="http://www.economist.com/digital">The Economist digital editions</a></li>
                  <li><a target="_blank" href="http://www.economist.com/newsletters">Newsletters</a></li>
                  <li><a target="_blank" href="http://www.economist.com/events">Events</a></li>
                  <li><a target="_blank" href="http://jobs.economist.com">Jobs.Economist.com</a></li>
                  <li class="last"><a href="http://www.economist.com/bookmarks">Timekeeper reading list</a></li>
                  </ul></li>
                  <li class="even"><span>My Subscription</span><ul><li class="first"><a target="_blank" href="http://www.economist.com/products/subscribe">Subscribe to The Economist</a></li>
                  <li><a target="_blank" href="http://www.economist.com/activate">Activate my digital subscription</a></li>
                  <li><a target="_blank" href="http://www.economist.com/user">Manage my subscription</a></li>
                  <li class="last"><a target="_blank" href="http://www.economist.com/products/renew">Renew</a></li>
                  </ul></li>
                  <li class="last"><a target="_blank" href="http://www.economist.com/user/login" class="show-login">Log in or register</a></li>
              </ul>
                    <div class="mh-search">
                <form accept-charset="UTF-8" method="POST" id="search-theme-form" action="http://www.economist.com/search/gcs" onsubmit="window.location='http://www.economist.com/search/gcs?ss=' + document.forms['search-theme-form']['edit-search-theme-form-1'].value; return false;">
      <div><div id="search" class="container-inline">
        <div class="form-item clearfix" id="edit-search-theme-form-1-wrapper">
       <label for="edit-search-theme-form-1">Search this site:</label>
      <input type="text" maxlength="128" name="search_theme_form" id="edit-search-theme-form-1" size="15" value="" title="Enter the terms you wish to search for." autocorrect="off" class="form-text" dir="ltr" autocomplete="off" spellcheck="false" style="outline: none;">
      </div>
      <input type="submit" name="op" id="edit-submit" value="Search" class="form-submit" onClick="window.location='http://www.economist.com/search/gcs?ss=' + document.forms['search-theme-form']['edit-search-theme-form-1'].value; return false;">
      <input type="hidden" name="form_id" id="edit-search-theme-form" value="search_theme_form">

      </div>

      </div><input type="hidden" name="cx" value="004327424273848638926:jnfohuhs4fs" id="edit-cx"></form>
              </div>
                </div> <!-- /.mh-stripe-wrap -->
        </div> <!-- /.mh-stripe -->
        <div class="mh-nav mh-big">
          <div class="mh-nav-wrap">
          <h1 class="svg-logo"><a target="_blank" href="http://www.economist.com/" class="active"><img class="mh-logo" width="170" height="85" src="http://media.economist.com/sites/all/themes/econfinal/images/svg/logo.svg" alt="The Economist"></a></h1>
          <nav>
          <ul class="mh-nav-links"><li class="first"><a target="_blank" href="http://www.economist.com/content/politics-this-week" title="" class="sub-menu-link">World politics</a><ul class="mh-subnav"><li class="first"><a target="_blank" href="http://www.economist.com/content/politics-this-week">Politics this week</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/world/united-states">United States</a></li>
          <li><a target="_blank" href="http://www.economist.com/world/britain">Britain</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/world/europe">Europe</a></li>
          <li><a target="_blank" href="http://www.economist.com/world/china">China</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/world/asia">Asia</a></li>
          <li><a target="_blank" href="http://www.economist.com/world/americas">Americas</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/world/middle-east-africa">Middle East &amp; Africa</a></li>
          <li class="last"><a target="_blank" href="/sections/international">International</a></li>
          </ul></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/business-finance" class="sub-menu-link">Business &amp; finance</a><ul class="mh-subnav"><li class="first"><a target="_blank" href="http://www.economist.com/business-finance" title="">All Business &amp; finance</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/whichmba">Which MBA?</a></li>
          </ul></li>
          <li class=""><a target="_blank" href="http://www.economist.com/economics" class="sub-menu-link">Economics</a><ul class="mh-subnav"><li class="first"><a target="_blank" href="http://www.economist.com/economics" title="" all_economics" -222">All Economics</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/economics/by-invitation" title="">Economics by invitation</a></li>
          <li><a target="_blank" href="http://www.economist.com/economics-a-to-z" title="">Economics A-Z</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/markets-data">Markets &amp; data</a></li>
          <li class="even last"><a target="_blank" href="http://www.economist.com/indicators">Indicators</a></li>
          </ul></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/science-technology" class="sub-menu-link">Science &amp; technology</a><ul class="mh-subnav"><li class="first"><a target="_blank" href="http://www.economist.com/science-technology" title="">All Science &amp; technology</a></li>
          <li class="even last"><a target="_blank" href="http://www.economist.com/technology-quarterly" title="Technology Quarterly">Technology Quarterly</a></li>
          </ul></li>
          <li class=""><a target="_blank" href="http://www.economist.com/culture" class="sub-menu-link">Culture</a><ul class="mh-subnav"><li class="first"><a target="_blank" href="http://www.economist.com/culture">All Culture</a></li>
          <li class="even"><a target="_blank" href="http://moreintelligentlife.com/">More Intelligent Life</a></li>
          <li><a target="_blank" href="http://www.economist.com/styleguide/introduction">Style guide</a></li>
          <li class="even last"><a target="_blank" href="http://www.economist.com/economist-quiz">The Economist Quiz</a></li>
          </ul></li>
          <li class=" mh-two-col even"><a target="_blank" href="http://www.economist.com/blogs" class="sub-menu-link">Blogs</a><ul class="mh-subnav">
          <li class="first"><a target="_blank" href="http://www.economist.com/blogs" title="">Latest updates</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/blogs/bagehot">Bagehot&#039;s notebook</a></li>
          <li><a target="_blank" href="http://www.economist.com/blogs/buttonwood" title="Financial markets">Buttonwood's notebook</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/blogs/democracyinamerica" title="American politics">Democracy in America</a></li>
          <li><a target="_blank" href="http://www.economist.com/blogs/erasmus" title="Erasmus">Erasmus</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/blogs/freeexchange" title="Economics">Free exchange</a></li>
          <li><a target="_blank" href="http://www.economist.com/blogs/gametheory" title="Sports">Game theory</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/blogs/graphicdetail" title="Charts, maps and infographics">Graphic detail</a></li>
          <li><a target="_blank" href="http://www.economist.com/blogs/gulliver" title="Business travel">Gulliver</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/blogs/prospero" title="Books, arts and culture">Prospero</a></li>
          <li class="last"><a target="_blank" href="http://www.economist.com/blogs/economist-explains">The Economist explains</a></li>
          </ul></li>
          <li class=""><a target="_blank" href="http://www.economist.com/debate" class="sub-menu-link">Debate</a><ul class="mh-subnav"><li class="first"><a target="_blank" href="http://www.economist.com/debate" title="">Economist debates</a></li>
          <li class="even last"><a target="_blank" href="http://www.economist.com/content/letters-to-the-editor" title="">Letters to the editor</a></li>
          </ul></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/multimedia" class="sub-menu-link">Multimedia</a><ul class="mh-subnav">
          <li class="first"><a target="_blank" href="http://www.economist.com/films">Economist Films</a></li>
          <li class="even"><a target="_blank" href="http://radio.economist.com/" title="">Economist Radio</a></li>
          <li><a target="_blank" href="http://www.economist.com/multimedia" title="">Multimedia</a></li>
          <li class="last"><a target="_blank" href="http://www.economist.com/audio-edition" title="">The Economist in audio</a></li>
          </ul></li>
          <li class="last"><a target="_blank" href="http://www.economist.com/printedition" title="" class="sub-menu-link">Print edition</a><ul class="mh-subnav"><li class="first"><a target="_blank" href="http://www.economist.com/printedition/">Current issue</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/printedition/covers">Previous issues</a></li>
          <li><a target="_blank" href="http://www.economist.com/printedition/specialreports">Special reports</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/content/politics-this-week">Politics this week</a></li>
          <li><a target="_blank" href="http://www.economist.com/content/business-this-week">Business this week</a></li>
          <li class="even"><a target="_blank" href="http://www.economist.com/printedition/leaders">Leaders</a></li>
          <li><a target="_blank" href="http://www.economist.com/printedition/kallery">KAL's cartoon</a></li>
          <li class="even last"><a target="_blank" href="http://www.economist.com/obituaries">Obituaries</a></li>
          </ul></li>
          </ul>                  </nav>
           </div>
        </div> <!-- /.mh-nav -->
      </header>