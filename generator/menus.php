<?php

$htmlChunks = [
    '@@interaction-bloc@@' => 'interaction.html',
    '@@suggest-a-page@@' => 'suggest-button.html',
    '@@share-on-social-networks@@' => 'share-on-social-networks.html',
    '@@modal-dialogs@@' => 'modal-dialogs.html'
];

$xml_template = file_get_contents(__DIR__ . '/layout.template.xml');

$languages = glob(__DIR__ . '/i18n/*.json');

// finish with English
$languages[] = __DIR__ . '/i18n/en.json';

foreach ($languages as $langfile)
{
    $langcode = str_replace('.json', '', basename($langfile));

    $contactLink = 'https://neayi.com/contact/';

    if ($langcode == 'fr')
        $forumLink = 'https://forum.tripleperformance.fr';
    else
        $forumLink = 'https://forum.'.$langcode.'.tripleperformance.ag';

    $_ = json_decode(file_get_contents($langfile), true);

    $topMenus = array();
    $topMenus['productions'] = $_['productions'];
    $topMenus['thematiques'] = $_['themes'];

    $productions = array();
    $productions['/wiki/Grandes cultures'] = $_['field-crops'];
    $productions['/wiki/Élevage'] = $_['breeding'];
    $productions['/wiki/Viticulture'] = $_['viticulture']; // 'Viticulture';
    $productions['/wiki/Arboriculture'] = $_['arboriculture']; // 'Arboriculture';
    $productions['/wiki/Maraîchage'] = $_['market-gardening']; // 'Maraîchage';
    $productions['/wiki/PPAM'] = $_['hmp']; // 'PPAM';

    $subMenus = array();
    $subMenus['productions'] = array();

    foreach ($productions as $k => $v)
        $subMenus['productions'][$k] = $v;

    $subMenus['productions'][''] = '-';
    $subMenus['productions']['/wiki/Retours_d%27expérience'] = $_['search-for-feedbacks']; // 'Rechercher des retours d’expérience';

    $thematiques = array();
    $thematiques['/wiki/Agriculture de précision'] = $_['precision-agriculture']; // 'Agriculture de précision';
    $thematiques['/wiki/Agroforesterie'] = $_['agroforestry']; // 'Agroforesterie';
    $thematiques['/wiki/Bioagresseurs'] = $_['bioaggressors']; // 'Bioagresseurs';
    $thematiques['/wiki/Biodiversité'] = $_['biodiversity']; // 'Biodiversité';
    $thematiques['/wiki/Collaboration et coopération en agriculture'] = $_['collaboration-and-cooperation-in-agriculture']; // 'Collaboration et coopération en agriculture';
    $thematiques['/wiki/Couverts végétaux'] = $_['covers']; // 'Couverts végétaux';
    $thematiques['/wiki/Cycle du carbone et GES'] = $_['carbon-cycle-and-ghg']; // 'Cycle du carbone et GES';
    $thematiques['/wiki/Désherbage'] = $_['weeding']; // 'Désherbage';
    $thematiques['/wiki/Diagnostic et performance d\'une ferme'] = $_['diagnosis-and-performance']; // 'Diagnostic et performance';
    $thematiques['/wiki/Gestion de l’eau'] = $_['water-management']; // 'Gestion de l’eau';
    $thematiques['/wiki/Matériel et machines agricoles'] = $_['agricultural-equipment-and-machinery']; // 'Matériel et machines agricoles';
    $thematiques['/wiki/Organisation du travail'] = $_['work-organization']; // 'Organisation du travail';
    $thematiques['/wiki/Outils de mesure et d’observation'] = $_['measurement-and-observation-tools']; // 'Outils de mesure et d’observation';
    $thematiques['/wiki/Production énergétique'] = $_['energy-production']; // 'Production énergétique';
    $thematiques['/wiki/Protection intégrée des cultures'] = $_['integrated-crop-protection']; // 'Protection intégrée des cultures';
    $thematiques['/wiki/Résilience climatique'] = $_['climate-resilience']; // 'Résilience climatique';
    $thematiques['/wiki/S\'installer en agriculture'] = $_['settling-down']; // 'S’installer';
    $thematiques['/wiki/Agronomie des sols vivants'] = $_['living-soils']; // 'Sols vivants';
    $thematiques['/wiki/Valorisation de la production'] = $_['valuation-of-production']; // 'Valorisation de la production';

    $subMenus['thematiques'] = array();

    foreach ($thematiques as $k => $v)
        $subMenus['thematiques'][$k] = $v;

    $subMenus['thematiques'][''] = '-';
    $subMenus['thematiques']['/wiki/Search?filters=A+un+type+de+page%5E%5EPratique&order=desc&ordertype=Modification+date'] = $_['search-for-practices']; // 'Rechercher des pratiques';

    $footerMenus = array();
    $footerMenus[1]["Triple Performance"]['/wiki/%C3%80_propos'] = $_['about']; // "À propos";
    $footerMenus[1]["Triple Performance"]['/wiki/Partenaires'] = $_['partners']; // "Partenaires";
    $footerMenus[1]["Triple Performance"]['/wiki/Manifeste_de_la_plateforme_Triple_Performance'] = $_['why-triple-performance']; // "Pourquoi ?";
    $footerMenus[1]["Triple Performance"]['/wiki/Comment_fonctionne_la_plateforme'] = $_['how-does-it-works']; // "Comment ça fonctionne ?";
    $footerMenus[1]["Triple Performance"]['neayi-tour'] = $_['guided-tour']; // "Lancer la visite guidée";
    $footerMenus[1][$_['community']]['Special:Login'] = $_['create-an-account-or-sign-in']; // "Créer un compte ou se connecter";
    $footerMenus[1][$_['community']]['/wiki/Aide:Bienvenue'] = $_['to-contribute-start-here']; // "Contribuer&nbsp;? Ça commence ici&nbsp;!";
    $footerMenus[1][$_['community']]['forum'] = $_['access-the-forum']; // "Accéder au forum";

    foreach ($productions as $k => $v)
        $footerMenus[2][$_['productions']][$k] = $v;

    $thematiquesFirstCol = array_slice($thematiques, 0, ceil(count($thematiques) / 2), true);
    $thematiquesSecondCol = array_slice($thematiques, ceil(count($thematiques) / 2), count($thematiques), true);

    foreach ($thematiquesFirstCol as $k => $v)
        $footerMenus[3][$_['themes']][$k] = $v;

    foreach ($thematiquesSecondCol as $k => $v)
        $footerMenus[4][''][$k] = $v;

    $lastSection = $_['made-with-care']; // 'Fait avec ♡ par <a target="_blank" href="https://neayi.com/">Neayi</a>';
    $footerMenus[5][$lastSection]['/wiki/Charte_d%E2%80%99utilisation'] = $_['platform-charter']; // "Charte de la plateforme";
    $footerMenus[5][$lastSection]['/wiki/Triple_Performance:Politique_de_confidentialité'] = $_['legal-notice']; // "Mentions légales";
    $footerMenus[5][$lastSection]['/wiki/Open_Source'] = $_['open-source']; // "Open Source";
    $footerMenus[5][$lastSection]['contact'] = $_['contact']; // "Contact";
    $footerMenus[5][$lastSection]['socialLinks'] = "socialLinks";

    // Additional mobile menus
    $addMobileMenus = array();
    $addMobileMenus['/wiki/Productions'] = $_['productions']; // 'Productions';
    $addMobileMenus['/wiki/Thématiques'] = $_['themes']; // 'Thématiques';

    $socialLinks['fab fa-facebook-f'] = ['https://www.facebook.com/tripleperformance', $_['follow-us-on-facebook']];
    $socialLinks['fab fa-twitter'] = ['https://twitter.com/TriplePerforma1', $_['follow-us-on-twitter']];
    $socialLinks['fab fa-linkedin-in'] = ['https://www.linkedin.com/company/neayi', $_['follow-us-on-linkedin']];

    $localisedXML = $xml_template;
    foreach ($topMenus as $menuKey => $topMenuTitle)
    {
        // Prod Menus
        $strMenu = '';
        foreach ($subMenus[$menuKey] as $link => $title)
        {
            if ($title == '-')
                $strMenu .= '<div class="dropdown-divider"></div>' . PHP_EOL;
            else
                $strMenu .= '<a class="dropdown-item" href="'.$link.'" title="'.htmlspecialchars($title).'">'.$title.'</a>' . PHP_EOL;
        }

        $strMenu = <<<MENU
        <li class="nav-item dropdown neayi-desktop-nav">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_$menuKey" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">$topMenuTitle</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            $strMenu
		</div>
	</li>
MENU;

        $localisedXML = str_replace('@@'.$menuKey.'@@', $strMenu, $localisedXML);
    }

    $strMenu = '';
    foreach ($addMobileMenus as $link => $title)
        $strMenu .= '<li class="nav-item neayi-additional-mobile-menus"><a class="nav-link" href="'.$link.'" title="'.htmlspecialchars($title).'">'.$title.'</a></li>' . PHP_EOL;

    $strMenu .= '<li class="nav-item" id="forum-nav"><a class="nav-link" href="'.$forumLink.'" title="Forum">Forum</a></li>' . PHP_EOL;
    $strMenu .= '<li class="nav-item neayi-additional-mobile-menus"><a class="nav-link" href="'.$forumLink.'" title="Forum">Forum</a></li>' . PHP_EOL;

    $localisedXML = str_replace('@@additionalMenus@@', $strMenu, $localisedXML);

    $strFooterMenu = '';
    foreach ($footerMenus as $colNumber => $menus)
    {
        if (empty($strFooterMenu))
            $strFooterMenu .= '<div class="col-xl-2 col-lg-6 offset-xl-1">' . PHP_EOL;
        else
            $strFooterMenu .= '<div class="col-xl-2 col-lg-6">' . PHP_EOL;

        foreach ($menus as $section => $submenus)
        {
            if (empty($section))
                $strFooterMenu .= '<p class="footer-title d-none d-md-block">&nbsp;</p>' . PHP_EOL;
            else
                $strFooterMenu .= '<p class="footer-title">'.$section.'</p>' . PHP_EOL;

            $strFooterMenu .= '<ul class="list-unstyled">' . PHP_EOL;

            foreach ($submenus as $link => $title)
            {
                switch ($link) {
                    case 'Special:Login':
                        $strFooterMenu .= '<li><a rel="nofollow" class="login-links" href="/wiki/Special:Login">'.$title.'</a></li>' . PHP_EOL;
                        break;

                    case 'forum':
                        $strFooterMenu .= '<li><a href="'.$forumLink.'">'.$title.'</a></li>' . PHP_EOL;
                        break;

                    case 'socialLinks':
                        $strFooterMenu .= '<li><span class="social-links">' . PHP_EOL;
                        foreach ($socialLinks as $fontawesomecode => $sociallink)
                            $strFooterMenu .= '<a href="'.$sociallink[0].'" target="_blank" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="'.htmlspecialchars($sociallink[1]).'"><span class="'.$fontawesomecode.'"></span></a>' . PHP_EOL;
                        $strFooterMenu .= '</span></li>' . PHP_EOL;
                        break;

                    case 'contact':
                        $strFooterMenu .= '<li><a target="_blank" href="'.$contactLink.'">'.$title.'</a></li>' . PHP_EOL;
                        break;

                    case 'neayi-tour':
                        $strFooterMenu .= '<li><a href="#" class="neayi-tour">'.$title.'</a> <i class="fas fa-route"></i></li>' . PHP_EOL;
                        break;

                    default:
                        $strFooterMenu .= '<li><a href="'.$link.'" title="'.htmlspecialchars($title).'">'.$title.'</a></li>' . PHP_EOL;
                        break;
                }
            }

            $strFooterMenu .= '</ul>' . PHP_EOL;
        }

        $strFooterMenu .= '</div>' . PHP_EOL;
    }

    $localisedXML = str_replace('@@footer@@', $strFooterMenu, $localisedXML);

    // Translate some other stuff:
    $localisedXML = str_replace('placeholder="Rechercher"', 'placeholder="'.$_['search-placeholder'].'"', $localisedXML);

    $connectLink = '<a rel="nofollow" class="neayi-username my-auto mx-auto stretched-link" href="/wiki/Special:Login">';
    $connectLink .= str_replace('<br', '</a><br', $_['create-or-connect']);
    $localisedXML = str_replace('@@Connect-link@@', $connectLink, $localisedXML);

    foreach ($htmlChunks as $key => $filename)
        $localisedXML = str_replace($key, getTranslatedHTMLChunk(__DIR__ . '/html_chunks/' .  $filename, $_), $localisedXML);

    file_put_contents(__DIR__ . '/../layout.' . $langcode . '.xml', $localisedXML);
}

buildPagesToTranslate($footerMenus);

function getTranslatedHTMLChunk($htmlFilename, $translations)
{
    $html = file_get_contents($htmlFilename);

    unset($translations['@metadata']);

    foreach ($translations as $k => $v)
        $html = str_replace('@@'.$k.'@@', $v, $html);

    return $html;
}

function buildPagesToTranslate($menus)
{
    echo "Use this to input import_languages/auto_translate_from_fr.php\n\n";
    echo "\$homePages = array[\n";
    foreach ($menus as $subCols)
        foreach ($subCols as $colItems)
            foreach ($colItems as $link => $text)
            {
                if (strpos($link, 'wiki/') !== false)
                    echo '"' . str_replace('_', ' ', rawurldecode(str_replace('/wiki/', '', $link))) . '" => "'.$text.'",' . "\n";
            }

    echo "]\n";
}