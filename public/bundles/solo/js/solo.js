(function( $ ) {
  $.fn.solo = function() {
      //
  };
  
  /**
  * Базовый объект Solo
  * 
  * @type Object
  */
  solo = {
      
      /**
      * Выполняет запрос на сервер
      * 
      * @param method
      * @param options
      * 
      * @returns {Boolean}
      */
      api: function(method, data, options){
          
          if (!method) return false;
          
          var cfg = $.extend({
              controller: 'ajax',
              type: 'POST', // "POST" or "GET"
              timeout: 10,
              dataType: 'json' // xml, json, script, html
          }, options);
          
          if ( data && (typeof(data) == 'array' || typeof(data) == 'object') ) {
              cfg.data = data;
          }
          
          cfg.url = '/' + cfg.controller + '/' + method;
          
          $.ajax(cfg);
      },
      
      validate: {
          collention: function(selector, fields, attr){
              
              if (!attr) attr = 'name';
              
              $(selector).each(function(index, item){
                  //
              });
          }
      }
  }
  
})(jQuery);