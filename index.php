<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Sortable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script>
  $(function() {
    var site=[];
    //var arr=[];
    $("#sortable").sortable({
        items: "li:not(.ui-state-disabled)",
        stop: function() {
            $("#sortable li").each(function(){
                site.push($(this).attr("data"));
                /*arr.push($(this).attr("data"));
                arr.push($(this).attr("name"));
                site[$(this).attr("data")] = arr;*/
            });
            $.ajax({
                method: "POST",
                url: "create.php",
                data: {'arr[]': site}
            })
            .done(function(msg) {
                alert( "Data Saved" + msg);
            });
            console.log(site);
            site=[];
        }
    });
    $("#sortable").disableSelection();
  });
  </script>
</head>
<body>
 
<ul id="sortable">
  <li class="ui-state-default ui-state-disabled" data="header-block" name="Заголовок"><a href="/nodb/">Заголовок</a></li>
  <?php
    $file = 'site.json';
    
    // Открываем файл для получения существующего содержимого
    $current = file_get_contents($file);
    //var_dump(json_decode($current));
    $arr = json_decode($current);
    array_shift($arr);
    array_pop($arr);
    
    foreach ($arr as $value) {
        //var_dump($value->{'icon-block'});
        echo '<li class="ui-state-default" data="'.$value.'"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>'.$value.'</li>';
    }
    
?> 
  <li class="ui-state-default ui-state-disabled" data="footer-block" name="Подвал">Подвал</li>
</ul>

</body>
</html>