<?php
    /*
     * MD5 check.
     */
    jimport('joomla.filesystem.file');

    $paths = array(
    'admin' => JPATH_ADMINISTRATOR.DS.'components'.DS.'_ECR_COM_COM_NAME_'
    , 'site' => JPATH_SITE.DS.'components'.DS.'_ECR_COM_COM_NAME_');

//    $md5Path = $paths['admin'].DS.'MD5SUMS';

    //--@TODO temp solution to hide the md5 file from J! 1.6
    $md5Path = $paths['admin'].DS.'install'.DS.'MD5SUMS';

    if(JFile::exists($md5Path))
    {
        echo '<br />'.jgettext('Checking MD5 sums...');

        $md5Result = checkMD5File($md5Path, $paths);
        
        echo sprintf(jgettext('%d files checked...'), $md5Result[0]);

        if(count($md5Result) > 1)
        {
            array_shift($md5Result);
            
            echo '<strong style="color: red;">'.jgettext('There have been errors').'</strong>';
            echo '<ul style="color: red;">';
            echo '<li>';
            echo implode('</li><li>', $md5Result);
            echo '</li>';
            echo '</ul>';
        }
        else
        {
            echo '<strong style="color: green;">'.jgettext('OK').'</strong>';
        }
    }