# Warzone – Master-Grid-System & Komponenten

Wiederverwendbare Tactical-Bausteine für **Inhalte** (Artikel, Seiten, Boxen).
Alle Klassen funktionieren überall im Theme (auch innerhalb des Content-Bereichs).
Einfach das passende HTML in einen Artikel/eine Seite einfügen (HTML-Quellcode-Modus).

> Tipp: Die Spaltenzahl ist responsiv – `--3`/`--4` klappen auf Tablets auf 2,
> auf Smartphones auf 1 Spalte zusammen. `.wz-tiles` ohne Modifier füllt
> automatisch je nach Breite (auto-fit).

---

## 1. Grid-Container

```html
<!-- Automatisch (füllt je nach Breite) -->
<div class="wz-tiles"> … Kacheln … </div>

<!-- Feste Spaltenzahl -->
<div class="wz-tiles wz-tiles--2"> … </div>
<div class="wz-tiles wz-tiles--3"> … </div>
<div class="wz-tiles wz-tiles--4"> … </div>

<!-- Abstand: --tight (eng) / --wide (weit) -->
<div class="wz-tiles wz-tiles--3 wz-tiles--wide"> … </div>
```

Optionale Abschnittsüberschrift:

```html
<h2 class="wz-section-title">Unsere Squads</h2>
```

---

## 2. Tactical Tile / Card

```html
<div class="wz-tiles wz-tiles--3">
    <div class="wz-tile">
        <span class="wz-tile__icon">⌖</span>
        <h3 class="wz-tile__title">Competitive</h3>
        <p class="wz-tile__text">5v5 Ranked-Training jeden Dienstag und Donnerstag.</p>
        <a class="wz-tile__link" href="#">Mehr erfahren</a>
    </div>
    <div class="wz-tile">
        <span class="wz-tile__icon">⚔</span>
        <h3 class="wz-tile__title">Scrims</h3>
        <p class="wz-tile__text">Wöchentliche Übungsmatches gegen andere Clans.</p>
        <a class="wz-tile__link" href="#">Zum Kalender</a>
    </div>
    <div class="wz-tile">
        <span class="wz-tile__icon">🎯</span>
        <h3 class="wz-tile__title">Akademie</h3>
        <p class="wz-tile__text">Coaching und VOD-Reviews für Neuzugänge.</p>
        <a class="wz-tile__link" href="#">Bewerben</a>
    </div>
</div>
```

Als Icon eignen sich Emojis, ein `<i>`-Font-Awesome-Symbol oder ein kurzes Zeichen.

---

## 3. Stat- / Counter-Block

```html
<div class="wz-tiles wz-tiles--4 wz-tiles--tight">
    <div class="wz-stat"><span class="wz-stat__num">128</span><span class="wz-stat__label">Mitglieder</span></div>
    <div class="wz-stat wz-stat--green"><span class="wz-stat__num">342</span><span class="wz-stat__label">Siege</span></div>
    <div class="wz-stat wz-stat--info"><span class="wz-stat__num">17</span><span class="wz-stat__label">Teams</span></div>
    <div class="wz-stat wz-stat--danger"><span class="wz-stat__num">2.4</span><span class="wz-stat__label">K/D Ratio</span></div>
</div>
```

Farb-Varianten: Standard (Akzent), `--green`, `--info`, `--danger`.

---

## 4. Feature- / CTA-Banner

```html
<div class="wz-cta">
    <div class="wz-cta__body">
        <h3 class="wz-cta__title">Bereit für den Einsatz?</h3>
        <p class="wz-cta__text">Bewirb dich jetzt und werde Teil der Einheit.</p>
    </div>
    <a class="wz-btn" href="#">Jetzt bewerben</a>
</div>
```

Button-Varianten: `wz-btn` (gefüllt) oder `wz-btn wz-btn--ghost` (Umriss).

---

## 5. Team- / Roster-Grid

```html
<div class="wz-tiles wz-tiles--4">
    <div class="wz-member">
        <img class="wz-member__avatar" src="/path/avatar1.jpg" alt="Ghost">
        <h3 class="wz-member__name">Ghost</h3>
        <span class="wz-member__role">Entry Fragger</span>
        <span class="wz-member__rank">Captain</span>
    </div>
    <div class="wz-member">
        <img class="wz-member__avatar" src="/path/avatar2.jpg" alt="Viper">
        <h3 class="wz-member__name">Viper</h3>
        <span class="wz-member__role">AWP</span>
        <span class="wz-member__rank">Member</span>
    </div>
    <!-- … weitere Mitglieder … -->
</div>
```

Die Avatare werden als Hexagon zugeschnitten (quadratische Bilder verwenden,
empfohlen ≥ 176×176 px).

---

## Klassenübersicht

| Klasse | Zweck |
|---|---|
| `wz-tiles`, `--2/3/4`, `--tight/--wide` | Grid-Container |
| `wz-section-title` | Abschnittsüberschrift mit HUD-Raute |
| `wz-tile` + `__icon/__title/__text/__link` | Feature-Kachel |
| `wz-stat` (`--green/--info/--danger`) + `__num/__label` | Statistik-/Counter-Block |
| `wz-cta` + `__body/__title/__text` | CTA-/Feature-Banner |
| `wz-member` + `__avatar/__name/__role/__rank` | Spieler-/Roster-Karte |
| `wz-btn` (`--ghost`) | Button |
