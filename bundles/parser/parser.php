<?php

namespace Parser;

include("classes/RollingCurl.class.php");
include("classes/AngryCurl.class.php");

class Parser
{    
    protected $_patterns = array(
        'avito_item' => '/\<a name="(\d+)" href="\/moskva\/kvartiry\/(.*)" title="(.*)"\>/'
    );
    
    
    protected $_parser = NULL;
    
    protected $_task = NULL;
    
    
    public function __construct()
    {
        $this->_parser = new \AngryCurl(array('Parser', 'proxy_check_ready'));
    }
    
    public static function proxy_check_ready($response, $info, $request)
    {
        
        $_proxy_list = \ParserProxy::where('proxy', '=', $request->options['10004'])->get();
        
        if ($_proxy_list) {
            foreach ($_proxy_list AS $_proxy) {
                $_proxy->status = (int) $info['http_code'];
                $_proxy->save();
            }
        }
    }
    
    /**
    * Проверяет список прокси серверов
    * 
    */
    public function check_proxy_list()
    {
        $proxy_list = \ParserProxy::where('status', '!=', 200)->get();
        
        $this->_parser->init_console();
        
        if ($proxy_list) {
            $this->_set_long_script();
            
            $_list = array();
            
            foreach ($proxy_list AS $proxy) {
                $_list[$proxy->id] = trim($proxy->proxy);
            }
            
            $this->_parser->load_proxy_list($_list);
            
            $this->_parser->filter_alive_proxy();
        }
    }
    
    public function foobar()
    {
        return;
        
        $handler = fopen(dirname(__FILE__) . '/source/proxy_list.txt', 'r');
        
        while( !feof($handler) ) {
            $cont = fgets($handler, 1024);
            
            $proxy_list = new \ParserProxy;
            
            $proxy_list->proxy = $cont;
            
            $proxy_list->save();
        }
        
        fclose($handler);
    }
    
    
    /**
    * Парсинг
    * 
    */
    public function parse()
    {        
        $this->_parser->init_console();
        
        $this->_parser->load_proxy_list(dirname(__FILE__) . '/source/proxy_list.txt');
        
        $this->_parser->load_useragent_list(dirname(__FILE__) . '/source/useragent_list.txt');
        
        //$this->_parser->execute(50);
    }
    
    
    /**
    * Возвращает контент запрашиваемой страницы
    * 
    * @param mixed $uri
    */
    protected function _get_content($uri)
    {
        return 'content';
    }
    
    
    /**
    * Разбирает URI и возвращает список целевых URL
    * 
    * @param mixed $uri
    */
    protected function _prepend_uris($uri)
    {
        $output = array();
        
        //$uri = 'http://www.avito.ru/moskva/kvartiry?p={{3,4,2-10,34,5-7}}&user=1&params';
        
        if (strpos($uri, '{{')) {
            
            preg_match_all('/\{\{([0-9\-\,]+)\}\}/', $uri, $matches);
            
            $matches = $matches[1];
            
            if (count($matches) > 0) {
                foreach ($matches AS $matche) {
                    $matche = trim($matche);
                    $blocks = explode(',', $matche);
                    
                    foreach ($blocks AS $block) {
                        $intervals = explode('-', trim($block));
                        
                        if (count($intervals) == 1) {
                            $output[] = str_replace('{{' . $matche . '}}', $intervals[0], $uri);
                        } elseif (count($intervals) == 2) {
                            for ($iter = $intervals[0]; $iter <= $intervals[1]; $iter++) {
                                $output[] = str_replace('{{' . $matche . '}}', $iter, $uri);
                            }
                        } else {
                            //
                        }
                    }
                }
            }
            
        } else {
            $output = array($uri);
        }
        
        return $output;
    }
    
    
    /**
    * Возвращает список запланированных задач
    * 
    */
    protected function _tasks()
    {
        return \ParserTask::all();
    }
    
    
    /**
    * Настраивает PHP на долгую и тяжелую работу
    * 
    */
    protected function _set_long_script()
    {
        ini_set('max_execution_time',0);
        ini_set('memory_limit', '128M');
    }
    
    
    // =============== HANDLERS ===============
    
    protected function handler_avito_item($data)
    {
        //
    }
}
