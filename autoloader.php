function __autoload($name)
{
    $name = preg_replace("#[^A-Za-z0-9\\\\]#", NULL, $name);   //remove everything except alpha numeric and "\"

    $name = ltrim($name, '\\');
    $fileName  = '';

    if ($lastNsPos = strripos($name, '\\'))
    {
        $namespace = substr($name, 0, $lastNsPos);
        $name = substr($name, $lastNsPos + 1);
        $fileName  = PATH_LIBRARY . str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $name) . '.php';

    require $fileName;
}
