<?php

namespace Views;

class Compiler
{
    public function __construct()
    {
    }

    private function getPatterns(){
        return [
            'parts' => "/(\>\>part\(\')(\w*)(\'\))/"
        ];
    }

    private function build($file){
        $preg['parts'] = preg_match_all(self::getPatterns()['parts'], $file, $parts);
        if($preg['parts']){
            foreach($parts[2] as $part){
                $file = str_replace(">>part('$part')", "<?php include('build/view/parts/$part.php'); ?>", $file);
            }
        }
        $file = preg_replace(self::getPatterns()['parts'], "", $file);


        return $file;
    }

    public static function compile($file){
        $content = file_get_contents($file);
        $content = self::build($content);

        $name = md5($file);
        $path = ROOT."/storage/views/$name.php";
     
            $make = fopen($path, 'w+');
            fwrite($make, $content);
            fclose($make);
        

        include($path);

    }
}