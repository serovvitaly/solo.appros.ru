<?php

namespace Parser;

class Parser
{    
    protected $_patterns = array(
        'avito_item' => '/\<a name="(\d+)" href="\/moskva\/kvartiry\/(.*)" title="(.*)"\>/'
    );
    
    
    protected $_task = NULL;
    
    
    public function __construct()
    {
        //
    }
    
    
    /**
    * Парсинг
    * 
    */
    public function parse()
    {  
        /*$ts = new \ParserTask;
        $ts->uri = 'http://www.avito.ru/moskva/kvartiry?p={{2-10}}&user=1&params=201_1059';
        $ts->patterns = 'avito_item';
        $ts->save();
        return;*/
        $tasks = $this->_tasks();
        
        foreach ($tasks AS $task) {
            
            $uris = $this->_prepend_uris($task->uri);
            
            $patterns = explode(',', $task->patterns);
            
            if (count($uris) > 0 AND count($patterns) > 0) {
                foreach ($uris AS $uri) {
                    
                    $_task = \ParserTask::where('uri', '=', $uri)->first();
                    
                    if (!$_task) {
                        $_task = new \ParserTask; 
                    }
                    
                    $_task->uri      = $uri;
                    $_task->patterns = 'avito_item';
                    $_task->is_temp  = true;
                    
                    $_task->save();
                
                    $_average_time = 0;
                    
                    $count = 1;
                    
                    $_start_time = time();
                                    
                    $content = $this->_get_content( trim($uri) );
                    
                    foreach ($patterns AS $pattern) {
                        
                        $_handler = 'handler_' . $pattern;
                        
                        if (isset($this->_patterns[$pattern]) AND !empty($content) AND method_exists($this, $_handler)) {
                            preg_match_all($this->_patterns[$pattern], $content, $result);
                            
                            if ($this->$_handler($result) === true) {
                                $_task->delete();
                            }
                        }
                        
                    }
                    
                    $_stop_time = time();
                    
                    if ($_stop_time - $_start_time > $_average_time + 3) {
                        return;
                    }
                }
            }
            
        }
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
    
    
    // =============== HANDLERS ===============
    
    protected function handler_avito_item($data)
    {
        //
    }
}
