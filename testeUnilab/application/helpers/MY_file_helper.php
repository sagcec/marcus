<?php
if(!function_exists('js_loader')){

/**
* Carrega os scripts por demanda, a depender do controller ativo e do
* diretorio definido
* @return string
*/
function js_loader() {
    //Captura a instancia do CI
    $ci = & get_instance();
    //Captura o controller ativo
    $controller = $ci->router->fetch_class();
    //Declara o diretorio onde estao os scripts do $controller.
    //Este diretorio precisa estar acessivel ao navegador
    $jsdir = "assets/js/$controller/";
    //Checagem do $jsdir
    if(file_exists($jsdir)){
        $DirectoryIterator = new DirectoryIterator($jsdir);
        echo "<!--Scripts do controller $controller-->\n";
        foreach ($DirectoryIterator as $entry) {
            //Carrega apenas arquivos (exclui diretorios...)
            if ($entry->isFile()) {
                //Carrega apenas arquivos '.js'
                if (in_array($entry->getExtension(), ['js'])) {
                    $file = base_url($jsdir.$entry->getFilename());
                    echo "<script src='$file' charset='UTF-8'></script>\n";
                }
            }
        }
    }
   }
}
?>
