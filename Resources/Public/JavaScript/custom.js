/**
 * TYPO3 Extension "AWS Getting Started"
 *
 * Author: Michael Schams <schams.net>
 * https://typo3-on-aws.org
 */

$('#navbar a').click(function(e) { e.preventDefault(); $('.navbar-collapse').collapse('hide'); $(this).tab('show'); });
$('div.content a.show-tab').click(function(e) { e.preventDefault(); $('a[href="' + $(this).attr('href') + '"]').tab('show'); });
$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) { if($(e.target).attr('aria-controls') == 'backend-login') { $('nav div#navbar ul > li').removeClass('active'); } });
