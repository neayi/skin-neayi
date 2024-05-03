<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <a class="navbar-brand" href="{{$wikiUrl}}/"><img src="{{$wikiUrl}}/skins/skin-neayi/favicon/logo-triple-performance.svg" alt="Wiki Triple Performance"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown neayi-desktop-nav">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_productions" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produktionen</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{$wikiUrl}}/wiki/Grandes cultures" title="Feldfrüchte">Feldfrüchte</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Élevage" title="Zucht">Zucht</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Viticulture" title="Weinbau">Weinbau</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Arboriculture" title="Baumzucht">Baumzucht</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Maraîchage" title="gärtnern">gärtnern</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/PPAM" title="HMP">HMP</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Retours_d%27expérience" title="Nach Feedback suchen">Nach Feedback suchen</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Portraits_de_ferme" title="Nach Bauernhofporträts suchen">Nach Bauernhofporträts suchen</a>

		</div>
	</li>

                    <li class="nav-item dropdown neayi-desktop-nav">
		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_thematiques" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Themen</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{$wikiUrl}}/wiki/Agriculture de précision" title="Präzisionslandwirtschaft">Präzisionslandwirtschaft</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Agroforesterie" title="Agroforstwirtschaft">Agroforstwirtschaft</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Bioagresseurs" title="Bioaggressoren">Bioaggressoren</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Biodiversité" title="Biodiversität">Biodiversität</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Collaboration et coopération en agriculture" title="Zusammenarbeit und Zusammenarbeit in der Landwirtschaft">Zusammenarbeit und Zusammenarbeit in der Landwirtschaft</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Couverts végétaux" title="Pflanzenabdeckung">Pflanzenabdeckung</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Cycle du carbone et GES" title="Kohlenstoffkreislauf und Treibhausgase">Kohlenstoffkreislauf und Treibhausgase</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Désherbage" title="Jäten">Jäten</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Diagnostic et performance d'une ferme" title="Diagnose und Leistung">Diagnose und Leistung</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Gestion de l’eau" title="Wasserwirtschaft">Wasserwirtschaft</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Matériel et machines agricoles" title="Landwirtschaftliche-geräte-und-maschinen">Landwirtschaftliche-geräte-und-maschinen</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Outils de mesure et d’observation" title="Measurement and Observation Tools">Measurement and Observation Tools</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Production énergétique" title="Energieerzeugung">Energieerzeugung</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Protection intégrée des cultures" title="Integrierter Pflanzenschutz">Integrierter Pflanzenschutz</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Résilience climatique" title="Klimaresilienz">Klimaresilienz</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/S'installer en agriculture" title="Sich niederlassen">Sich niederlassen</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Transmettre sa ferme" title="Verkauf des Hofes">Verkauf des Hofes</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Agronomie des sols vivants" title="Lebende Böden">Lebende Böden</a>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Valorisation de la production" title="Bewertung der Produktion">Bewertung der Produktion</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="{{$wikiUrl}}/wiki/Search" title="Suche">Suche</a>

		</div>
	</li>

            <li class="nav-item neayi-additional-mobile-menus"><a class="nav-link" href="{{$wikiUrl}}/wiki/Productions" title="Produktionen">Produktionen</a></li>
<li class="nav-item neayi-additional-mobile-menus"><a class="nav-link" href="{{$wikiUrl}}/wiki/Thématiques" title="Themen">Themen</a></li>
<li class="nav-item"><a class="nav-link" href="https://forum.de.tripleperformance.ag" title=""></a></li>
<li class="nav-item"><a class="nav-link" href="{{$wikiUrl}}/wiki/Training courses" title="Training courses">Training courses</a></li>
<li class="nav-item neayi-additional-mobile-menus"><a class="nav-link" onclick="window.scrollTo(0, 0); $('#searchInput').focus(); return true" data-toggle="collapse" href=".navbar-collapse" title="Suche">Suche</a></li>

        </ul>
        @if(\Illuminate\Support\Facades\Auth::user() !== null)
            <div class="create-profile">
                <div class="row align-items-center" style="height: 100%; margin: 0">
                    <div class="col-auto"><img class="neayi-avatar" src="{{\Illuminate\Support\Facades\Auth::user()->adminlte_image()}}"></div>
                    <div class="col">
                        <div class="navbar-tool dropdown position-static show" id="neayi-navbar-menu">
                            <a href="#" class="neayi-username dropdown-toggle" data-toggle="dropdown" data-boundary="viewport">{{\Illuminate\Support\Facades\Auth::user()->fullname()}}</a>
                            <div class="p-personal-tools dropdown-menu">
                                <div id="pt-userpage"><a href="/profile" dir="auto" title="Votre page d’utilisateur [alt-shift-.]" accesskey=".">{{\Illuminate\Support\Facades\Auth::user()->fullname()}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</nav>
