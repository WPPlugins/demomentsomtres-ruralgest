=== DeMomentSomTres RuralGest ===
Contributors: marcqueralt
Donate link: http://www.demomentsomtres.com
Tags: RuralGest, Tourism, Hotel
Requires at least: 4.0
Tested up to: 4.5
Stable tag: trunk
License: GPLv2

WordPress integration to RuralGest a Hotel Boooking Reservation Platform

== Description ==

This plugin integrates RuralGest Hotel Booking Reservation Platform into WordPress using two simple shortcodes. 

RuralGest is a pay per use platform and you need to get some information from them in order to perform this integration.

= History & Raison d'être =

We where performing a redesign from Mas Palou website and we were required to integrate it with RuralGest.

RuralGest passed us some ugly html that did the integration. We needed to put it in many places of the website. So we decided to build a plugin to manage it on a centralized mode.

We opted to make this component a little more generic to allow many other people to integrate their websites with RuralGest.

== Installation ==

1. Use plugin usual installation process.
2. Configure ShortCodes in the pages you require

== Frequently Asked Questions ==
= Shortcode dms3RuralGestSearch =

It requires the following parameters:

* id: CSS id provided by RuralGest. 
* id_idioma: to set the search language. You can choose one of the following numbers 1=English 2=Portugués 3=Français 4=Italiano 5=Deutsch 6=Català 7=Galego 8=Euskara. It is optional, defaults to 0.
* id_results: id of results div. It must be consistent with the id parameter for dms3RuralGestResults.
* hash: value of parameter TEws_Hash.
* puntoventa: value of parameter TEws_id_puntoventa.
* id_elemento: value iof parameter TEws_id_elemento.

= Shortcode dms3RuralGestResults =

It requires the following parameters:

* id: must be the same value than id_results in dms3RuralGestSearch 

== Screenshots ==
TBD

== Changelog ==

= 1.0 =
* Fidms3Rrst public version

= Upgrade Notice ==
TBD