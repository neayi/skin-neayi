<?php

$topMenus = array();
$topMenus['productions'] = "Productions";
$topMenus['thematiques'] = "Thématiques";

$productions = array();
$productions['/wiki/Grandes cultures'] = 'Grandes cultures';
$productions['/wiki/Élevage'] = 'Élevage';
$productions['/wiki/Viticulture'] = 'Viticulture';
$productions['/wiki/Arboriculture'] = 'Arboriculture';
$productions['/wiki/Maraîchage'] = 'Maraîchage';
$productions['/wiki/PPAM'] = 'PPAM';

$subMenus = array();
$subMenus['productions'] = array();

foreach ($productions as $k => $v)
    $subMenus['productions'][$k] = $v;

$subMenus['productions'][''] = '-';
$subMenus['productions']['/wiki/Search?Search?filters=A+un+type+de+page%5E%5EExemple+de+mise+en+œuvre&order=desc&ordertype=Modification+date'] = 'Rechercher des retours d’expérience';

$thematiques = array();
$thematiques['/wiki/Agriculture de précision'] = 'Agriculture de précision';
$thematiques['/wiki/Agroforesterie'] = 'Agroforesterie';
$thematiques['/wiki/Bioagresseurs'] = 'Bioagresseurs';
$thematiques['/wiki/Biodiversité'] = 'Biodiversité';
$thematiques['/wiki/Collaboration et coopération en agriculture'] = 'Collaboration et coopération en agriculture';
$thematiques['/wiki/Couverts végétaux'] = 'Couverts végétaux';
$thematiques['/wiki/Cycle du carbone et GES'] = 'Cycle du carbone et GES';
$thematiques['/wiki/Désherbage'] = 'Désherbage';
$thematiques['/wiki/Diagnostic et performance d\'une ferme'] = 'Diagnostic et performance';
$thematiques['/wiki/Gestion de l’eau'] = 'Gestion de l’eau';
$thematiques['/wiki/Matériel et machines agricoles'] = 'Matériel et machines agricoles';
$thematiques['/wiki/Organisation du travail'] = 'Organisation du travail';
$thematiques['/wiki/Outils de mesure et d’observation'] = 'Outils de mesure et d’observation';
$thematiques['/wiki/Production énergétique'] = 'Production énergétique';
$thematiques['/wiki/Protection intégrée des cultures'] = 'Protection intégrée des cultures';
$thematiques['/wiki/Résilience climatique'] = 'Résilience climatique';
$thematiques['/wiki/S\'installer en agriculture'] = 'S’installer';
$thematiques['/wiki/Agronomie des sols vivants'] = 'Sols vivants';
$thematiques['/wiki/Valorisation de la production'] = 'Valorisation de la production';


$subMenus['thematiques'] = array();

foreach ($thematiques as $k => $v)
    $subMenus['thematiques'][$k] = $v;

$subMenus['thematiques'][''] = '-';
$subMenus['thematiques']['/wiki/Search?filters=A+un+type+de+page%5E%5EPratique&order=desc&ordertype=Modification+date'] = 'Rechercher des pratiques';


$footerMenus = array();
$footerMenus[1]["Triple Performance"]['/wiki/%C3%80_propos'] = "À propos";
$footerMenus[1]["Triple Performance"]['/wiki/Partenaires'] = "Partenaires";
$footerMenus[1]["Triple Performance"]['/wiki/Manifeste_de_la_plateforme_Triple_Performance'] = "Pourquoi ?";
$footerMenus[1]["Triple Performance"]['/wiki/Comment_fonctionne_la_plateforme'] = "Comment ça fonctionne ?";
$footerMenus[1]["Triple Performance"]['neayi-tour'] = "Lancer la visite guidée";
$footerMenus[1]["Communauté"]['Special:Login'] = "Créer un compte ou se connecter";
$footerMenus[1]["Communauté"]['/wiki/Aide:Bienvenue'] = "Contribuer&nbsp;? Ça commence ici&nbsp;!";
$footerMenus[1]["Communauté"]['forum'] = "Accéder au forum";

foreach ($productions as $k => $v)
    $footerMenus[2]["Productions"][$k] = $v;

$thematiquesFirstCol = array_slice($thematiques, 0, ceil(count($thematiques) / 2), true);
$thematiquesSecondCol = array_slice($thematiques, ceil(count($thematiques) / 2), count($thematiques), true);

foreach ($thematiquesFirstCol as $k => $v)
    $footerMenus[3]["Thématiques"][$k] = $v;

foreach ($thematiquesSecondCol as $k => $v)
    $footerMenus[4][''][$k] = $v;

$lastSection = 'Fait avec ♡ par <a target="_blank" href="https://neayi.com/">Neayi</a>';
$footerMenus[5][$lastSection]['/wiki/Charte_d%E2%80%99utilisation'] = "Charte de la plateforme";
$footerMenus[5][$lastSection]['/wiki/Triple_Performance:Politique_de_confidentialité'] = "Mentions légales";
$footerMenus[5][$lastSection]['/wiki/Open_Source'] = "Open Source";
$footerMenus[5][$lastSection]['contact'] = "Contact";
$footerMenus[5][$lastSection]['socialLinks'] = "socialLinks";

// Additional mobile menus
$addMobileMenus = array();
$addMobileMenus['/wiki/Productions'] = 'Productions';
$addMobileMenus['/wiki/Thématiques'] = 'Thématiques';

$socialLinks['fab fa-facebook-f'] = ['https://www.facebook.com/tripleperformance', "Suivez nous sur Facebook"];
$socialLinks['fab fa-twitter'] = ['https://twitter.com/TriplePerforma1', "Suivez nous sur Twitter"];
$socialLinks['fab fa-linkedin-in'] = ['https://www.linkedin.com/company/neayi', "Suivez nous sur LinkedIn"];

$languages = array( 'fr' => 'Français',
                    'en' => 'English',
                    'de' => 'Deutsch',
                    'pl' => 'Polski',
                    'nl' => 'Nederlands',
                    'it' => 'Italiano',
                    'es' => 'Español');

$xml_template = file_get_contents(__DIR__ . '/layout.template.xml');
foreach ($languages as $langcode => $langname)
{
    $contactLink = 'https://neayi.com/contact/';
    $forumLink = 'https://forum.'.$langcode.'.tripleperformance.ag';

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
                        $strFooterMenu .= '<li><a rel="nofollow" class="login-links" href="/index.php?title=Special:Login">'.$title.'</a></li>' . PHP_EOL;
                        break;

                    case 'forum':
                        $strFooterMenu .= '<li><a href="'.$forumLink.'">'.$title.'</a></li>' . PHP_EOL;
                        break;

                    case 'socialLinks':
                        $strFooterMenu .= '<li><span class="social-links">' . PHP_EOL;
                        foreach ($socialLinks as $fontawesomecode => $sociallink)
                            $strFooterMenu .= '<a href="'.$sociallink[0].'" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="'.htmlspecialchars($sociallink[1]).'"><span class="'.$fontawesomecode.'"></span></a>' . PHP_EOL;
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

    file_put_contents(__DIR__ . '/../layout.' . $langcode . '.xml', $localisedXML);
}