jQuery(function ($) {

   // AJAX загрузка страниц/записей WP 
   $('.btn-loadmore').on('click', function () {
      let _this = $(this);
      _this.html('<span class="fas fa-redo fa-spin"></span> Загрузка...'); // изменение кнопки 

      let data = {
         'action': 'loadmore',
         'query': _this.attr('data-param-posts'),
         'page': this_page,
         'tpl': _this.attr('data-tpl')
      }

      $.ajax({
         url: '/wp-admin/admin-ajax.php',
         data: data,
         type: 'POST',
         success: function (data) {
            if (data) {
               _this.html('<span class="fas fa-redo"></span> Загрузить ещё');
               _this.prev().prev().append(data); // где вставить данные 
               this_page++;                      // увелич. номер страницы +1 
               if (this_page == _this.attr('data-max-pages')) {
                  _this.remove();               // удаляем кнопку, если последняя стр. 
               }
            } else {                              // если закончились посты 
               _this.remove();                   // удаляем кнопку 
            }
         }
      });
   });

});