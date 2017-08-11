<?php
	/**
   * Plugin Name: DeMomentSomTres RuralGest
   * Plugin URI: http://demomentsomtres.com/en/demomentsomtres-ruralgest/
   * Description: RuralGest Reservation Software integration for WordPress.
   * Author: Marc Queralt
   * Author URI: http://demomentsomtres.com/
   * Version: 1.0
   * Basat en dms3plugin-20151215
	 * Text Domain: demomentsomtres-ruralgest
	 * Domain Path: /languages
   **/

    $demomentsomtres_ruralgest = new DeMomentSomTresRuralGest;

    class DeMomentSomTresRuralGest {
			
			const VERSION="1.0";

			private $pluginURL;
			private $pluginPath;
			private $langDir;
			private $printScripts=false;

			function __construct() {
					$this -> pluginURL = plugin_dir_url(__FILE__);
					$this -> pluginPath = plugin_dir_path(__FILE__);
					$this -> langDir = dirname(plugin_basename(__FILE__)) . '/languages';

					add_action('plugins_loaded', array(
							$this,
							'plugin_loaded'
					));
					add_action("wp_enqueue_scripts",array($this,"enqueue_scripts"));
					add_action("wp_footer",array($this,"wp_footer"));
					add_shortcode("dms3RuralGestSearch",array($this,"searchShortCode"));
					add_shortcode("dms3RuralGestResults",array($this,"resultsShortCode"));
			}

			function plugin_loaded() {
					load_plugin_textdomain("demomentsomtres-ruralgest", false, $this -> langDir);
			}
      function searchShortCode($atts) {
				extract(shortcode_atts(array(
					"id"=>"",
					"id_idioma" => 0,
					"id_results" => "",
					"hash"=>"",
					"puntoventa"=>"",
					"id_elemento"=>"",
				),$atts));
				$this->printScripts=true;
				$output='<!-- Capa Buscador - MrPlan  - Powered by RuralGest  --><div id="'.$id.'" class="TEwsWidgetInc capa_izq ancho_total" BudgetV="1" mini_preview_V="0" url_confirmacion="" TEws_Hash="'.$hash.'" TEws_onSearch="" TEws_version="6" TEws_tipo_widget="2" BV7_tipo_inicio="0" BV7_cambio_inicio="0" TEws_quitar_cabecera="0" TEws_iniciar_cerrado="0" TEws_bus_texto="0" TEws_sel_dispo="0" TEws_form_contacto="0"  TEws_result_in_esl="1" TEws_result_in_ext="0" TEws_cerrar_buscar="1" TEws_ver_resto_casas="0" TEws_id_elemento="'.$id_elemento.'" TEws_tipo_elemento="1" TEws_activar_mas_menos="1" TEws_posicion="original" TEws_formato="2" TEws_formato_ficha="11" TEws_CoreSearch_V="7"  TEws_id_categoria="0" TEws_modo="RES"  TEws_fecha_ini="" TEws_n_noches="2" TEws_n_adultos="2" TEws_n_ninos="0" TEws_radio="0" TEsw_filtro_exp="" TEws_filtro_casa="" TEws_autoload="0" TEws_id_destino="1" TEws_id_puntoventa="'.$puntoventa.'" TEws_id_idioma="'.$id_idioma.'" TEwsResultadoCoreSearch="'.$id_results.'" alt="MisterPlan  - Powered by RuralGest  - http://www.misterplan.es" title_NO="MisterPlan  - Powered by RuralGest "></div>';
				return $output;
			}
			function resultsShortCode($atts) {
				extract(shortcode_atts(array(
					"id"=>"",
				),$atts));
				$this->printScripts=true;
				$output='<!-- Resultado para el CoreSearch de Experiencias / Casas - MisterPlan  - Powered by RuralGest  --><div id="'.$id.'" class="capa_izq TEwsBuscador_Experiencias_evnt" style="width: 100%; margin-top: 20px;" alt_NO="MisterPlan  - Powered by RuralGest  - http://www.misterplan.es" title_NO="MisterPlan  - Powered by RuralGest "></div>';
				$output.="<!-- Integración realizada mediante un componente desarrollado por http://www.demomentsomtres.com -->";
				return $output;
			}
      function enqueue_scripts() {
				wp_register_script("ruralgest-twidget","http://www.mrplan.es/experiencias/modulos/TWidget/lib/TWidgetInc.js","jquery",self::VERSION,true);
				wp_register_script("ruralgest-gmaps","https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=","jquery",self::VERSION,true);
				wp_register_script("ruralgest-jsapi","http://www.mrplan.es/experiencias/lib/google/jsapi.js","jquery",self::VERSION,true);
				wp_register_script("ruralgest-gload",$this->pluginURL."js/gload.js",array("ruralgest-jsapi"),self::VERSION,true);
			}

			function wp_footer() {
				 if($this->printScripts):
					 wp_enqueue_script("ruralgest-twidget");
					 wp_enqueue_script("ruralgest-gmaps");
					 wp_enqueue_script("ruralgest-jsapi");
					 wp_enqueue_script("ruralgest-gload");
				 endif;
			}
    }
?>